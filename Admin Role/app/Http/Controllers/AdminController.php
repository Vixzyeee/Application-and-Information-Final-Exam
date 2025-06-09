<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle an authentication attempt
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'admin_email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Adjust the credentials for the admin model
        $adminCredentials = [
            'admin_email' => $credentials['admin_email'],
            'admin_password' => $credentials['password'],
        ];

        // Custom attempt with admin_email and admin_password
        $admin = Admin::where('admin_email', $adminCredentials['admin_email'])->first();

        if ($admin && Hash::check($adminCredentials['admin_password'], $admin->admin_password)) {
            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'admin_email' => 'The provided credentials do not match our records.',
        ])->onlyInput('admin_email');
    }

    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    /**
     * Handle a registration request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin_name' => ['required', 'string', 'max:255'],
            'admin_email' => ['required', 'string', 'email', 'max:255', 'unique:admins,admin_email'],
            'admin_phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create a user first
        $user = User::create([
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        // Then create the admin linked to the user
        $admin = Admin::create([
            'user_id' => $user->id,
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_password' => Hash::make($request->password),
            'admin_phone' => $request->admin_phone,
        ]);

        // Instead of auto-login, redirect to login page with success message
        return redirect()->route('admin.login')->with('success', 'Registration successful! Please log in with your credentials.');
    }

    /**
     * Log the user out
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Show the admin dashboard
     */
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
    
    /**
     * Show the admin profile page
     */
    public function profile()
    {
        return view('admin.profile');
    }
    
    /**
     * Update the admin's profile information
     */
    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        
        $validator = Validator::make($request->all(), [
            'admin_name' => ['required', 'string', 'max:255'],
            'admin_email' => ['required', 'string', 'email', 'max:255', Rule::unique('admins', 'admin_email')->ignore($admin->admin_id, 'admin_id')],
            'admin_phone' => ['required', 'string', 'max:15'],
            'admin_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // Handle photo upload
        if ($request->hasFile('admin_photo')) {
            // Delete old photo if exists
            if ($admin->admin_photo) {
                Storage::delete($admin->admin_photo);
            }
            
            // Store new photo
            $photoPath = $request->file('admin_photo')->store('admin-photos', 'public');
            $admin->admin_photo = $photoPath;
        }
        
        // Update admin record
        $admin->admin_name = $request->admin_name;
        $admin->admin_email = $request->admin_email;
        $admin->admin_phone = $request->admin_phone;
        $admin->save();
        
        // Update related user record if exists
        if ($admin->user) {
            $admin->user->name = $request->admin_name;
            $admin->user->email = $request->admin_email;
            $admin->user->save();
        }
        
        return back()->with('success', 'Profile updated successfully.');
    }
    
    /**
     * Update the admin's password
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $admin = Auth::guard('admin')->user();
        
        // Check if current password matches
        if (!Hash::check($request->current_password, $admin->admin_password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match our records.']);
        }
        
        // Update admin password
        $admin->admin_password = Hash::make($request->new_password);
        $admin->save();
        
        // Update related user password if exists
        if ($admin->user) {
            $admin->user->password = Hash::make($request->new_password);
            $admin->user->save();
        }
        
        return back()->with('success', 'Password updated successfully.');
    }
    
    /**
     * Delete the admin's account
     */
    public function destroyProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        
        // Delete photo if exists
        if ($admin->admin_photo) {
            Storage::delete($admin->admin_photo);
        }
        
        // Delete related user if exists
        if ($admin->user) {
            $admin->user->delete();
        }
        
        // Delete admin account
        $admin->delete();
        
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')->with('success', 'Your account has been deleted successfully.');
    }
    
    /**
     * Show form to create a new teacher account
     */
    public function showCreateTeacherForm()
    {
        return view('admin.create-teacher');
    }
    
    /**
     * Create a new teacher account
     */
    public function createTeacher(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate input
            $validated = $request->validate([
                'teacher_name' => 'required|string|max:255',
                'teacher_email' => [
                    'required',
                    'email',
                    'unique:teachers,teacher_email',
                    'unique:users,email'
                ],
                'teacher_phone' => 'required|string|regex:/^08[0-9]{9,11}$/',
                'teacher_password' => 'required|string|min:8|confirmed',
            ], [
                'teacher_phone.regex' => 'Phone number must start with 08 and be between 11-13 digits',
                'teacher_email.unique' => 'This email address is already in use.',
            ]);

            // Check if email already exists in users table
            $existingUser = User::where('email', $validated['teacher_email'])->first();
            if ($existingUser) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'A user with this email already exists. Please use a different email address.');
            }

            // Generate a unique NIK (Teacher ID)
            $lastTeacher = Teacher::orderBy('teacher_id', 'desc')->first();
            $lastId = $lastTeacher ? intval(substr($lastTeacher->teacher_nik, 3)) : 0;
            $newId = $lastId + 1;
            $validated['teacher_nik'] = 'TCH' . str_pad($newId, 8, '0', STR_PAD_LEFT);

            // Set default values for specialization and position
            $validated['teacher_specialization'] = 'General';
            $validated['teacher_position'] = 'Teacher';

            // Create user first
            $user = User::create([
                'name' => $validated['teacher_name'],
                'email' => $validated['teacher_email'],
                'password' => Hash::make($validated['teacher_password']),
                'role' => 'teacher',
            ]);

            // Add user_id to teacher data
            $validated['user_id'] = $user->id;

            // Create the teacher
            Teacher::create($validated);

            DB::commit();

            return redirect()->route('teachers.index')->with('success', 'Teacher account created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error creating teacher account:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating teacher account: ' . $e->getMessage());
        }
    }
} 
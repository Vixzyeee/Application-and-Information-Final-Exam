<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Rule;

class TeacherController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->wantsJson()) {
                return $next($request);
            }
            
            // For non-AJAX requests, ensure we're returning a view
            return $next($request);
        });
    }

    /**
     * Show the teacher registration form
     */
    public function showRegistrationForm()
    {
        // This method is kept for routing purposes, but we'll redirect to admin login
        return redirect()->route('admin.login')
            ->with('error', 'Only administrators can register new teachers.');
    }

    /**
     * Handle a teacher registration request
     */
    public function register(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate input
            $validated = $request->validate([
                'teacher_name' => 'required|string|max:255',
                'teacher_specialization' => 'required|string|max:255',
                'teacher_position' => 'required|string|max:255',
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

            // Generate a unique NIK (Teacher ID)
            $lastTeacher = Teacher::orderBy('teacher_id', 'desc')->first();
            $lastId = $lastTeacher ? intval(substr($lastTeacher->teacher_nik, 3)) : 0;
            $newId = $lastId + 1;
            $validated['teacher_nik'] = 'TCH' . str_pad($newId, 8, '0', STR_PAD_LEFT);

            // Create user first
            $user = \App\Models\User::create([
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

            return redirect()->route('login')->with('success', 'Registration successful! You can now login with your credentials.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error registering teacher:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error during registration: ' . $e->getMessage());
        }
    }

    public function index(Request $request)
    {
        try {
            $query = Teacher::query();

            // Search functionality
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('teacher_name', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('teacher_nik', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('teacher_specialization', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('teacher_email', 'LIKE', "%{$searchTerm}%");
                });
            }

            $teachers = $query->orderBy('created_at', 'desc')->paginate(10);

            if ($request->ajax()) {
                $html = view('teachers.table-body', compact('teachers'))->render();
                $pagination = view('teachers.pagination', compact('teachers'))->render();

                return response()->json([
                    'success' => true,
                    'html' => $html,
                    'pagination' => $pagination,
                    'currentPage' => $teachers->currentPage(),
                    'lastPage' => $teachers->lastPage(),
                    'total' => $teachers->total()
                ]);
            }

            return view('teachers.teachers', compact('teachers'));
        } catch (\Exception $e) {
            \Log::error('Error loading teachers:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error loading teachers: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Error loading teachers: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validasi input
            $validated = $request->validate([
                'teacher_name' => 'required|string|max:255',
                'teacher_nik' => 'required|string|unique:teachers,teacher_nik|regex:/^TCH\d{8}$/',
                'teacher_specialization' => 'required|string|max:255',
                'teacher_position' => 'required|string|max:255',
                'teacher_email' => [
                    'required',
                    'email',
                    'unique:teachers,teacher_email',
                    'unique:users,email'
                ],
                'teacher_phone' => 'required|string|regex:/^08[0-9]{9,11}$/',
                'teacher_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'teacher_password' => 'required|string|min:8|confirmed',
            ], [
                'teacher_nik.regex' => 'NIK must start with TCH followed by 8 digits',
                'teacher_phone.regex' => 'Phone number must start with 08 and be between 11-13 digits',
                'teacher_email.unique' => 'This email address is already in use.',
            ]);

            // Create user first
            $user = \App\Models\User::create([
                'name' => $validated['teacher_name'],
                'email' => $validated['teacher_email'],
                'password' => Hash::make($validated['teacher_password']),
                'role' => 'teacher',
            ]);

            // Upload foto (jika ada)
            if ($request->hasFile('teacher_photo')) {
                $photo = $request->file('teacher_photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                
                // Pastikan direktori exists
                $photoDir = 'public/images/teachers';
                if (!Storage::exists($photoDir)) {
                    Storage::makeDirectory($photoDir);
                }
                
                // Simpan foto
                $photoPath = $photo->storeAs('images/teachers', $photoName, 'public');
                $validated['teacher_photo'] = $photoPath;
            }

            // Add user_id to teacher data
            $validated['user_id'] = $user->id;

            // Simpan data dosen
            Teacher::create($validated);

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Teacher data has been added successfully.'
                ]);
            }

            return redirect()->route('teachers.index')->with('success', 'Teacher data has been added successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            if (isset($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            \Log::error('Error adding teacher:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error adding teacher: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error adding teacher: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            \Log::info('Attempting to load teacher profile:', ['teacher_id' => $id]);
            
            $teacher = Teacher::findOrFail($id);
            \Log::info('Teacher found:', ['teacher' => $teacher->toArray()]);
            
            if (request()->ajax() || request()->wantsJson()) {
                \Log::info('Returning JSON response');
                return response()->json([
                    'success' => true,
                    'data' => $teacher,
                    'message' => 'Teacher profile loaded successfully.'
                ]);
            }
            
            return view('teachers.show', compact('teacher'));
        } catch (\Exception $e) {
            \Log::error('Error loading teacher profile:', [
                'teacher_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error loading teacher profile: ' . $e->getMessage()
                ], 404);
            }
            
            return redirect()->back()->with('error', 'Teacher not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'teacher' => $teacher
                ]);
            }
            
            return view('teachers.edit', compact('teacher'));
        } catch (\Exception $e) {
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Teacher not found'
                ], 404);
            }
            
            return redirect()->back()->with('error', 'Teacher not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $teacher = Teacher::findOrFail($id);

            // Validasi input
            $validated = $request->validate([
                'teacher_name' => 'required|string|max:255',
                'teacher_nik' => 'required|string|regex:/^TCH\d{8}$/|unique:teachers,teacher_nik,' . $id . ',teacher_id',
                'teacher_specialization' => 'required|string|max:255',
                'teacher_position' => 'required|string|max:255',
                'teacher_email' => [
                    'required',
                    'email',
                    Rule::unique('teachers', 'teacher_email')->ignore($id, 'teacher_id'),
                    Rule::unique('users', 'email')->ignore($teacher->user_id, 'id')
                ],
                'teacher_phone' => 'required|string|regex:/^08[0-9]{9,11}$/',
                'teacher_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'teacher_password' => 'nullable|string|min:8|confirmed',
            ], [
                'teacher_nik.regex' => 'NIK must start with TCH followed by 8 digits',
                'teacher_phone.regex' => 'Phone number must start with 08 and be between 11-13 digits',
                'teacher_email.unique' => 'This email address is already in use.',
            ]);

            // Upload foto baru jika ada
            if ($request->hasFile('teacher_photo')) {
                // Hapus foto lama jika ada
                if ($teacher->teacher_photo) {
                    Storage::disk('public')->delete($teacher->teacher_photo);
                }

                $photo = $request->file('teacher_photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                
                // Pastikan direktori exists
                $photoDir = 'public/images/teachers';
                if (!Storage::exists($photoDir)) {
                    Storage::makeDirectory($photoDir);
                }
                
                // Simpan foto
                $photoPath = $photo->storeAs('images/teachers', $photoName, 'public');
                $validated['teacher_photo'] = $photoPath;
            }

            // Update data
            $teacher->update($validated);

            // Update the associated user record
            if ($teacher->user) {
                $teacher->user->update([
                    'name' => $validated['teacher_name'],
                    'email' => $validated['teacher_email'],
                ]);
                
                // Update password if provided
                if (isset($validated['teacher_password'])) {
                    $teacher->user->update([
                        'password' => Hash::make($validated['teacher_password']),
                    ]);
                }
            }

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Teacher data has been updated successfully.'
                ]);
            }

            return redirect()->route('teachers.index')->with('success', 'Teacher data has been updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            if (isset($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors()
                ], 422);
            }

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            \Log::error('Error updating teacher:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating teacher: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating teacher: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            
            $teacher = Teacher::findOrFail($id);
            
            // Delete photo if exists
            if ($teacher->teacher_photo) {
                Storage::disk('public')->delete($teacher->teacher_photo);
            }
            
            // Delete teacher
            $teacher->delete();
            
            DB::commit();
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Teacher has been deleted successfully.'
                ]);
            }
            
            return redirect()->route('teachers.index')
                ->with('success', 'Teacher has been deleted successfully.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            \Log::error('Error deleting teacher:', [
                'teacher_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting teacher: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Error deleting teacher: ' . $e->getMessage());
        }
    }

    public function changePassword(Request $request, $id)
    {
        try {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            $teacher = Teacher::findOrFail($id);
            
            // Get the raw password hash from database
            $currentPasswordHash = $teacher->getRawOriginal('teacher_password');

            // Verify current password
            if (!Hash::check($request->current_password, $currentPasswordHash)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Current password is incorrect'
                ], 400);
            }

            // Update password - the mutator will handle hashing
            $teacher->update([
                'teacher_password' => $request->new_password
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Password changed successfully'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors()['new_password'][0] ?? 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error changing password:', [
                'teacher_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error changing password: ' . $e->getMessage()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
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

    public function index(Request $request)
    {
        try {
            $query = Student::query();

            // Search functionality
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('student_name', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('student_nim', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('student_specialization', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('student_class', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('student_major', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('student_email', 'LIKE', "%{$searchTerm}%");
                });
            }

            $students = $query->orderBy('created_at', 'desc')->paginate(10);

            if ($request->ajax()) {
                $html = view('students.table-body', compact('students'))->render();
                $pagination = view('students.pagination', compact('students'))->render();

                return response()->json([
                    'success' => true,
                    'html' => $html,
                    'pagination' => $pagination,
                    'currentPage' => $students->currentPage(),
                    'lastPage' => $students->lastPage(),
                    'total' => $students->total()
                ]);
            }

            return view('students.students', compact('students'));
        } catch (\Exception $e) {
            \Log::error('Error loading students:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error loading students: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Error loading students: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
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
                'student_name' => 'required|string|max:255',
                'student_nim' => 'required|string|unique:students,student_nim|regex:/^STD\d{8}$/',
                'student_specialization' => 'required|string|max:255',
                'student_class' => 'required|string|max:255',
                'student_major' => 'required|string|max:255',
                'student_email' => 'required|email|unique:students,student_email',
                'student_phone' => 'required|string|regex:/^08[0-9]{9,11}$/',
                'student_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'student_password' => 'required|string|min:8|confirmed',
            ], [
                'student_nim.regex' => 'NIM must start with STD followed by 8 digits',
                'student_phone.regex' => 'Phone number must start with 08 and be between 11-13 digits',
            ]);

            // Upload foto (jika ada)
            if ($request->hasFile('student_photo')) {
                $photo = $request->file('student_photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                
                // Pastikan direktori exists
                $photoDir = 'public/images/students';
                if (!Storage::exists($photoDir)) {
                    Storage::makeDirectory($photoDir);
                }
                
                // Simpan foto
                $photoPath = $photo->storeAs('images/students', $photoName, 'public');
                $validated['student_photo'] = $photoPath;
            }

            // Simpan data mahasiswa
            Student::create($validated);

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Student data has been added successfully.'
                ]);
            }

            return redirect()->route('students.index')->with('success', 'Student data has been added successfully.');
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

            \Log::error('Error adding student:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error adding student: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error adding student: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            \Log::info('Attempting to load student profile:', ['student_id' => $id]);
            
            $student = Student::findOrFail($id);
            \Log::info('Student found:', ['student' => $student->toArray()]);
            
            if (request()->ajax() || request()->wantsJson()) {
                \Log::info('Returning JSON response');
                return response()->json([
                    'success' => true,
                    'data' => $student,
                    'message' => 'Student profile loaded successfully.'
                ]);
            }
            
            return view('students.show', compact('student'));
        } catch (\Exception $e) {
            \Log::error('Error loading student profile:', [
                'student_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error loading student profile: ' . $e->getMessage()
                ], 404);
            }
            
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'student' => $student
                ]);
            }
            
            return view('students.edit', compact('student'));
        } catch (\Exception $e) {
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Student not found'
                ], 404);
            }
            
            return redirect()->back()->with('error', 'Student not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $student = Student::findOrFail($id);

            // Validasi input
            $validated = $request->validate([
                'student_name' => 'required|string|max:255',
                'student_nim' => 'required|string|regex:/^STD\d{8}$/|unique:students,student_nim,' . $id . ',student_id',
                'student_specialization' => 'required|string|max:255',
                'student_class' => 'required|string|max:255',
                'student_major' => 'required|string|max:255',
                'student_email' => 'required|email|unique:students,student_email,' . $id . ',student_id',
                'student_phone' => 'required|string|regex:/^08[0-9]{9,11}$/',
                'student_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'student_password' => 'nullable|string|min:8|confirmed',
            ], [
                'student_nim.regex' => 'NIM must start with STD followed by 8 digits',
                'student_phone.regex' => 'Phone number must start with 08 and be between 11-13 digits',
            ]);

            // Upload foto baru jika ada
            if ($request->hasFile('student_photo')) {
                // Hapus foto lama jika ada
                if ($student->student_photo) {
                    Storage::disk('public')->delete($student->student_photo);
                }

                $photo = $request->file('student_photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                
                // Pastikan direktori exists
                $photoDir = 'public/images/students';
                if (!Storage::exists($photoDir)) {
                    Storage::makeDirectory($photoDir);
                }
                
                // Simpan foto
                $photoPath = $photo->storeAs('images/students', $photoName, 'public');
                $validated['student_photo'] = $photoPath;
            }

            // Update data
            $student->update($validated);

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Student data has been updated successfully.'
                ]);
            }

            return redirect()->route('students.index')->with('success', 'Student data has been updated successfully.');
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

            \Log::error('Error updating student:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating student: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating student: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            
            $student = Student::findOrFail($id);
            
            // Delete photo if exists
            if ($student->student_photo) {
                Storage::disk('public')->delete($student->student_photo);
            }
            
            // Delete student
            $student->delete();
            
            DB::commit();
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Student has been deleted successfully.'
                ]);
            }
            
            return redirect()->route('students.index')
                ->with('success', 'Student has been deleted successfully.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            \Log::error('Error deleting student:', [
                'student_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting student: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Error deleting student: ' . $e->getMessage());
        }
    }

    public function changePassword(Request $request, $id)
    {
        try {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            $student = Student::findOrFail($id);
            
            // Get the raw password hash from database
            $currentPasswordHash = $student->getRawOriginal('student_password');

            // Verify current password
            if (!Hash::check($request->current_password, $currentPasswordHash)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Current password is incorrect'
                ], 400);
            }

            // Update password - the mutator will handle hashing
            $student->update([
                'student_password' => $request->new_password
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
                'student_id' => $id,
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

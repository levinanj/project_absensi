<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    /**
     * Access the index page for the students to see all students
     * @return Application|Factory|View
     */
    public function index(){
        $this->setPageTitle('Siswa', 'Siswa');
        $students = Student::all();
        return view('Manage.pages.Students.index', compact('students'));
    }

    /**
     * @param Student $student
     * @return Application|Factory|View
     */
    public function show(Student $student){
        $this->setPageTitle($student->name, 'Show student');
        $student->load('attendances');
        return view('Manage.pages.Students.show', compact('student'));
    }

     /**
     * @param Student $student
     * @return Application|Factory|View
     */
    public function presence(Student $student){
        $this->setPageTitle($student->name, 'Show student');
        return view('Manage.pages.Students.presence', compact('student'));
    }

    /**
     * @param Student $student
     * @return Application|Factory|View
     */
    public function absence(Student $student){
        $this->setPageTitle($student->name, 'Show student');
        return view('Manage.pages.Students.absence', compact('student'));
    }

    /**
     * @param StoreStudentRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        try {
            Student::create($request->validated());
        }
        catch (\Exception $exception){
            alert('Oops', 'Silahkan Coba Lagi', 'error');
        }
        // Show Sweet Alert Notification
        alert('Bagus!', 'Berhasil Dibuat', 'success');
        // Redirect Back
        return redirect()->back();
    }

    /**
     * @param UpdateStudentRequest $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        try {
            $student->update($request->validated());
        }
        catch (\Exception $exception){
            alert('Oops', 'Silahkan Coba Lagi', 'error');
        }
        // Show Sweet Alert Notification
        alert('Bagus!', 'Berhasil Dibuat', 'success');
        // Redirect Back
        return redirect()->back();
    }

    /**
     * @param Student $student
     * @return RedirectResponse
     */
    public function destroy(Student $student): RedirectResponse
    {
        try {
            $student->delete();
        }
        catch (\Exception $exception){
            alert('Oops', 'Silahkan Coba Lagi', 'error');
        }
        // Show Sweet Alert Notification
        alert('Bagus!', 'Berhasil Dibuat', 'success');
        // Redirect Back
        return redirect()->back();
    }
}

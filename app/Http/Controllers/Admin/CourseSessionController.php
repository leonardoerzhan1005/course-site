<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseSession;
use Illuminate\Http\Request;

class CourseSessionController extends Controller
{
    public function index(Request $request)
    {
        $courseId = $request->get('course_id');
        $courses = Course::orderBy('title')->get(['id','title']);
        $sessions = CourseSession::with('course')
            ->when($courseId, fn($q)=>$q->where('course_id', $courseId))
            ->orderByDesc('start_date')
            ->paginate(20)
            ->withQueryString();

        return view('admin.course-sessions.index', compact('sessions','courses','courseId'));
    }

    public function create(Request $request)
    {
        $courses = Course::orderBy('title')->get(['id','title']);
        $prefCourseId = $request->get('course_id');
        return view('admin.course-sessions.form', [
            'session' => new CourseSession(),
            'courses' => $courses,
            'prefCourseId' => $prefCourseId,
            'method' => 'POST',
            'action' => route('admin.course-sessions.store', ['locale' => app()->getLocale()]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => ['required','exists:courses,id'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after_or_equal:start_date'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = (bool)($data['is_active'] ?? true);
        CourseSession::create($data);
        return redirect()->route('admin.course-sessions.index', ['locale'=>app()->getLocale(), 'course_id'=>$data['course_id']])->with('success', __('Created'));
    }

    public function edit(CourseSession $course_session)
    {
        $courses = Course::orderBy('title')->get(['id','title']);
        return view('admin.course-sessions.form', [
            'session' => $course_session,
            'courses' => $courses,
            'prefCourseId' => $course_session->course_id,
            'method' => 'POST',
            'action' => route('admin.course-sessions.update', ['locale' => app()->getLocale(), 'course_session' => $course_session->id]),
        ]);
    }

    public function update(Request $request, CourseSession $course_session)
    {
        $data = $request->validate([
            'course_id' => ['required','exists:courses,id'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after_or_equal:start_date'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $course_session->update($data);
        return redirect()->route('admin.course-sessions.index', ['locale'=>app()->getLocale(), 'course_id'=>$data['course_id']])->with('success', __('Updated'));
    }

    public function destroy(CourseSession $course_session)
    {
        $courseId = $course_session->course_id;
        $course_session->delete();
        return redirect()->route('admin.course-sessions.index', ['locale'=>app()->getLocale(), 'course_id'=>$courseId])->with('success', __('Deleted'));
    }
}



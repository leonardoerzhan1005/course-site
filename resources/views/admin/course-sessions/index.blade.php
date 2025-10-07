@extends('admin.layouts.master')

@section('content')
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Course Sessions</h3>
        <div class="card-actions">
          <form class="d-flex gap-2" method="GET">
            <select class="form-select" name="course_id" onchange="this.form.submit()">
              <option value="">All courses</option>
              @foreach($courses as $c)
                <option value="{{ $c->id }}" @selected($courseId==$c->id)>{{ $c->title }}</option>
              @endforeach
            </select>
            <a href="{{ route('admin.course-sessions.create', ['locale'=>app()->getLocale(), 'course_id'=>$courseId]) }}" class="btn btn-primary">New Session</a>
          </form>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-vcenter card-table">
            <thead>
              <tr>
                <th>Course</th>
                <th>Start</th>
                <th>End</th>
                <th>Active</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($sessions as $s)
              <tr>
                <td>{{ $s->course?->title }}</td>
                <td>{{ $s->start_date->format('Y-m-d') }}</td>
                <td>{{ $s->end_date->format('Y-m-d') }}</td>
                <td>@if($s->is_active)<span class="badge bg-lime">Yes</span>@else<span class="badge bg-secondary">No</span>@endif</td>
                <td>
                  <a href="{{ route('admin.course-sessions.edit', ['locale'=>app()->getLocale(), 'course_session'=>$s->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                  <form action="{{ route('admin.course-sessions.destroy', ['locale'=>app()->getLocale(), 'course_session'=>$s->id]) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                  </form>
                </td>
              </tr>
              @empty
              <tr><td colspan="5" class="text-center">No data</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="mt-3">{{ $sessions->links() }}</div>
      </div>
    </div>
  </div>
</div>
@endsection



@extends('admin.layouts.master')

@section('content')
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{ $session->exists ? 'Edit Session' : 'Create Session' }}</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ $action }}">
          @csrf
          @if($session->exists)
            @method('PUT')
          @endif
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Course</label>
              <select class="form-select" name="course_id" required>
                @foreach($courses as $c)
                   <option value="{{ $c->id }}" @selected(($session->course_id ?? $prefCourseId)==$c->id)>{{ $c->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label">Start date</label>
              <input class="form-control" type="date" name="start_date" value="{{ old('start_date', optional($session->start_date)->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">End date</label>
              <input class="form-control" type="date" name="end_date" value="{{ old('end_date', optional($session->end_date)->format('Y-m-d')) }}" required>
            </div>
            <div class="col-md-12">
              <label class="form-check">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked(old('is_active', $session->is_active))>
                <span class="form-check-label">Active</span>
              </label>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Save</button>
              <a class="btn" href="{{ route('admin.course-sessions.index', ['locale'=>app()->getLocale()]) }}">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection



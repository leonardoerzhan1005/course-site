@extends('admin.layouts.master')

@section('content')
<div class="container-xl">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Add Document</h3>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <div class="text-danger fw-bold mb-2">Validation failed</div>
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('admin.documents.store', ['locale' => request()->route('locale')]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Category</label>
          <select name="category" class="form-select" required>
            <option value="normative" @selected(old('category')==='normative')>Normative</option>
            <option value="orders" @selected(old('category')==='orders')>Orders</option>
            <option value="manuals" @selected(old('category')==='manuals')>Manuals</option>
            <option value="templates" @selected(old('category')==='templates')>Templates</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">File</label>
          <input type="file" class="form-control" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar" required>
          <div class="form-text">Max upload size зависит от сервера (upload_max_filesize/post_max_size).</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Published at</label>
          <input type="date" class="form-control" name="published_at" value="{{ old('published_at') }}">
        </div>
        <div class="mb-3 form-check">
          <input class="form-check-input" type="checkbox" name="status" id="status" {{ old('status', true) ? 'checked' : '' }}>
          <label class="form-check-label" for="status">Active</label>
        </div>
        <div class="text-end">
          <a href="{{ route('admin.documents.index', ['locale' => request()->route('locale')]) }}" class="btn btn-secondary">Back</a>
          <button class="btn btn-primary" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection



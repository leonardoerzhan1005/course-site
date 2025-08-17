@extends('admin.layouts.master')

@section('content')
<div class="container-xl">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Document</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.documents.update', ['locale' => request()->route('locale'), 'document' => $document->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Category</label>
          <select name="category" class="form-select" required>
            @foreach(['normative' => 'Normative', 'orders' => 'Orders', 'manuals' => 'Manuals', 'templates' => 'Templates'] as $key => $label)
              <option value="{{ $key }}" @selected($document->category === $key)>{{ $label }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" class="form-control" name="title" value="{{ $document->title }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="3">{{ $document->description }}</textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">File (upload to replace)</label>
          <input type="file" class="form-control" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar">
          <div class="form-text mt-1"><a href="{{ asset($document->file_path) }}" target="_blank">Current file</a></div>
        </div>
        <div class="mb-3">
          <label class="form-label">Published at</label>
          <input type="date" class="form-control" name="published_at" value="{{ optional($document->published_at)->format('Y-m-d') }}">
        </div>
        <div class="mb-3 form-check">
          <input class="form-check-input" type="checkbox" name="status" id="status" @checked($document->status)>
          <label class="form-check-label" for="status">Active</label>
        </div>
        <div class="text-end">
          <a href="{{ route('admin.documents.index', ['locale' => request()->route('locale')]) }}" class="btn btn-secondary">Back</a>
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection



<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(string $locale): View
    {
        $query = Document::where('locale', $locale)->orderBy('published_at', 'desc');
        if ($category = request('category')) {
            $query->where('category', $category);
        }
        $documents = $query->paginate(20)->withQueryString();
        return view('admin.documents.index', compact('documents'));
    }

    public function create(string $locale): View
    {
        return view('admin.documents.create');
    }

    public function store(Request $request, string $locale): RedirectResponse
    {
        $data = $request->validate([
            'category' => ['required', 'in:normative,orders,manuals,templates'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => ['required', 'file', 'mimes:pdf,doc,docx,xls,xlsx,zip,rar', 'max:20480'],
            'published_at' => ['nullable', 'date'],
        ]);

        if (!$request->hasFile('file')) {
            return back()->withErrors(['file' => 'File not received'])->withInput();
        }
        $file = $request->file('file');
        if (!$file->isValid()) {
            return back()->withErrors(['file' => 'Uploaded file is not valid'])->withInput();
        }

        try {
            $storedPath = Storage::disk('public')->putFile('uploads/documents', $file);
            // Save path as '/uploads/...', not '/storage/uploads/...'
            $data['file_path'] = $storedPath;
            $data['file_format'] = strtoupper($file->getClientOriginalExtension());
            $data['file_size'] = round($file->getSize() / 1024 / 1024, 2) . ' MB';
        } catch (\Throwable $e) {
            Log::error('Document upload failed', ['error' => $e->getMessage()]);
            return back()->withErrors(['file' => 'Failed to save file. Check storage permissions or size limits.'])->withInput();
        }
        $data['locale'] = $locale;
        $data['status'] = $request->has('status');

        Document::create($data);

        notyf()->success('Created Successfully!');
        return to_route('admin.documents.index', ['locale' => $locale]);
    }

    public function edit(string $locale, Document $document): View
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, string $locale, Document $document): RedirectResponse
    {
        $data = $request->validate([
            'category' => ['required', 'in:normative,orders,manuals,templates'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,zip,rar', 'max:20480'],
            'published_at' => ['nullable', 'date'],
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if (!$file->isValid()) {
                return back()->withErrors(['file' => 'Uploaded file is not valid'])->withInput();
            }
            try {
                $storedPath = Storage::disk('public')->putFile('uploads/documents', $file);
                // Save path as '/uploads/...', not '/storage/uploads/...'
                $data['file_path'] = $storedPath;
                $data['file_format'] = strtoupper($file->getClientOriginalExtension());
                $data['file_size'] = round($file->getSize() / 1024 / 1024, 2) . ' MB';
            } catch (\Throwable $e) {
                Log::error('Document upload failed (update)', ['error' => $e->getMessage()]);
                return back()->withErrors(['file' => 'Failed to save file. Check storage permissions or size limits.'])->withInput();
            }
        }

        $data['status'] = $request->has('status');
        $document->update($data);

        notyf()->success('Update Successfully!');
        return to_route('admin.documents.index', ['locale' => $locale]);
    }

    public function destroy(string $locale, Document $document): RedirectResponse
    {
        $document->delete();
        notyf()->success('Deleted Successfully!');
        return to_route('admin.documents.index', ['locale' => $locale]);
    }
}



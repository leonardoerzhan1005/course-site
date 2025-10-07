<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;

class BlogController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $locale) : View
    {
        $query = Blog::with(['category', 'translations']);
        
        // Поиск по заголовку
        if ($request->filled('search')) {
            $query->whereHas('translations', function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            });
        }
        
        // Фильтр по категории
        if ($request->filled('category')) {
            $query->where('blog_category_id', $request->category);
        }
        
        $blogs = $query->paginate(20);
        $categories = BlogCategory::with('translations')->get();
        
        return view('admin.blog.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $locale) : View
    {
        $categories = BlogCategory::with('translations')->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $locale) : RedirectResponse
    {
        try {
            // Отладочная информация
            \Log::info('Blog store request data:', $request->all());
            \Log::info('CSRF token valid:', ['valid' => $request->hasValidSignature()]);
            \Log::info('Request method:', ['method' => $request->method()]);
            \Log::info('Request URL:', ['url' => $request->url()]);
            
            $request->validate([
                'image' => ['nullable', 'image', 'max:3000'],
                'category' => ['nullable', 'exists:blog_categories,id'],
                'status' => ['nullable', 'boolean'],
                'translations.ru.title' => ['required', 'string', 'max:255'],
                'translations.ru.description' => ['required', 'string'],
                'translations.ru.seo_title' => ['nullable', 'string', 'max:255'],
                'translations.ru.seo_description' => ['nullable', 'string', 'max:255'],
                'translations.kk.title' => ['nullable', 'string', 'max:255'],
                'translations.kk.description' => ['nullable', 'string'],
                'translations.kk.seo_title' => ['nullable', 'string', 'max:255'],
                'translations.kk.seo_description' => ['nullable', 'string', 'max:255'],
                'translations.en.title' => ['nullable', 'string', 'max:255'],
                'translations.en.description' => ['nullable', 'string'],
                'translations.en.seo_title' => ['nullable', 'string', 'max:255'],
                'translations.en.seo_description' => ['nullable', 'string', 'max:255'],
            ]);

            // Загружаем изображение или используем дефолтное
            if ($request->hasFile('image')) {
                $image = $this->uploadFile($request->file('image'));
            } else {
                $image = '/default-files/default-blog-image.png'; // Дефолтное изображение
            }

        $adminUser = adminUser();
        if (!$adminUser) {
            \Log::error('Admin user not authenticated');
            notyf()->error('Admin authentication required');
            return back()->withInput();
        }

        $blog = new Blog();
        $blog->image = $image;
        $blog->blog_category_id = $request->category ?: null;
        $blog->user_id = $adminUser->id;
        $blog->status = $request->status ?? 0;
        $blog->save();

        // Сохраняем переводы для всех языков
        foreach (['ru', 'kk', 'en'] as $lang) {
            $title = $request->input("translations.{$lang}.title");
            $description = $request->input("translations.{$lang}.description");
            $seoTitle = $request->input("translations.{$lang}.seo_title");
            $seoDescription = $request->input("translations.{$lang}.seo_description");
            
            // Для русского языка title и description обязательны
            if ($lang === 'ru') {
                if ($title && $description) {
                    $blog->translations()->create([
                        'locale' => $lang,
                        'title' => $title,
                        'slug' => \Str::slug($title),
                        'description' => $description,
                        'seo_title' => $seoTitle,
                        'seo_description' => $seoDescription,
                    ]);
                }
            } else {
                // Для других языков создаем только если есть хотя бы title или description
                if ($title || $description) {
                    $blog->translations()->create([
                        'locale' => $lang,
                        'title' => $title,
                        'slug' => \Str::slug($title ?: 'blog-' . $blog->id . '-' . $lang),
                        'description' => $description,
                        'seo_title' => $seoTitle,
                        'seo_description' => $seoDescription,
                    ]);
                }
            }
        }

            notyf()->success('Created Successfully!');

            return to_route('admin.blogs.index', ['locale' => $locale]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Blog validation failed:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Blog creation failed: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            notyf()->error('Failed to create blog: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, Blog $blog) : View
    {
        $blog->load('translations');
        $categories = BlogCategory::with('translations')->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $locale, Blog $blog) : RedirectResponse
    {
        try {
            $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'category' => ['nullable', 'exists:blog_categories,id'],
            'status' => ['nullable', 'boolean'],
            'translations.ru.title' => ['required', 'string', 'max:255'],
            'translations.ru.description' => ['required', 'string'],
            'translations.ru.seo_title' => ['nullable', 'string', 'max:255'],
            'translations.ru.seo_description' => ['nullable', 'string', 'max:255'],
            'translations.kk.title' => ['nullable', 'string', 'max:255'],
            'translations.kk.description' => ['nullable', 'string'],
            'translations.kk.seo_title' => ['nullable', 'string', 'max:255'],
            'translations.kk.seo_description' => ['nullable', 'string', 'max:255'],
            'translations.en.title' => ['nullable', 'string', 'max:255'],
            'translations.en.description' => ['nullable', 'string'],
            'translations.en.seo_title' => ['nullable', 'string', 'max:255'],
            'translations.en.seo_description' => ['nullable', 'string', 'max:255'],
        ]);

        if($request->hasFile('image')) {
            $image = $this->uploadFile($request->file('image'));
            // Удаляем старое изображение только если это не дефолтное
            if ($request->old_image && !str_contains($request->old_image, 'default-files/')) {
                $this->deleteFile($request->old_image);
            }
            $blog->image = $image;
        }
        // Если изображение не загружено, оставляем текущее

        $adminUser = adminUser();
        if (!$adminUser) {
            \Log::error('Admin user not authenticated');
            notyf()->error('Admin authentication required');
            return back()->withInput();
        }

        $blog->blog_category_id = $request->category ?: null;
        $blog->status = $request->status ?? 0;
        $blog->save();

        // Обновляем переводы для всех языков
        foreach (['ru', 'kk', 'en'] as $lang) {
            $title = $request->input("translations.{$lang}.title");
            $description = $request->input("translations.{$lang}.description");
            $seoTitle = $request->input("translations.{$lang}.seo_title");
            $seoDescription = $request->input("translations.{$lang}.seo_description");
            
            // Для русского языка title и description обязательны
            if ($lang === 'ru') {
                if ($title && $description) {
                    $blog->translations()->updateOrCreate(
                        ['locale' => $lang],
                        [
                            'title' => $title,
                            'slug' => \Str::slug($title),
                            'description' => $description,
                            'seo_title' => $seoTitle,
                            'seo_description' => $seoDescription,
                        ]
                    );
                }
            } else {
                // Для других языков обновляем только если есть хотя бы title или description
                if ($title || $description) {
                    $blog->translations()->updateOrCreate(
                        ['locale' => $lang],
                        [
                            'title' => $title,
                            'slug' => \Str::slug($title ?: 'blog-' . $blog->id . '-' . $lang),
                            'description' => $description,
                            'seo_title' => $seoTitle,
                            'seo_description' => $seoDescription,
                        ]
                    );
                } else {
                    // Удаляем перевод только для необязательных языков, если все поля пустые
                    $blog->translations()->where('locale', $lang)->delete();
                }
            }
        }

            notyf()->success('Updated Successfully!');

            return to_route('admin.blogs.index', ['locale' => $locale]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Blog validation failed:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Blog update failed: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            notyf()->error('Failed to update blog: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, Blog $blog) : Response
    {
        try {
            $this->deleteFile($blog->image);
            $blog->delete();
            notyf()->success('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        }catch(Exception $e) {
            logger("Social Link Error >> ".$e);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
    
    /**
     * Upload image from TinyMCE editor (for drag & drop and paste)
     */
    public function uploadEditorImage(Request $request)
    {
        try {
            $request->validate([
                'file' => ['required', 'image', 'max:5000'], // 5MB max
            ]);
            
            if ($request->hasFile('file')) {
                $imagePath = $this->uploadFile($request->file('file'));
                
                return response()->json([
                    'location' => asset($imagePath)
                ], 200);
            }
            
            return response()->json([
                'error' => 'No file uploaded'
            ], 400);
            
        } catch (\Exception $e) {
            \Log::error('Editor image upload failed: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

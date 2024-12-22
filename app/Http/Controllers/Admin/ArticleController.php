<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:articles-list', ['only' => ['index']]);
        $this->middleware('permission:articles-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:articles-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:articles-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'description_ar' => 'required|string',
            'name_en'        => 'required|string|max:255',
            'description_en' => 'required|string',
            'image'          => 'required|image',
        ]);

        $saveRecord = new Article();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('articles', $imageName, 'public');

        }

        $saveRecord->translateOrNew('ar')->name = $request->name_ar;
        $saveRecord->translateOrNew('en')->name = $request->name_en;
        $saveRecord->translateOrNew('ar')->description = $request->description_ar;
        $saveRecord->translateOrNew('en')->description = $request->description_en;

        $saveRecord->image = $imagePath;

        $saveRecord->save();

        return redirect()->route('articles.index')->with('success', 'article created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'description_ar' => 'required|string',
            'name_en'        => 'required|string|max:255',
            'description_en' => 'required|string',
            'image'          => 'nullable|image',
        ]);

        $imagePath = $article->image;
        if ($request->hasFile('image')) {

            $imageName = rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('articles', $imageName, 'public');
        }

        // Update translations
        $article->translateOrNew('ar')->name = $request->name_ar;
        $article->translateOrNew('en')->name = $request->name_en;
        $article->translateOrNew('ar')->description = $request->description_ar;
        $article->translateOrNew('en')->description = $request->description_en;

        // Update other attributes
        $article->image = $imagePath;
        $article->save();

        session()->flash('success', __('messages.update'));
        return redirect()->route('articles.index');
    }


    public function destroy(int $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        session()->flash('success', __('messages.delete'));
        return redirect()->route('articles.index');
    }
}

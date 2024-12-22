<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimonials-list', ['only' => ['index']]);
        $this->middleware('permission:testimonials-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:testimonials-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:testimonials-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
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

        $saveRecord = new Testimonial();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('testimonials', $imageName, 'public');

        }

        $saveRecord->translateOrNew('ar')->name = $request->name_ar;
        $saveRecord->translateOrNew('en')->name = $request->name_en;
        $saveRecord->translateOrNew('ar')->description = $request->description_ar;
        $saveRecord->translateOrNew('en')->description = $request->description_en;

        $saveRecord->image = $imagePath;

        $saveRecord->save();

        return redirect()->route('testimonials.index')->with('success', 'testimonial created successfully');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'description_ar' => 'required|string',
            'name_en'        => 'required|string|max:255',
            'description_en' => 'required|string',
            'image'          => 'required|image',
        ]);

        $imagePath = $testimonial->image;
        if ($request->hasFile('image')) {

            $imageName = rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('testimonials', $imageName, 'public');
        }

        // Update translations
        $testimonial->translateOrNew('ar')->name = $request->name_ar;
        $testimonial->translateOrNew('en')->name = $request->name_en;
        $testimonial->translateOrNew('ar')->description = $request->description_ar;
        $testimonial->translateOrNew('en')->description = $request->description_en;

        // Update other attributes
        $testimonial->image = $imagePath;

        $testimonial->save();

        session()->flash('success', __('messages.update'));
        return redirect()->route('testimonials.index');
    }


    public function destroy(int $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        session()->flash('success', __('messages.delete'));
        return redirect()->route('testimonials.index');
    }
}

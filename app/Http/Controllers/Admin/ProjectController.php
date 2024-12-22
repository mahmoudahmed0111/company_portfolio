<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:projects-list', ['only' => ['index']]);
        $this->middleware('permission:projects-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:projects-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:projects-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
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
            'images'         => 'required|array',
            'images.*'       => 'image|max:2048', // تأكد من أن كل الملفات صور
        ]);

        // إنشاء المشروع
        $project = new Project();

        $project->translateOrNew('ar')->name = $request->name_ar;
        $project->translateOrNew('en')->name = $request->name_en;
        $project->translateOrNew('ar')->description = $request->description_ar;
        $project->translateOrNew('en')->description = $request->description_en;

        $project->save();

        // حفظ الصور المرتبطة بالمشروع
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = rand() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('projects', $imageName, 'public');

                // إنشاء سجل في جدول project_images
                $project->images()->create([
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
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
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'name_en'        => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'images.*'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'delete_images.*' => 'nullable|exists:project_images,id', // تحقق من الصور المراد حذفها
        ]);

        // إيجاد المشروع باستخدام الـ ID
        $project = Project::findOrFail($id);

        // تحديث بيانات المشروع
        $project->translateOrNew('ar')->name = $request->name_ar;
        $project->translateOrNew('en')->name = $request->name_en;
        $project->translateOrNew('ar')->description = $request->description_ar;
        $project->translateOrNew('en')->description = $request->description_en;
        $project->save();

        // **حذف الصور المحددة**
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ProjectImage::find($imageId);

                if ($image) {
                    // حذف الصورة من التخزين
                    if ($image->image) { // تحقق من وجود المسار
                        Storage::disk('public')->delete($image->image); // حذف الصورة
                    }
                    // حذف السجل من قاعدة البيانات
                    $image->delete();
                } else {
                    \Log::warning("No image found with ID: " . $imageId);
                }
            }
        }

        // **إضافة الصور الجديدة**
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = rand() . '.' . $imageFile->getClientOriginalExtension();
                $imagePath = $imageFile->storeAs('projects', $imageName, 'public');

                // إضافة السجل الجديد في جدول project_images
                $project->images()->create([
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

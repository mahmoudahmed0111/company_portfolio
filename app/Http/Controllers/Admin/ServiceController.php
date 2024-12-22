<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:services-list', ['only' => ['index']]);
        $this->middleware('permission:services-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:services-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:services-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
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
            'icon'          => 'required|string',
        ]);

        $saveRecord = new Service();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('services', $imageName, 'public');

        }

        $saveRecord->translateOrNew('ar')->name = $request->name_ar;
        $saveRecord->translateOrNew('en')->name = $request->name_en;
        $saveRecord->translateOrNew('ar')->description = $request->description_ar;
        $saveRecord->translateOrNew('en')->description = $request->description_en;

        $saveRecord->icon = $request->icon;

        $saveRecord->image = $imagePath;

        $saveRecord->save();

        return redirect()->route('services.index')->with('success', 'Service created successfully');
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
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'description_ar' => 'required|string',
            'name_en'        => 'required|string|max:255',
            'description_en' => 'required|string',
            'image'          => 'nullable|image',
            'icon'          => 'required|string',
        ]);

        $imagePath = $service->image;
        if ($request->hasFile('image')) {

            $imageName = rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('services', $imageName, 'public');
        }

        // Update translations
        $service->translateOrNew('ar')->name = $request->name_ar;
        $service->translateOrNew('en')->name = $request->name_en;
        $service->translateOrNew('ar')->description = $request->description_ar;
        $service->translateOrNew('en')->description = $request->description_en;

        $service->icon = $request->icon;
        // Update other attributes
        $service->image = $imagePath;
        $service->save();

        session()->flash('success', __('messages.update'));
        return redirect()->route('services.index');
    }


    public function destroy(int $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        session()->flash('success', __('messages.delete'));
        return redirect()->route('services.index');
    }
}

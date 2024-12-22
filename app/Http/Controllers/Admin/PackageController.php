<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageFeatures;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:packages-list', ['only' => ['index']]);
        $this->middleware('permission:packages-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:packages-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:packages-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'name_en'        => 'required|string|max:255',
            'price'          => 'required|numeric',
            'type'           => 'required|in:marketing,servers,emails',
            'features_ar'    => 'required|array',
            'features_en'    => 'required|array',
            'features_ar.*'  => 'string',
            'features_en.*'  => 'string',
        ]);

        // إنشاء الباقة
        $package = new Package();
        $package->type = $request->type;
        $package->price = $request->price;

        $package->translateOrNew('ar')->name = $request->name_ar;
        $package->translateOrNew('en')->name = $request->name_en;

        $package->save();

        // إضافة الميزات الجديدة
        foreach ($request->features_ar as $index => $feature_ar) {
            $feature_en = $request->features_en[$index]; // الحصول على الميزة الإنجليزية المقابلة

            $packageFeature = $package->features()->create();
            $packageFeature->translateOrNew('ar')->feature = $feature_ar;
            $packageFeature->translateOrNew('en')->feature = $feature_en;


            $packageFeature->save();
        }

        return redirect()->route('packages.index')->with('success', 'Package created successfully');
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
        $package =  Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
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
            'price'          => 'required|numeric',
            'type'           => 'required|in:marketing,servers,emails',
            'features_ar'    => 'required|array',
            'features_en'    => 'required|array',
            'features_ar.*'  => 'string',
            'features_en.*'  => 'string',
        ]);

        // العثور على الباقة المحددة
        $package = Package::findOrFail($id);

        // تحديث بيانات الباقة
        $package->type = $request->type;
        $package->price = $request->price;

        // تحديث الترجمات (اسم الباقة)
        $package->translateOrNew('ar')->name = $request->name_ar;
        $package->translateOrNew('en')->name = $request->name_en;

        $package->save();

        // حذف الميزات القديمة
        $package->features()->delete();

        // إضافة الميزات الجديدة
        foreach ($request->features_ar as $index => $feature_ar) {
            $feature_en = $request->features_en[$index]; // الحصول على الميزة الإنجليزية المقابلة

            // إضافة ميزة جديدة للباقة
            $packageFeature = $package->features()->create();
            $packageFeature->translateOrNew('ar')->feature = $feature_ar;
            $packageFeature->translateOrNew('en')->feature = $feature_en;

            $packageFeature->save();
        }

        return redirect()->route('packages.index')->with('success', 'Package updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        session()->flash('success', __('messages.delete'));
        return redirect()->route('packages.index');
    }

    public function getPackagesData()
{
    $packagesData = Package::select('type', DB::raw('count(*) as total'))
        ->groupBy('type')
        ->get();

    return response()->json($packagesData);
}
}

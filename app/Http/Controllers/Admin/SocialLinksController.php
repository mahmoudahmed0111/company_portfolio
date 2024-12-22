<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLinks;
use Illuminate\Http\Request;

class SocialLinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:social_links-list', ['only' => ['index']]);
        $this->middleware('permission:social_links-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:social_links-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:social_links-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $social_links = SocialLinks::all();
        return view('admin.social_links.index', compact('social_links'));
    }

    public function create()
    {
        return view('admin.social_links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'name_en'        => 'required|string|max:255',
            'link'          => 'required|string',
            'icon'          => 'required|string',
        ]);

        $saveRecord = new SocialLinks();

        $saveRecord->translateOrNew('ar')->name = $request->name_ar;
        $saveRecord->translateOrNew('en')->name = $request->name_en;
        $saveRecord->link = $request->link;
        $saveRecord->icon = $request->icon;
        $saveRecord->save();

        session()->flash('success', __('messages.create'));
        return redirect()->route('social_links.index');
    }


    public function edit(int $id)
    {
        $info = SocialLinks::findOrFail($id);
        return view('admin.social_links.edit', compact('info'));
    }

    public function update(Request $request, int $id)
    {
        $info = SocialLinks::findOrFail($id);

        $request->validate([
            'name_ar'        => 'required|string|max:255',
            'name_en'        => 'required|string|max:255',
            'link'          => 'required|string',
            'icon'          => 'required|string',
        ]);


        $info->translateOrNew('ar')->name = $request->name_ar;
        $info->translateOrNew('en')->name = $request->name_en;
        $info->link = $request->link;
        $info->icon = $request->icon;
        $info->save();

        session()->flash('success', __('messages.update'));
        return redirect()->route('social_links.index');
    }

    public function destroy(int $id)
    {
        $info = SocialLinks::findOrFail($id);
        $info->delete();

        session()->flash('success', __('messages.delete'));
        return redirect()->route('social_links.index');
    }
}

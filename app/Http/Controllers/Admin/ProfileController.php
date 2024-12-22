<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $user = User::findOrFail(auth('web')->user()->id);
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request) {
        $user = User::findOrFail(auth('web')->user()->id);

        $request->validate([
            'name'    => 'required',
            'email'   => 'required|unique:users,email,'.$user->id,
            'phone'   => 'required|unique:users,phone,'.$user->id,
            'address' => 'nullable',
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
        ]);

        session()->flash('success', __('messages.update'));
        return back();
    }

    public function updatePicture(Request $request) {
        try {
            $user = User::findOrFail(auth('web')->user()->id);

            $request->validate([
                'picture' => 'required|image',
            ], [
                'picture.required' => 'بالرجاء تحديد صورة من مدير الملفات',
            ]);

            $picturePath = $user->picture;
            if($request->hasFile('picture')) {
                if($user->picture)
                    unlink('uploads/'.$user->picture);

                $pictureName = rand() . '.' . $request->file('picture')->getClientOriginalExtension();
                $picturePath = $request->file('picture')->storeAs('users', $pictureName, 'custom_path');
            }

            $user->update(['picture'  => $picturePath]);

            session()->flash('success', __('messages.update'));
            return back();
        } catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword(Request $request) {
        try {
            $user = User::findOrFail(auth('web')->user()->id);

            $validatedData = $request->validate([
                'password'     => 'required|confirmed|min:8',
                'old_password' => 'required',
            ]);

            if(Hash::check($request->input('old_password'), $user->password)) {
                $user->password = Hash::make($validatedData['password']);
                $user->save();

                session()->flash('success', __('messages.update'));
                return back();
            } else {
                session()->flash('error', 'كلمة المرور القديمة غير متطابقة');
                return back();
            }
        } catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}

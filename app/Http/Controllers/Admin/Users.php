<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Users extends Controller
{
    public function users_list(Request $request)
    {
        $query = User::query();
        $searchTerm = $request->input('search');
        $query->when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('first_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('country', 'like', '%' . $searchTerm . '%')
                ->orWhere('city', 'like', '%' . $searchTerm . '%')
                ->orWhere('state', 'like', '%' . $searchTerm . '%')
                ->orWhere('zip_code', 'like', '%' . $searchTerm . '%');
        });
        $users = $query->paginate(30);
        $data = [
            'active_page' => 'users',
            'users' => $users
        ];
        return view('admin.users_list', $data);
    }

    public function users_add()
    {
        $data = [
            'active_page' => 'users'
        ];
        return view('admin.users_add', $data);
    }

    public function users_add_handler(Request $request)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address_1' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'flag' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'password' => 'required|string|min:6',
            'status' => 'required|boolean',
            'is_admin' => 'required|boolean',
        ], [
            'avatar.image' => 'The avatar must be an image file.',
            'avatar.mimes' => 'The avatar must be a file of type: jpeg, png, jpg.',
            'avatar.max' => 'The avatar may not be greater than 2MB in size.',
            'first_name.required' => 'The first name field is required.',
            'first_name.max' => 'The first name may not be greater than 255 characters.',
            'last_name.required' => 'The last name field is required.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone.required' => 'The phone field is required.',
            'phone.max' => 'The phone may not be greater than 20 characters.',
            'address_1.required' => 'The address line 1 field is required.',
            'address_1.max' => 'The address line 1 may not be greater than 255 characters.',
            'city.required' => 'The city field is required.',
            'city.max' => 'The city may not be greater than 255 characters.',
            'flag.required' => 'The flag field is required.',
            'flag.max' => 'The flag may not be greater than 255 characters.',
            'country.required' => 'The country field is required.',
            'country.max' => 'The country may not be greater than 255 characters.',
            'state.required' => 'The state field is required.',
            'state.max' => 'The state may not be greater than 255 characters.',
            'zip_code.required' => 'The zip code field is required.',
            'zip_code.max' => 'The zip code may not be greater than 20 characters.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'status.required' => 'The account status field is required.',
            'status.boolean' => 'The account status must be either true or false.',
            'is_admin.required' => 'The admin access field is required.',
            'is_admin.boolean' => 'The admin access must be either true or false.',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/avatars');
        } else {
            $avatarPath = 'avatars/default_avatar.png';
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->city = $request->city;
        $user->flag = $request->flag;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->password = Hash::make($request->password);
        $user->is_active = $request->status;
        $user->is_admin = $request->is_admin;
        $user->avatar = $avatarPath;
        $user->save();

        event(new Registered($user));
        return redirect()->route('admin_users_list')->with('success', 'User has been created successfully');
    }

    public function users_view()
    {
        try {
            $uid = request()->query('uid');
            $user = User::findOrFail($uid);
            $data = [
                'active_page' => 'users',
                'user' => $user
            ];
            return view('admin.users_view', $data);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin_users_list');
        }
    }

    public function users_view_handler(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$request->user_id,
            'phone' => 'required|string|max:20',
            'address_1' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'flag' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'status' => 'required|boolean',
            'is_admin' => 'required|boolean',
        ], [
            'avatar.image' => 'The avatar must be an image file.',
            'avatar.mimes' => 'The avatar must be a file of type: jpeg, png, jpg.',
            'avatar.max' => 'The avatar may not be greater than 2MB in size.',
            'first_name.required' => 'The first name field is required.',
            'first_name.max' => 'The first name may not be greater than 255 characters.',
            'last_name.required' => 'The last name field is required.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone.required' => 'The phone field is required.',
            'phone.max' => 'The phone may not be greater than 20 characters.',
            'address_1.required' => 'The address line 1 field is required.',
            'address_1.max' => 'The address line 1 may not be greater than 255 characters.',
            'city.required' => 'The city field is required.',
            'city.max' => 'The city may not be greater than 255 characters.',
            'flag.required' => 'The flag field is required.',
            'flag.max' => 'The flag may not be greater than 255 characters.',
            'country.required' => 'The country field is required.',
            'country.max' => 'The country may not be greater than 255 characters.',
            'state.required' => 'The state field is required.',
            'state.max' => 'The state may not be greater than 255 characters.',
            'zip_code.required' => 'The zip code field is required.',
            'zip_code.max' => 'The zip code may not be greater than 20 characters.',
            'password.min' => 'The password must be at least 6 characters.',
            'status.required' => 'The account status field is required.',
            'status.boolean' => 'The account status must be either true or false.',
            'is_admin.required' => 'The admin access field is required.',
            'is_admin.boolean' => 'The admin access must be either true or false.',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->city = $request->city;
        $user->flag = $request->flag;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->is_active = $request->status;
        $user->is_admin = $request->is_admin;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('public/avatars');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('admin_users_view', ['uid' => $user->id])->with('success', 'User details updated successfully.');
    }

    public function users_delete_account(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ], [
            'user_id.required' => 'User ID is required',
            'user_id.exists' => 'Invalid user ID'
        ]);
        $user = User::findOrFail($request->user_id);
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete yourself');
        }
        $user->delete();
        return redirect()->back()->with('success', 'User account deleted successfully');
    }
}
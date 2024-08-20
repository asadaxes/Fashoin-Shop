<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function account()
    {
        return view('user.account');
    }

    public function account_update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())->where(function ($query) use ($request) {
                return $query->where('email', $request->email);
            })],
            'phone' => 'required|string|max:25',
            'address_1' => 'required|string|max:255',
            'address_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'flag' => 'required|string|max:25',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:25'
        ], [
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',
            'address_1.required' => 'The address field is required.',
            'city.required' => 'The city field is required.',
            'country.required' => 'The country field is required.',
            'state.required' => 'The state field is required.',
            'zip_code.required' => 'The zip code field is required.'
        ]);

        $user = User::findOrFail(auth()->id());
        $user->first_name = ucfirst($request->input('first_name'));
        $user->last_name = ucfirst($request->input('last_name'));
        $user->email = $request->input('email');
        $user->address_1 = $request->input('address_1');
        $user->address_2 = $request->input('address_2');
        $user->city = ucfirst($request->input('city'));
        $user->flag = $request->input('flag');
        $user->country = ucfirst($request->input('country'));
        $user->state = ucfirst($request->input('state'));
        $user->zip_code = $request->input('zip_code');

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        $user->save();
        return redirect()->back()->with('success', 'Your profile updated successfully');
    }


    public function account_password_update(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:6|different:current_password',
            'password_confirmation' => 'required|same:new_password',
        ]);
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Incorrect current password!');
        }
        $user = User::findOrFail(auth()->id());
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->back()->with('success', 'Your password has been changed successfully!');
    }

    public function account_delete(Request $request)
    {
        $request->validate([
            'password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('Incorrect current password!');
                }
            }],
            'verify' => 'required|in:confirm',
        ], [
            'verify.required' => 'Please type "confirm" correctly!',
            'verify.in' => 'Please type "confirm" correctly!',
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login")->with("success", "We'll miss you! Thanks for being part of our community. Best of luck on your journey!");
    }


    public function update_profile_img(Request $request)
    {
        $user = User::findOrFail(auth()->id());

        if ($request->hasFile('avatar')) {
            if ($user->avatar !== "avatars/default_avatar.png") {
                Storage::disk('public')->delete($user->avatar);
            }
            $randomString = Str::random(25);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $imagePath = $request->file('avatar')->storeAs('avatars', $randomString . '.' . $extension, 'public');
            $user->avatar = $imagePath;
            $user->save();
            return redirect()->back()->with('success', 'Your profile updated successfully');
        }

        if ($request->has('selected_avatar')) {
            $selectedAvatarUrl = $request->input('selected_avatar');
            $filename = basename($selectedAvatarUrl);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = Str::random(25) . '.' . $extension;
            $source = public_path('assets/avatars/' . $filename);
            $destination = storage_path('app/public/avatars/' . $newFilename);
            $destination = str_replace('\\', '/', $destination);

            if (file_exists($source)) {
                if (!file_exists(dirname($destination))) {
                    mkdir(dirname($destination), 0755, true);
                }
                $copied = copy($source, $destination);
                if ($copied) {
                    if ($user->avatar !== "avatars/default_avatar.png") {
                        Storage::disk('public')->delete($user->avatar);
                    }
                    $user->avatar = 'avatars/' . $newFilename;
                    $user->save();

                    return redirect()->back()->with('success', 'Your profile picture has been updated');
                } else {
                    return redirect()->back()->with('error', 'Failed to set the selected profile picture');
                }
            } else {
                return redirect()->back()->with('error', 'Source profile picture file not found');
            }
        }
    }

    public function shipping_address()
    {
        return view('user.shipping_address');
    }

    public function add_shipping_address(Request $request)
    {
        $validatedData = $request->validate([
            'recipient_name' => 'required|string',
            'recipient_phone' => 'required|string',
            'shipping_location' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'shipping_address' => 'required|string'
        ], [
            'recipient_name.required' => 'The recipient name is required.',
            'recipient_phone.required' => 'The phone number is required.',
            'shipping_location.required' => 'The shipping location is required.',
            'country.required' => 'The country is required.',
            'city.required' => 'The city is required.',
            'postal_code.required' => 'The postal code is required.',
            'shipping_address.required' => 'The shipping address is required.'
        ]);

        $user = User::findOrFail(auth()->id());
        $shippingAddresses = json_decode($user->shipping_address, true) ?? [];

        if (!is_array($shippingAddresses)) {
            $shippingAddresses = [];
        }

        $newAddress = [
            'id' => count($shippingAddresses) + 1,
            'recipient_name' => $validatedData['recipient_name'],
            'recipient_phone' => $validatedData['recipient_phone'],
            'shipping_location' => $validatedData['shipping_location'],
            'country' => $validatedData['country'],
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code'],
            'shipping_address' => $validatedData['shipping_address'],
            'default' => false
        ];

        $shippingAddresses[] = $newAddress;
        $user->update(['shipping_address' => json_encode($shippingAddresses)]);

        return redirect()->back()->with('success', 'Shipping address added successfully.');
    }

    public function set_default_shipping_address($id)
    {
        $user = User::findOrFail(auth()->id());
        $shippingAddresses = json_decode($user->shipping_address, true) ?? [];
    
        foreach ($shippingAddresses as &$address) {
            $address['default'] = false;
        }
    
        foreach ($shippingAddresses as &$address) {
            if ($address['id'] == $id) {
                $address['default'] = true;
                break;
            }
        }
    
        $user->update(['shipping_address' => json_encode($shippingAddresses)]);
    
        return redirect()->back()->with('success', 'Shipping address set as default.');
    }

    public function edit_shipping_address(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'recipient_name' => 'required|string',
            'recipient_phone' => 'required|string',
            'shipping_location' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'shipping_address' => 'required|string',
        ], [
            'recipient_name.required' => 'The recipient name is required.',
            'recipient_phone.required' => 'The phone number is required.',
            'shipping_location.required' => 'The shipping location is required.',
            'country.required' => 'The country is required.',
            'city.required' => 'The city is required.',
            'postal_code.required' => 'The postal code is required.',
            'shipping_address.required' => 'The shipping address is required.',
        ]);

        $user = User::findOrFail(auth()->id());
        $shippingAddresses = json_decode($user->shipping_address, true) ?? [];
        foreach ($shippingAddresses as &$address) {
            if ($address['id'] == $validatedData['id']) {
                $address['recipient_name'] = $validatedData['recipient_name'];
                $address['recipient_phone'] = $validatedData['recipient_phone'];
                $address['shipping_location'] = $validatedData['shipping_location'];
                $address['country'] = $validatedData['country'];
                $address['city'] = $validatedData['city'];
                $address['postal_code'] = $validatedData['postal_code'];
                $address['shipping_address'] = $validatedData['shipping_address'];
                break;
            }
        }
    
        $updatedShippingAddresses = json_encode($shippingAddresses);
        $user->update(['shipping_address' => $updatedShippingAddresses]);
    
        return redirect()->back()->with('success', 'Shipping address updated successfully.');
    }

    public function delete_shipping_address($id)
    {
        $user = User::findOrFail(auth()->id());
        $shippingAddresses = json_decode($user->shipping_address, true) ?? [];

        $updatedAddresses = array_filter($shippingAddresses, function ($address) use ($id) {
            return $address['id'] != $id;
        });

        $user->update(['shipping_address' => json_encode(array_values($updatedAddresses))]);

        return redirect()->back()->with('success', 'Shipping address deleted successfully.');
    }

    public function order_history()
    {
        return view('user.order_history');
    }
}
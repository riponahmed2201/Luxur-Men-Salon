<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::with('profile')->where('id', Auth::id())->first();

        return view('admin.profiles.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:500'],
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        try {
            $user = Auth::user();

            // Update User basic info
            $user->name = $request->name;
            if ($user->email !== $request->email) {
                $user->email = $request->email;
                $user->email_verified_at = null;
            }
            $user->save();

            // Update or Create UserProfile
            $profileData = [
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('profiles', $filename, 'public');
                $profileData['picture'] = $path;

                // Optional: Delete old picture if exists
                if ($user->profile && $user->profile->picture) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($user->profile->picture);
                }
            }

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                $profileData
            );

            notify()->success("Profile updated successfully.", "Success");
            return back();
        } catch (Exception $exception) {
            Log::error("Profile update failed", ['error' => $exception->getMessage()]);
            notify()->error("Something went wrong! Please try again.", "Error");
            return back();
        }
    }
}

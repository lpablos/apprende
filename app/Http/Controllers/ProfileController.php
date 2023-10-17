<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // Dashboard con las información
    public function dashboard(Request $request): View
    {   
        
        return view('application.pages.dashboard_index_user', [
            'user' => $request->user(),
        ]);
    }

    public function editUser(Request $request): View
    {
        return view('application.pages.dashboard_edit_user', [
            'user' => $request->user(),
        ]);
    }

    public function editPassword(Request $request): View
    {
        return view('application.pages.dashboard_rpassword_user', [
            'user' => $request->user(),
        ]);
    }

    public function deleteAccount(Request $request): View
    {
        return view('application.pages.dashboard_delete_account', [
            'user' => $request->user(),
        ]);
    }
}

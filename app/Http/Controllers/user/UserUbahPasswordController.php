<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserUbahPasswordController extends Controller
{
    public function showProfile()
    {
        return view('user.profile');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'current_password' => 'required',
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Verifikasi password saat ini
        if (Hash::check($request->current_password, $user->password)) {
            // Update nama
            $user->name = $request->name;

            // Jika ada password baru, update password juga
            if ($request->new_password) {
                $user->password = Hash::make($request->new_password);
            }

            // Simpan perubahan pada user
            $user->save();

            return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui.');
        } else {
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
        }
    }
}

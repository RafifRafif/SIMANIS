<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Support\Facades\Hash;

class KelolaPenggunaController extends Controller
{
    public function index()
    {
        $users = User::with('unitKerja')->get(); // ambil relasi unit kerja
        $unitKerjas = UnitKerja::all(); // untuk dropdown
        return view('pages.kelola_pengguna', compact('users', 'unitKerjas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users,username',
            'nama' => 'required',
            'role2' => 'required',
            'role1' => 'nullable'
        ]);

        User::create([
            'username' => $request->nik,
            'name' => $request->nama,
            'role' => $request->role2,
            'unit_kerja_id' => $request->role1, // kalau nanti unit_kerja_id pakai id, bukan nama
            'password' => Hash::make('123456') // default password
        ]);

        return back()->with('success', 'Pengguna baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'role2' => 'required',
        ]);

        $user = User::findOrFail($id);

        // Update data
        $user->update([
            'username' => $request->nik,
            'name' => $request->nama,
            'role' => $request->role2,
            'unit_kerja_id' => $request->role1
        ]);

        return back()->with('success', 'Data pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Data pengguna berhasil dihapus!');
    }
}

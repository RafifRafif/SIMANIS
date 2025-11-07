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
        $unitKerja = UnitKerja::all(); // untuk dropdown
        return view('pages.kelola_pengguna', compact('users', 'unitKerja'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users,username',
            'nama' => 'required',
            'role2' => 'required',
            'role1' => 'nullable|exists:unit_kerja,id'
        ]);

        $unitId = $request->role1;
        $unitName = null;
        if ($unitId) {
            $unit = UnitKerja::find($unitId);
            $unitName = $unit ? strtolower($unit->nama_unit) : null;
        }

        $role = $request->role2;

        // Tambahan validasi khusus:
        if ($role === 'kepala_unit' && !$unitId) {
            return back()->withInput()->withErrors([
                'role1' => 'Kepala Unit wajib memiliki Unit Kerja.'
            ]);
        }


        // Mapping rules (sama seperti frontend)
        $valid = false;
        if (!$unitId) {
            // no unit -> only auditor
            $valid = ($role === 'auditor');
        } elseif (strpos($unitName, 'p4m') !== false) {
            $valid = ($role === 'p4m');
        } elseif (strpos($unitName, 'manajemen') !== false) {
            $valid = ($role === 'manajemen');
        } else {
            // any other unit -> kepala_unit or auditor
            $valid = in_array($role, ['kepala_unit', 'auditor']);
        }

        if (!$valid) {
            return back()->withInput()->withErrors(['role2' => 'Kombinasi Unit Kerja dan Role tidak valid.']);
        }



        User::create([
            'username' => $request->nik,
            'name' => $request->nama,
            'role' => $request->role2,
            'unit_kerja_id' => $unitId,
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

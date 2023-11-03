<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Yakin ingin hapus data?';
        confirmDelete($title);
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', [
            'satker' => Satker::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|max:10|unique:users,username',
            'satker_id' => 'required',
            'password' => 'required'
        ], $message = [
            'satker_id.required' => 'satuan kerja wajib diisi.'
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'satker_id' => $request->satker_id,
            'is_admin' => 0
        ]);

        return redirect()->route('users.index')->with('success', 'Data Pengguna Berhasil Ditambahkan');
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
    public function edit(User $user)
    {
        $satker = Satker::all();
        return view('admin.users.edit', compact('satker', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|max:10|unique:users,username,' . $user->id,
            'satker_id' => 'required',
        ], $message = [
            'satker_id.required' => 'satuan kerja wajib diisi.'
        ]);

        if ($request->password === null) {
            $user->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'satker_id' => $request->satker_id,
            ]);
        } else {
            $user->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'satker_id' => $request->satker_id,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Data Pengguna Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data Pengguna Berhasil Dihapus');
    }
}

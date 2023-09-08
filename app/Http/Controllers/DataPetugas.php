<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;


class DataPetugas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode = User::kode();
        return view('dashboard.datapengguna.index', [
            'title' => 'Data Pengguna',
            'user1' => User::all(),
            'kode' => $kode,
            'usedKelas' => User::where('role', 'walikelas')->pluck('kelas')->toArray()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|max:255',
            'role' => 'required|in:operator,walikelas',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        // Check if the selected class already exists for users with the same role
        if ($validatedData['role'] === 'walikelas') {
            $selectedKelas = $request->input('kelas');
            $existingUser = User::where('role', 'walikelas')->where('kelas', $selectedKelas)->first();
            if ($existingUser) {
                return redirect('/datapengguna')->with('error', 'Kelas yang dipilih sudah ada.');
            }
        }

        // Set nilai default untuk kolom "kelas" jika role adalah "operator"
        if ($validatedData['role'] === 'operator') {
            $validatedData['kelas'] = 'Operator';
        } else {
            // Set nilai kelas sesuai dengan pilihan kelas yang dipilih
            $validatedData['kelas'] = $request->input('kelas');
        }

        User::create($validatedData);

        return redirect('/datapengguna')->with('success', 'Data Pengguna Berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.datapengguna.edit', [
            'title' => 'Edit Data Pengguna',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'role' => 'required|in:operator,walikelas',
        ]);

        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];

        if ($validatedData['role'] === 'operator') {
            $user->kelas = 'Operator';
        } else {
            $user->kelas = $request->input('kelas');
        }

        $user->save();
        return redirect('/datapengguna')->with('success', 'Profile Anda Berhasil di Perbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function destroy(User $user)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/datapengguna')->with('success', 'Data Pengguna Berhasil di hapus!');
    }
}

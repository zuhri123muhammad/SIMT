<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::paginate(10);
        return view('dashboard.mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('dashboard.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => [
                'required', 
                'min:8', 
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.[!$#%]).*$/'
            ],
            'fullName' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
        ]);
        $email = $request->email;
        $fullName = $request->fullName;
        $fakultas = $request->fakultas;
        $jurusan = $request->jurusan;
        $angkatan = $request->angkatan;
        $password = Hash::make($request->password);

        $user = User::create([
            'name' => $fullName,
            'email' => $email,
            'password' => $password,
            'role' => 'isMahasiswa'
        ]);

        if ($user) {
            $success = Mahasiswa::create([
                'user_id' => $user->id,
                'fullName' => $fullName,
                'fakultas' => $fakultas,
                'jurusan' => $jurusan,
                'angkatan' => $angkatan,
            ]);
            if ($success) {
                toastr()->success('Data berhasil disimpan!', 'Selamat');
                return redirect()->route('data-mahasiswa');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa, $id)
    {
        $data = Mahasiswa::with('prestasies')->where('id', $id)->first();
        return view('dashboard.mahasiswa.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa, $id)
    {
        $data = Mahasiswa::with('user')->where('id', $id)->first();

        return view('dashboard.mahasiswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa, $id)
    {
        
        $find = Mahasiswa::findorfail($id);
        $user = User::where('id', $find->user_id)->first();
        $validated = $request->validate([
           'email' => 'unique:users,email,' . $find->user_id,
       ]);
        $fullName = $request->fullName;
        $email = $request->email;
        $find->update([
            'fullName' => $fullName
        ]);
        $user->update([
                'name' => $fullName
            ]);

        if ($email !== $user->email) {
            $user->update([
                'email' => $email
            ]);
        }

        toastr()->success('Data berhasil disimpan!', 'Selamat');
        return redirect()->route('data-mahasiswa');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa, $id)
    {
        $find1 = Mahasiswa::findorfail($id);
        $find2 = User::findorfail($find1->user_id);
        $find1->delete();
        $find2->delete();
        toastr()->warning('Data berhasil dihapus!', 'Selamat');
        return redirect()->route('data-mahasiswa');

    }
}

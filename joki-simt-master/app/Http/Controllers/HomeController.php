<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard() {
        if (Auth::check() && Auth::user()->role == 'isMahasiswa') {
            $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();
            $prestasiSelf = PrestasiMahasiswa::where('mahasiswa_id', $mhs->id)->count();
            return view('dashboard.main.main', compact(['prestasiSelf']));
        }else {
            $mahasiswa = Mahasiswa::count();
            $prestasi = PrestasiMahasiswa::count();
            return view('dashboard.main.main', compact(['mahasiswa', 'prestasi']));
        }
    }
    public function home() {
        $d3SI = DB::table('prestasi_mahasiswas as pm')
                ->join('mahasiswas as m', 'm.id', '=', 'pm.mahasiswa_id')
                ->where('m.jurusan',  '=', 'D3 - Sistem Informasi')
                ->count();
        $S1SI = DB::table('prestasi_mahasiswas as pm')
                ->join('mahasiswas as m', 'm.id', '=', 'pm.mahasiswa_id')
                ->where('m.jurusan',  '=', 'S1 - Sistem Informasi')
                ->count();
        $S1I = DB::table('prestasi_mahasiswas as pm')
                ->join('mahasiswas as m', 'm.id', '=', 'pm.mahasiswa_id')
                ->where('m.jurusan',  '=', 'S1 - Informatika')
                ->count();
        $prestasi = PrestasiMahasiswa::with('mahasiswa')->latest()->take(8)->get();
        return view('pages.index', compact(['prestasi', 'd3SI', 'S1SI', 'S1I']));
    }
    public function detail($id){
        $data = Mahasiswa::with('user', 'prestasies')->where('id', $id)->first();
        return view('pages.detail', compact('data'));
    }
    public function profil(){
        $data = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('pages.profil', compact('data'));
    }
}

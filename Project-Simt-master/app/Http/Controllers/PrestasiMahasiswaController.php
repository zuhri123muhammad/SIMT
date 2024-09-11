<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PrestasiMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use App;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

class PrestasiMahasiswaController extends Controller
{
    public function downloadPdf()
    {
        $data = PrestasiMahasiswa::with('mahasiswa')->get();
        $pdf = PDF::loadview('pdf.prestasi', ['data' => $data]);
        return $pdf->stream();

    }
    public function process(Request $request, $id) {
        $data = PrestasiMahasiswa::with('mahasiswa')->where('id', $id)->first();
        $nama = $data->mahasiswa->fullName;
        $date = $data->date;
        $cName = $data->name;
        $outputfile = public_path().'dcc.pdf';
        $this->fillPDF(public_path().'\master/dcc.pdf', $outputfile, $nama, $date, $cName);
        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile, $nama, $date, $cName) {
        $fpdi = new Fpdi();
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top = 70;
        $topDate = 105;
        $topCer = 78;
        $right = 98;
        $rightCer = 75;
        $rightDate = 25;
        $name = $nama;
        $dateC = $date;
        $nameCer = $cName;
        $fpdi->SetFont("helvetica","",17);
        $fpdi->SetTextColor(25,26,25);
        $fpdi->Text($right, $top, $name);
        $fpdi->Text($rightDate, $topDate, $dateC);
        $fpdi->Text($rightCer, $topCer, $cName);

        return $fpdi->Output($outputfile,'F');
    }
    public function index()
    {
        $data = PrestasiMahasiswa::with('mahasiswa')->paginate(20);
        return view('dashboard.prestasi-oprtr.index', compact('data'));
    }
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request) {
        $kw = $request->kw;

        $data = Mahasiswa::where(function ($query) use ($kw) {
            $query->where('fullName', 'LIKE', "%{$kw}%")
            ->orWhere('fakultas', 'LIKE', "%{$kw}%");
        })->orWhere('jurusan', 'LIKE', "%{$kw}%")->get();
        return view('pages.search', compact(['data', 'kw']));

    }
    public function selfIndex()
    {   
        $user = Auth::user()->id;
        $mhs = Mahasiswa::where('user_id', $user)->first();
        $data = PrestasiMahasiswa::where('mahasiswa_id', $mhs->id)->get();

        return view('dashboard.prestasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.prestasi.create');
    }

    public function download($name) {
        $filepath = public_path('storage/').$name;
        return Response::download($filepath);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          
        $user = Auth::user()->id;
        $mhs = Mahasiswa::where('user_id', $user)->first();
        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $filename = $image->getClientOriginalName();
            $image->storeAs('public/',$filename);

             $data = [
            'mahasiswa_id' => $mhs->id,
            'name'      => $request->name,
            'desc'     => $request->desc,
            'date'     => $request->date,
            'level'   => $request->level,
            'type'   => $request->type,
            'image' => $filename,
        ];
        }else{
                $data = [
                'mahasiswa_id' => $mhs->id,
                    'name'      => $request->name,
                    'desc'     => $request->desc,
                    'date'     => $request->date,
                    'level'   => $request->level,
                    'type'   => $request->type,
                ];

        }
          

        $validator = Validator::make($data,[
            'name'      => 'required|string|min:3|max:125',
            'desc'     => 'required|string',
            'date'     => 'required',
            'level'   => 'required',
            'type'   => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else{
            PrestasiMahasiswa::create($data);

            return redirect()->route('prestasi');
            

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PrestasiMahasiswa $prestasiMahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrestasiMahasiswa $prestasiMahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrestasiMahasiswa $prestasiMahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrestasiMahasiswa $prestasiMahasiswa, $id)
    {
        $find = PrestasiMahasiswa::findorfail($id);
        $find->delete();
        return redirect()->route('prestasi');
    }
}

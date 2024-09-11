@extends('welcome')

@section('content-pages')
    <section class="text-dark">
            <div class="container align-items-center" style="margin-top: 14rem; margin-bottom: 14rem">
                <div class="row">
                    <div class="col-0 col-md-1"></div>
                    <div class="col-12 col-sm-4 col-md-4">
                        <img src="{{asset('assets/img/logo1.PNG')}}" width="300" height="300" alt="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <h2 class="font-weight-bold">SIMT</h2>
                        <p>Sistem Informasi Manajemen Talenta</p>
                        <hr>
                        <div class="mt-5">
                            <p>Cek portofolio prestasi kamu</p>
                            <form action="{{route('search')}}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kw" id="">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> </button>
                                    </div>
                                </div>
                            </form>
                            <p>keyword: Nama Mahasiswa, Fakultas, Jurusan</p>
                        </div>
                    </div>
                    <div class="col-0 col-md-1"></div>
                </div>
            </div>
        </section>

        {{-- <section class="mb-5">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h2 class="text-black">Kurasi</h2>
                                <p class="text-black">
                                    Apabila kamu punya prestasi ajang/non ajang diluar dari yang diselenggarakan oleh Kementerian Pendidikan Kebudayaan, Riset dan Teknologi, daftarkan prestasi kamu.
                                </p>
                            </div>
                            <div class="">
                                <a href="" class="btn btn-primary">Kurasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="mb-5">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <p>Prestasi Mahasiswa Terkini</p>
                        <div class="row">
                            @foreach ($prestasi as $item)
                            <div class="col-3 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="rounded-circle" src="{{asset('assets/img/undraw_profile_3.svg')}}" width="100" height="100" alt="...">
                                        <div class="txt mt-2">
                                            <p class="p-0 m-0 font-weight-bold">{{$item->mahasiswa->fullName}}</p>
                                            <p class="p-0 m-0">
                                                @if ($item->mahasiswa->fakultas !== null)
                                                    {{$item->mahasiswa->fakultas}}
                                                @else
                                                ----
                                                @endif
                                                |
                                                @if ($item->mahasiswa->jurusan !== null)
                                                    {{$item->mahasiswa->jurusan}}
                                                @else
                                                ----
                                                @endif
                                            </p>
                                            <p class="font-italic">
                                                {{$item->name}}
                                            </p>
                                        </div>
                                        <a class="btn btn-outline-primary" href="{{route('detail-profile', ['id' => $item->mahasiswa->id])}}" style="width: 100%">
                                            Lihat Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <p>Mahasiswa Berprestasi</p>
                                <p>Statistik Prestasi Perjurusan</p>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    D3 - Sistem Informasi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$d3SI}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    S1 - Informatika</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$S1I}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    S1 - Sistem Informasi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$S1SI}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
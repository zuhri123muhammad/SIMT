@extends('dashboard.index')

@section('content')
     <div class="container-fluid">
        <div class="d-flex flex-md-row flex-column-reverse">
            <div class="col-12 col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Biodata</h2>
                    </div>
                    <div class="card-body text-center">
                        @if ($data->avatar !== null)
                                            
                        @else
                            <img class="rounded-circle" src="{{asset('assets/img/undraw_profile_3.svg')}}" width="150" height="150" alt="...">
                        @endif
                        <h5>{{$data->fullName}}</h5>
                    </div>
                    <hr>
                     <div class="table-responsive">
                                <table class="table" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th class="col-4">Nama Lengkap</th>
                                            <th class="col-1">:</th>
                                            <td class="col-7">{{$data->fullName}}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Gender</th>
                                            <th class="col-1">:</th>
                                            <td class="col-7">
                                                @if ($data->gender !== null)
                                                    {{$data->gender}}
                                                @else
                                                    ------
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Alamat</th>
                                            <th class="col-1">:</th>
                                            <td class="col-7">
                                                @if ($data->address !== null)
                                                    {{$data->address}}
                                                @else
                                                    ------
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Fakultas</th>
                                            <th class="col-1">:</th>
                                            <td class="col-7">
                                                @if ($data->fakultas !== null)
                                                    {{$data->fakultas}}
                                                @else
                                                    ------
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Jurusan</th>
                                            <th class="col-1">:</th>
                                            <td class="col-7">
                                                @if ($data->jurusan !== null)
                                                    {{$data->jurusan}}
                                                @else
                                                    ------
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Angkatan</th>
                                            <th class="col-1">:</th>
                                            <td class="col-7">
                                                @if ($data->angkatan !== null)
                                                    {{$data->angkatan}}
                                                @else
                                                    ------
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Phone</th>
                                            <th class="col-1">:</th>
                                            <td class="col-7">
                                                @if ($data->phone !== null)
                                                    {{$data->phone}}
                                                @else
                                                    ------
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
            <div class="col-12 col-md-7 mb-5 mb-md-0">
                <div class="card">
                    <div class="card-header">
                        <h2>Prestasi</h2>
                    </div>
                    <div class="card-body">
                         <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Tingkat</th>
                                            <th>Tipe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($data->prestasies))
                                            @foreach ($data->prestasies as $item)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->date}}</td>
                                                    <td>{{$item->level}}</td>
                                                    <td>{{$item->type}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td rowspan="4">Belum ada prestasi</td>
                                            </tr>                                         
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
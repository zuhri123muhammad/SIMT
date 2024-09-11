@extends('welcome')

@section('content-pages')
     <div class="container-fluid">
        <div class="d-flex flex-md-row flex-column-reverse mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>Biodata</h2>
                            <div class="btn-group align-items-center">
                                <a href="" class="btn btn-sm btn-primary">Ganti Foto</a>
                                <a href="" class="btn btn-sm btn-warning">Edit Profil</a>
                                <a href="" class="btn btn-sm btn-danger">Ganti Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        @if ($data->avatar !== null)
                                            
                        @else
                            <img class="rounded-circle" src="{{asset('assets/img/undraw_profile_3.svg')}}" 
                            width="150" height="150" alt="...">
                        @endif
                        <h5>{{$data->fullName}}</h5>
                        <h5>{{$data->user->email}}</h5>
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
        </div>
    </div>
@endsection
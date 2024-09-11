@extends('dashboard.index')

@section('content')
     <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex flex-md-row flex-column justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
                        <div>
                            <a href="{{route('create-mahasiswa')}}" class="btn btn-sm btn-primary">Tambah Mahasiswa</a>
                        </div>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <th>Avatar</th>
                                            <th>Fakultas</th>
                                            <th>Jurusan</th>
                                            <th>Angkatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->fullName}}</td>
                                                <td>
                                                    @if ($item->avatar !== null)
                                                        
                                                    @else
                                                        <img class="rounded-circle" 
                                                        src="{{asset('assets/img/undraw_profile_3.svg')}}" alt="...">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->fakultas !== null)
                                                        {{$item->fakultas}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                     @if ($item->jurusan !== null)
                                                        {{$item->jurusan}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->angkatan !== null)
                                                        {{$item->angkatan}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{route('edit-mahasiswa', ['id' => $item->id])}}" 
                                                            class="btn btn-sm btn-warning">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href="{{route('destroy-mahasiswa', ['id' => $item->id])}}" 
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                            Hapus
                                                        </a>
                                                        <a href="{{route('prestasi-mahasiswa', ['id' => $item->id])}}" 
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fa fa-certificate"></i>
                                                            Sertifikat
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex flex-row-reverse">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            {{$data->links()}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
@endsection
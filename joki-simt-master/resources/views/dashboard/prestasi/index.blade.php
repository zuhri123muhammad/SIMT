@extends('dashboard.index')

@section('content')
     <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex flex-md-row flex-column justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Prestasi Saya</h1>
                        <div>
                            <a href="{{route('prestasi-create')}}" class="btn btn-sm btn-primary">Tambah Prestasi</a>
                        </div>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Prestasi</th>
                                            <th>Deskripsi</th>
                                            <th>Tgl</th>
                                            <th>Tingkatan</th>
                                            <th>Tipe</th>
                                            <th>opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($data as $item)
                                          <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->desc}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->level}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    @if ($item->image === null)
                                                        <a target="_blank" href="{{route('buat', ['id' => $item->id])}}" class="btn btn-sm btn-primary">Download</a>
                                                    @else
                                                        <a href="{{route('prestasi-download', ['name' => $item->image])}}" class="btn btn-sm btn-primary">Download</a>
                                                    @endif
                                                    <a href="{{route('prestasi-destroy', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Hapus</a>
                                                </div>
                                            </td>
                                          </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection
@extends('dashboard.index')

@section('content')
     <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex flex-md-row flex-column justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Data Prestasi</h1>
                        <div>
                            <a href="{{route('pdf-download')}}" class="btn btn-sm btn-primary">Download PDF</a>
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
                                            <th>Nama Mahasiswa</th>
                                            <th>Tanggal</th>
                                            <th>Tingkat</th>
                                            <th>Tipe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->mahasiswa->fullName}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->level}}</td>
                                                <td>{{$item->type}}</td>
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
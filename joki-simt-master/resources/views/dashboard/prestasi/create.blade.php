@extends('dashboard.index')

@section('content')
     <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex flex-md-row flex-column justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Tambah Prestasi</h1>
                        <div>
                            <a href="{{url()->previous()}}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{route('prestasi-store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="pt-4 pb-2">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-center badge badge-danger d-flex flex-column">{{ $error }}</p>
                                    @endforeach
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Prestasi</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Prestasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Deskripsi Prestasi</label>
                                    <textarea class="form-control" name="desc" placeholder="masukkan deskripsi..." id="" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Prestasi</label>
                                    <input type="date" name="date" class="form-control " id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tingkatan Prestasi</label>
                                    <input type="text" name="level" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tingkat Prestasi" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Prestasi</label>
                                    <select class="form-control" name="type" id="" required>
                                        <option value="IT">IT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Foto Prestasi</label>
                                    <input type="file" name="image" id="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
@endsection
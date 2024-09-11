@extends('dashboard.index')

@section('content')
     <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex flex-md-row flex-column justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Tambah Mahasiswa</h1>
                        <div>
                            <a href="{{url()->previous()}}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{route('store-mahasiswa')}}" method="post">
                                @csrf
                                @if ($errors->any())
                                    <div class="pt-4 pb-2">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-center badge badge-danger d-flex flex-column">{{ $error }}</p>
                                    @endforeach
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <input type="text" name="fullName" class="form-control" id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" placeholder="Nama Lengkap Mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fakultas</label>
                                    <select class="form-control" name="fakultas" id="">
                                        <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jurusan</label>
                                    <select class="form-control" name="jurusan" id="">
                                        <option value="D3 - Sistem Informasi">D3 - Sistem Informasi</option>
                                        <option value="S1 - Informatika">S1 - Informatika</option>
                                        <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control" id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" placeholder="Angkatan Mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" placeholder="Email Mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" 
                                    placeholder="Password" required>
                                    <small id="emailHelp" class="form-text text-muted">Password harus mengandung huruf besar, huruf kecil, angka, dan special character.</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
@endsection
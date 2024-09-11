@extends('dashboard.index')

@section('content')
     <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex flex-md-row flex-column justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Edit Mahasiswa</h1>
                        <div>
                            <a href="{{url()->previous()}}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{route('update-mahasiswa', ['id' => $data->id])}}" method="POST">
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
                                    <input value="{{$data->fullName}}" type="text" name="fullName" 
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                    placeholder="Nama Lengkap Mahasiswa" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input value="{{$data->user->email}}" type="email" name="email" 
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                                    placeholder="Email Mahasiswa" >
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
@endsection
 
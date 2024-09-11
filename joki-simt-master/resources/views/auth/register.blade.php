@extends('auth.index')

@section('authContent')
      <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{route('register-request')}}" method="post" class="user">
                                @csrf
  
                                @if ($errors->any())
                                    <div class="pt-4 pb-2">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-center badge badge-danger d-flex flex-column">{{ $error }}</p>
                                    @endforeach
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" name="fullName" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nama Lengkap">
                                </div>  
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                                {{-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> --}}
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
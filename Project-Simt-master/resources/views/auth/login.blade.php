@extends('auth.index')

@section('authContent')
       <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h2>LOGIN</h2>
                                    <form class="user" action="{{ route('login-request') }}" method="post">
                                        @csrf
  
                                        @if ($errors->any())
                                            <div class="pt-4 pb-2">
                                            @foreach ($errors->all() as $error)
                                                <p class="text-center badge badge-danger d-flex flex-column">{{ $error }}</p>
                                            @endforeach
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('email')}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" value="{{ old('password')}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">LOGIN</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
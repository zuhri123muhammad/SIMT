@extends('welcome')

@section('content-pages')
        <section class="mb-5">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <p>Cari Prestasi : {{$kw}}</p>
                        <div class="row">
                            @foreach ($data as $item)
                            <div class="col-3 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="rounded-circle" src="{{asset('assets/img/undraw_profile_3.svg')}}" width="100" height="100" alt="...">
                                        <div class="txt mt-2">
                                            <p class="p-0 m-0 font-weight-bold">{{$item->fullName}}</p>
                                            <p class="p-0 m-0">
                                                @if ($item->fakultas !== null)
                                                    {{$item->fakultas}}
                                                @else
                                                ----
                                                @endif
                                                |
                                                @if ($item->jurusan !== null)
                                                    {{$item->jurusan}}
                                                @else
                                                ----
                                                @endif
                                            </p>
                                        </div>
                                        <a class="btn btn-outline-primary" href="{{route('detail-profile', ['id' => $item->id])}}" style="width: 100%">
                                            Lihat Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@extends('layouts.app')

@section('content')
<div class="container my-3">

</div>
<div class="container mt-3">
    <div class="row">
        @foreach ($allFilem as $item)
        <div class="col-lg-4 col-md-6 my-2">
            <div class="card">
                <img src="{{ asset('img/gambar/' . $item->gambar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ Str::limit($item->judul, 24, '...') }}</h5>
                        <p class="card-text">{!! Str::words($item->isi, 30, '...') !!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('detail', $item->id) }}" class="btn btn-primary">View</a>
                            <small class="text-body-secondary">{{ $item->user->name }} |
                                <span class="fw-bold">{{ $item->genre->nama_genre }}</span></small>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

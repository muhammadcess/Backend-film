@extends('layouts.app')
@section('content')
<div class="container"><a href="/"><h2><i class="bi bi-arrow-left-square-fill"></h2></i></a></div>
<div class="container p-4">
  <div class="row g-12">
    <div class="col-md-12">
      <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">{{ $Filem->judul }}</h2>
        <p class="blog-post-meta"> <a href="#"></a></p>
        <p class="blog-post-meta">{{ $Filem->created_at->format('F j, Y') }} by <a href="#">{{$Filem->user->name}}</a></p>
        <img src="{{ asset('img/gambar/' . $Filem->gambar) }}" class="mb-3 bd-placeholder-img card-img-top" alt="">
        {!! $Filem->isi !!}
      </article>
    </div>
  </div>
</div>
@endsection

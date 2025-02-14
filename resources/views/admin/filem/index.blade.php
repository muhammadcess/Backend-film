@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="fw-bold my-auto">Manajemen Film</h5>
                <a href="/filem-create" class="btn btn-secondary">Tambah Film</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive small">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($allFilem as $item)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ Str::limit($item->judul, 10) }}</td>
                            <td>{!! Str::words($item->isi, 20) !!}</td>
                            <td>{{ $item->genre->nama_genre }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{-- route('filem.show',$item->id) --}}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Preview</a>
                                    <a href="{{ route('filem.edit', $item->id) }}" class="btn btn-success btn-sm ms-1"><i class="bi bi-pencil-square"></i>Edit</a>
                                    <form onsubmit="return confirm('sure to delete this data')" action="{{ route('filem.delete', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mb-0 ms-1">
                                            <i class="bi bi-trash"></i>delete</button>
                                    </form>
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

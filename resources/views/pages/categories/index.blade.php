@extends('layouts.main')


@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Kategori</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        </ol>
    </div>
</div>
@endsection

@section('content')
    @if (session('success'))
    <script>
        Swal.fire({
            title: "Berhasil",
            text: "{{ session('success') }}",
            icon: "success"
            });
    </script>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="/categories/create" class="btn btn-sm btn-primary" >
                        Tambah Kategori
                    </a>
                </div>
                <div class="card body">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug ?? '-' }}</td>
                                <td>
                                    <div class="d-flex" >
                                        <a href="/categories/edit/{{ $category->id }}" class="btn btn-sm btn-warning mr-2" >
                                            Edit
                                        </a>
                                    {{-- <form action="/categories/{{ $category->id }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                    </form> --}}
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $category->id }}" >
                                        Hapus
                                    </button>
                                    </div>
                                </td>
                            </tr>
                                @include('pages.categories.modal-confirmation')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
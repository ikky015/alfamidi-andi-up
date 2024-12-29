@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-2">
        <h1>Dashboard</h1>
        {{-- @dd(auth()->check()) --}}
    </div>
</div>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 30vh;">
        <img src="{{ asset('templates/img/background.png') }}" alt="Logo DC Alfamidi Palu" class="img-fluid" style="max-width: 300px;">
    </div>

    <div class="text-center">
        <h2>Selamat datang di DC Alfamidi Palu</h2>
        <h5>Pantau dan Kelola Stok Barang dengan Mudah dan Cepat</h5>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $productCount }}</h3>
                    <p>Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                    <a href="/products" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $categoryCount }}</h3>
                    <p>Kategori</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                    <a href="/categories" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

@endsection


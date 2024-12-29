@php
    $menus = [
        (object) [
        "title" => "Dashboard",
        "path" => "/",
        "icon" => "fas fa-th",
        ],
        (object) [
        "title" => "Kategori",
        "path" => "categories",
        "icon" => "fas fa-th",
        ],
        (object) [
        "title" => "Produk",
        "path" => "products",
        "icon" => "fas fa-th",
        ],
    ];
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
        <img src="{{ asset('templates/img/logo.png') }}" alt="Logo" style="max-width: 50px; margin-bottom: 3px;">
        <span class="brand-text font-weight-light">DC Alfamidi Palu</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="{{ asset('templates/dist/img/logo1.jpg') }}" class="img-circle elevation-5" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @foreach ($menus as $menu)
                        <li class="nav-item">
                            <a href="{{ $menu->path[0] !== '/' ? '/' . $menu->path : $menu->path }}" class="nav-link {{ request()->path() === $menu->path ? 'active' : '' }}  ">
                                <i class="nav-icon {{ $menu->icon }}"></i>
                                <p>
                                    {{ $menu->title }}
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </aside>
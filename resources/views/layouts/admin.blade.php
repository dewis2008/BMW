<!doctype html>
<html lang="en-GB">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Admin | R&S Auto Works')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="admin-body">
        <main class="admin-shell">
            <header class="admin-topbar">
                <a class="brand" href="{{ route('admin.enquiries.index') }}">
                    <img src="{{ asset('images/work/rs-logo.jpg') }}" alt="" width="44" height="44">
                    <span>
                        <strong>R&S Auto Works</strong>
                        <small>Admin</small>
                    </span>
                </a>

                @auth
                    <div class="admin-header-actions">
                        <nav class="admin-nav" aria-label="Admin navigation">
                            <a href="{{ route('admin.enquiries.index') }}">Enquiries</a>
                            <a href="{{ route('admin.galleryItems.index') }}">Gallery</a>
                        </nav>

                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button class="button button-secondary button-small" type="submit">Log out</button>
                        </form>
                    </div>
                @endauth
            </header>

            @if(session('admin_success'))
                <div class="form-alert form-alert-success" role="status">{{ session('admin_success') }}</div>
            @endif

            @yield('content')
        </main>
    </body>
</html>

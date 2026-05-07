<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>@yield('title', 'Dashboard')</title>

    <style>
        body {
            background: #f5f7fb;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #1e293b;
            padding-top: 60px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #b20306;
        }

        /* Content */
        .main-content {
            margin-left: 220px;
            padding: 20px;
            margin-top: 60px;
        }

        /* Topbar */
        .topbar {
            position: fixed;
            top: 0;
            left: 220px;
            right: 0;
            height: 60px;
            background: white;
            display: flex;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            z-index: 1000;
        }
    </style>

    @stack('styles')
</head>

<body>

    @include('partials.sidebar')

    <div class="topbar">
        <h5 class="mb-0">Dashboard</h5>
    </div>

    <div class="main-content">
        @yield('main-content')
    </div>
    @stack('scripts')
</body>
</html>

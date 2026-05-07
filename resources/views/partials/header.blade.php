    <meta charset="utf-8">
        <meta name="viewport"
            content="width=device-width,  minimum-scale=0.8, maximum-scale = 0.8, user-scalable = no , shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.5.1/css/flag-icons.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- push target to head -->
        @stack('styles')
        <title>@yield('title')</title>

        <style>
            .shadow-red {
                box-shadow: 0rem 0.5rem 3rem rgba(178, 3, 6, 0.45) !important;
            }

            hr {
                background-color: rgb(233, 13, 16);
            }

            /* Premium Select2 Styling */
            .select2-container--default .select2-selection--single {
                height: 50px !important;
                border: 1px solid #e2e8f0 !important;
                border-radius: 12px !important;
                display: flex;
                align-items: center;
                transition: all 0.3s ease;
                box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            }
            .select2-container--default .select2-selection--single:focus,
            .select2-container--default.select2-container--open .select2-selection--single {
                border-color: #b20306 !important;
                box-shadow: 0 0 0 4px rgba(178, 3, 6, 0.1) !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #1e293b !important;
                font-size: 0.95rem !important;
                padding-left: 15px !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 48px !important;
                right: 10px !important;
            }
            .select2-dropdown {
                border: 1px solid #e2e8f0 !important;
                border-radius: 12px !important;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
                overflow: hidden;
                margin-top: 5px;
            }
            .select2-results__option--highlighted[aria-selected] {
                background-color: #b20306 !important;
            }
            .select2-search--dropdown .select2-search__field {
                border-radius: 8px !important;
                padding: 8px 12px !important;
            }

            /* Glassmorphism Status Badges */
            .badge-success-light { background: rgba(34, 197, 94, 0.1) !important; color: #15803d !important; border: 1px solid rgba(34, 197, 94, 0.2) !important; }
            .badge-warning-light { background: rgba(234, 179, 8, 0.1) !important; color: #a16207 !important; border: 1px solid rgba(234, 179, 8, 0.2) !important; }
            .badge-danger-light { background: rgba(239, 68, 68, 0.1) !important; color: #b91c1c !important; border: 1px solid rgba(239, 68, 68, 0.2) !important; }
            .badge-info-light { background: rgba(59, 130, 246, 0.1) !important; color: #1d4ed8 !important; border: 1px solid rgba(59, 130, 246, 0.2) !important; }
            .rounded-pill { border-radius: 50rem !important; }
        </style>
    </head>

    <body>

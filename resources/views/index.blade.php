@extends('master')

@section('title', 'Home')

@section('main-content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>Companies</h4>
                    <p class="text-muted">Manage all companies</p>

                    <a href="{{ route('company.add') }}" class="btn btn-primary">
                        + Add New Company
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>Retails</h4>
                    <p class="text-muted">Manage retail stores</p>

                    <a href="{{ route('retail.add') }}" class="btn btn-success">
                        + Add New Retail
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection

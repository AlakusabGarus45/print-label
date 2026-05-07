@extends('master')

@section('title', 'Add Company')

@section('main-content')

<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    Add New Company
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">

                    <form action="{{ route('company.store')}}" method="POST">
                        @csrf

                        <!-- Retail Name -->
                        <div class="mb-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter company name" required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Enter address" required></textarea>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-success w-100">
                            Save Retail
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection

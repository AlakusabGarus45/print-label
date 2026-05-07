@extends('master')

@section('title', 'Add Retail')

@section('main-content')

<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    Add New Retail
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">

                    <form action="{{ route('retail.store')}}" method="POST">
                        @csrf

                        <!-- Retail Name -->
                        <div class="mb-3">
                            <label class="form-label">Retail Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter retail name" required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Enter address" required></textarea>
                        </div>

                        <!-- Contact -->
                        <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" placeholder="Enter contact number" required>
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

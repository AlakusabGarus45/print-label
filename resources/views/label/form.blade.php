@extends('master')

@section('title', 'Add Company')

@section('main-content')

<div class="container mt-4">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    Print Label
                </div>

                <div class="card-body">

                    <form action="{{ route('print.label') }}" method="POST" target="_blank">
                        @csrf

                        <!-- FROM (Companies) -->
                        <div class="mb-3">
                            <label class="form-label">From</label>
                            <select name="from" class="form-control" required>
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- TO (Retails) -->
                        <div class="mb-3">
                            <label class="form-label">To</label>
                            <select name="to" id="retailSelect" class="form-control" required>
                                <option value="">Select Retail</option>
                                @foreach($retails as $retail)
                                    <option
                                        value="{{ $retail->id }}"
                                        data-address="{{ $retail->address }}"
                                        data-contact="{{ $retail->contact }}"
                                    >
                                        {{ $retail->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Auto-filled Address -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" readonly required>
                        </div>

                        <!-- Auto-filled Contact -->
                        <div class="mb-3">
                            <label class="form-label">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" readonly required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Number of Cartoon</label>
                            <input type="text" name="cartoon_no" id="cartoon_no" class="form-control" required>
                        </div>


                        <button type="submit" class="btn btn-success w-100">
                            Print Label
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    document.getElementById('retailSelect').addEventListener('change', function () {

        let selected = this.options[this.selectedIndex];

        let address = selected.getAttribute('data-address');
        let contact = selected.getAttribute('data-contact');

        document.getElementById('address').value = address || 'Not Found';
        document.getElementById('contact').value = contact || '';

    });

});
</script>
@endpush


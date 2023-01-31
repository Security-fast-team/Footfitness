@extends('backend.layouts.app')

@section('title', 'Product Management')

@push('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/summernote.min.css') }}">
@endpush

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Add Payment</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('payment.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">

                                @if(session()->has('message'))
                                    <div class="alert text-white" style="background-color: #28a745">{{ @session('message') }}</div>
                                @endif

                                <form method="post" action="{{ route('payment.insert') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="payment" class="col-form-label">Payment <span
                                                class="text-danger">*</span></label>
                                        <input id="payment" type="text" name="payment" placeholder="Enter your payment system"
                                               value="{{ old('payment') }}" class="form-control" required>

                                        @error('payment')
                                        <p class="text-danger fst-italic">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Payment description <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="summary" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('third_party_scripts')
    <script src="{{ asset('assets/js/DataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/summernote/summernote.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 100
            });

            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush

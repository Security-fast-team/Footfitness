@extends('backend.layouts.app')

@section('title', 'Brand Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page_css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                @if(session()->has('message'))
                    <div class="alert text-white" style="background-color: #28a745">{{ @session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1>View Payment</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('payment.create') }}" class="btn btn-info">Add new payment</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Payment system name</th>
                                    <th>Description</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($payment as $payment)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $payment->payment }}</td>
                                    <td>{!! $payment->description !!}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>
                                        <a href="{{ route('payment.payment_delete', $payment->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        {{--<form action="{{ url('payment_delete/'. $payment->id) }}" method="Post">
                                            @method('DELETE')
                                            @csrf
                                            <button  class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>--}}

                                        <a href="{{ route('payment.edite', $payment->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('third_party_scripts')
    <script src="{{ asset('assets/backend/js/DataTable/datatables.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    title: 'District Management',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'LETTER',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    }, 'pageLength'
                ]
            });
        });
    </script>
@endpush

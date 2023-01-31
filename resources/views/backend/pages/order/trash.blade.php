@extends('backend.layouts.app')

@section('title', 'Order Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
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
                            <h4>View Order</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('order.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')

                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Order No.</th>
                                        <th>Name</th>
                                        <th>phone</th>
                                        <th>Email</th>
                                        <th>Quantity</th>
                                        <th>Shiping Charge</th>
                                        <th>Total Amount</th>
                                        <th>Payment Number</th>
                                        <th>Payment Method</th>
                                        <th>Ordered Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->first_name }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->shipping->price }}</td>
                                            <td>TK{{ number_format($order->total_amount, 2) }}
                                            </td>
                                            <td>{{ $order->payment_number }}</td>
                                            <td>{{ $order->pamyment_methods }}</td>
                                            <td>{{ $order->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($order->order_status == 'new')
                                                    <span class="badge badge-primary">{{ $order->order_status }}</span>
                                                @elseif($order->order_status == 'process')
                                                    <span class="badge badge-warning">{{ $order->order_status }}</span>
                                                @elseif($order->order_status == 'delivered')
                                                    <span class="badge badge-success">{{ $order->order_status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $order->order_status }}</span>
                                                @endif
                                            </td>
                                            <td class="text-middle py-0 align-middle">
                                                <div class="btn-group">
                                                    <a href="{{ route('order.restore', $order->id) }}"
                                                        class="btn btn-dark btnEdit" title="Restore"><i
                                                            class="fas fa-trash-restore">Restore</i></a>
                                                    <a title="Permanently delete"
                                                        href="{{ route('order.destroy', $order->id) }}"
                                                        class="btn btn-danger btnDelete"><i
                                                            class="fas fa-trash">Delete</i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                        }
                    }, 'pageLength'
                ]
            });
        });
    </script>
@endpush

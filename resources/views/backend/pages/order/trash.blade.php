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
                                        <th>Shiping Charge</th>
                                        <th>Total Amount(BDT)</th>
                                        <th>Deleted At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->phone }}</td>
                                            @if ($order->shipping->type)
                                                <td class="align-middle">{{ $order->shipping->type . '(৳' . Number_format($order->shipping->price) . ')' }}</td>
                                                <td class="align-middle">৳{{ Number_format($price+$order->shipping->price) }}</td>
                                            @endif
                                            </td>
                                            <td>{{$order->updated_at->diffForHumans()}}</td>
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


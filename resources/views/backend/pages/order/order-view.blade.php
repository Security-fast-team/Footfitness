@extends('backend.layouts.app')

@section('title', 'Order Management')

@push('third_party_stylesheets')
    <link href="{{ asset('assets/backend/js/DataTable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('page_css')
    <style>
        .btn-box {
            display: flex;
            justify-content: center;
        }

        .dialogify-bottom-select {
            margin-bottom: 33px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                @php
                    $order_fetch = $orders->first();
                @endphp
                <div class="card">
                    <div class="card-header">
                        <h3>Cusomer Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table table-striped m-auto table-sm">
                                <tbody>
                                    <tr>
                                        <td>Order Number:</td>
                                        <td>{{ $order_fetch->order_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td>{{ $order_fetch->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{ $order_fetch->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>{{ $order_fetch->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Product Details</h4>
                        </span>

                    </div>
                    <div class="card-body">
                        @include('backend.partial.flush-message')
                        <div class="table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Product title</th>
                                        <th>Proudct Price</th>
                                        <th>Discount</th>
                                        <th>Quantity</th>
                                        <th>Shipping</th>
                                        <th>Total Amound</th>
                                        {{-- <th>Payment Method</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $order->product->title }}</td>
                                            <td>{{ $order->product->price }}</td>
                                            <td>{{ $order->product->discount }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->shipping->type . '(' . $order->shipping->price . ')৳' }}</td>
                                            <td>{{ $order->quantity * ($order->product->price - $order->product->discount) + $order->shipping->price }}৳
                                            </td>
                                            {{-- <td>{{ $order->quantity->payment_method ?? 'Cash on Delivery' }} --}}
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total =</td>
                                        <td>{{ $order_fetch->CusWiseTotal() }}৳</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

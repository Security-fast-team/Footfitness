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
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>View Order</h4>
                        </span>
                        <span class="float-right">
                            <span class="btn btn-info" id="excel">Save as Excel file</span>
                            <a href="{{ route('order.trash') }}" class="btn btn-danger">View Trash</a>
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
                                        <th>Address</th>
                                        <th>Shipping</th>
                                        <th>Total Amount</th>
                                        <th>Ordered Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @forelse($orders as $key => $single_collection)
                                        @php
                                            $order = $single_collection->first();
                                            $count++;
                                        @endphp
                                        <tr>
                                            <td class="align-middle">{{ $count }}</td>
                                            <td class="align-middle">{{ $order->order_number }}</td>
                                            <td class="align-middle">{{ $order->name }}</td>
                                            <td class="align-middle">{{ $order->phone }}</td>
                                            <td class="align-middle">{!! $order->address !!}</td>
                                            @if ($order->shipping->type)
                                                <td class="align-middle">{{ $order->shipping->type . '(৳' . Number_format($order->shipping->price) . ')' }}</td>
                                                <td class="align-middle">৳{{ Number_format($price+$order->shipping->price) }}</td>
                                            @endif
                                            <td class="align-middle">{{ date('d-m-Y', strtotime($order->created_at)) }}
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn">
                                                    @if ($order->order_status == 'new')
                                                        <span class="badge badge-primary order_status"
                                                            onclick="orderStatus({{ $order->id }},{{ $count }})"
                                                            id="order_status{{ $count }}">{{ $order->order_status }}</span>
                                                    @elseif($order->order_status == 'process')
                                                        <span class="badge badge-warning order_status"
                                                            onclick="orderStatus({{ $order->id }},{{ $count }})"
                                                            id="order_status{{ $count }}">{{ $order->order_status }}</span>
                                                    @elseif($order->order_status == 'delivered')
                                                        <span class="badge badge-success order_status"
                                                            onclick="orderStatus({{ $order->id }},{{ $count }})"
                                                            id="order_status{{ $count }}">{{ $order->order_status }}</span>
                                                    @else
                                                        <span class="badge badge-danger order_status"
                                                            onclick="orderStatus({{ $order->id }},{{ $count }})"
                                                            id="order_status{{ $count }}">{{ $order->order_status }}</span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group">
                                                    {{-- <a href="{{ route('order.edit', $order->id) }}"
                                                        class="btn btn-dark btnEdit" title="Edit"><i
                                                            class="fas fa-edit"></i></a> --}}

                                                    {{-- <a href="{{ route('order.view', $order->order_number) }}"
                                                        class="btn btn-info view-btn" title="View Order Details"><i
                                                            class="fas fa-eye"></i></a> --}}
                                                    <a href="{{ route('order.delete', $order->id) }}"
                                                        class="btn btn-danger btnDelete" title="Move to trash"><i
                                                            class="fas fa-trash"></i></a>
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
    <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
    <script src="{{asset('assets/backend/js/exel/exel.js')}}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {

            // Save as excel file
            var table2excel = new Table2Excel();
            $('#excel').on('click',function(){
                table2excel.export(document.querySelectorAll("table"));
            });

            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdfHtml5',
                        title: 'Order Management',
                        download: 'open',
                        orientation: 'potrait',
                        pagesize: 'LETTER',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    }, 'pageLength'
                ]
            });
        });

        // Dialogify
        function orderStatus(order_id, key) {
            var options = {
                ajaxPrefix: ''
            };
            new Dialogify('{{ url('order-status/ajax') }}', options)
                .title("Ordere Status")
                .buttons([{
                        text: "Cancle",
                        type: Dialogify.BUTTON_DANGER,
                        click: function(e) {
                            this.close();
                        }
                    },
                    {
                        text: 'Status update',
                        type: Dialogify.BUTTON_PRIMARY,
                        click: function(e) {
                            var name = $('#order_status_name').val();

                            $.ajax({
                                cache: false,
                                url: "{{ route('order-status.order-status-assign') }}",
                                method: "GET",
                                data: {
                                    name: name,
                                    order_id: order_id
                                },
                                success: function(data) {
                                    if (data != 0) {
                                        alert('Order Status successfully updated')
                                        // console.log($('#order_status').html());
                                        $('#order_status' + key).html(data);

                                    } else {
                                        alert("Order Status can't update")

                                    }
                                }
                            });

                        }
                        // }
                    }
                ]).showModal();
            //     });
            // });
        }
    </script>
@endpush
{{-- var form_data = new FormData();
form_data.append('name', $('#name').val());
form_data.append('address', $('#address')
.val());
form_data.append('discount', discount_v);
form_data.append('id', data[0].cake_id);
$.ajax({
method: "POST",
url: '{{ url('order.store') }}',
data: form_data,
// dataType:'json',
contentType: false,
cache: false,
processData: false,
success: function(value) {
// alert(value);
// $.ajax({
// cache: false,
// url: "{{ url('order.store') }}",
// method: "POST",
// success: function(
// data) {
// $("#show_data")
// .html(
// data
// );
// }
// });

}
}); --}}

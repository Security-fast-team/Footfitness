@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Hind Siliguri', sans-serif;
        }

        .main {
            max-width: 760px;
            margin: 0 auto;
            padding: 0 13px;
            box-sizing: border-box;
            border: 3px solid #416d4a;
            border-top: 20px solid #416d4a;
            border-radius: 40px;
            margin-top: 63px;
        }

        .main h2 {
            color: #55B067;
            font-family: "Hind Siliguri", Sans-serif;
            font-size: 22px;
            font-weight: 600;
            line-height: 34px;
            text-align: center;
        }

        .main h3 {
            color: #000000;
            font-size: 27px;
            font-weight: 500;
            text-align: center;
        }

        .main p {
            color: #404040;
            font-size: 15px;
            margin: 25px 0;
        }

        .main .order-col {
            background-color: #F1F1F1;
        }

        .main .order-col table {
            padding: 30px;
        }

        .main .order-col th {
            font-size: 14px;
            color: #000;
            font-weight: 300;
            width: 120px;
            text-align: left;
            border-right: 1px dashed #000;
            padding: 0 10px;
        }

        .main .order-col th:last-child {
            border-right: none;
        }

        .main .order-col td {
            font-size: 14px;
            color: #000;
            font-weight: 500;
            width: 100px;
            border-right: 1px dashed #000;
            padding: 0 10px;
        }

        .main .order-col td:last-child {
            border-right: none;
        }

        @media only screen and (max-width: 600px) {
            .main .order-col table tbody {
                display: flex;
            }

            .main .order-col tr {
                display: flex;
                flex-direction: column;
            }

            .main .order-col td,
            .main .order-col th {
                border: none;
                border-bottom: 1px dashed #000;
                padding: 10px 0;

            }

            .main table {
                width: 100%;
            }

            .main .order-col {
                border-radius: 15px;
            }

            .main h3 {
                font-size: 25px;
                line-height: 32px;
            }
        }

        .footer-section {
            margin-top: 45px;
        }
    </style>
@endpush
@section('page_conent')
    <div class="main">
        <h2>আপনার অর্ডারটি সফল হয়েছে। ঢাকার ভিতরে ২৪ ঘন্টার ভিতরে ডেলিভারি পাবেন এবং ঢাকার বাইরে তিন দিনের ভিতর ডেলিভারি
            পাবেন
        </h2>
        <h3>Thank you. Your order has been received.</h3>
        <div class="order-col">
            <table>
                <tr>
                    <th>Order number:</th>
                    <th>Date:</th>
                    <th>Total:</th>
                    <th>Payment method:</th>
                </tr>
                <tr>
                    <td>{{$order->order_number}}</td>
                    <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                    <td>৳ {{$order->price + $order->payment->price}}</td>
                    <td>Cash on delivery</td>
                </tr>
            </table>
        </div>
        <p>Pay with cash upon delivery.</p>
    </div>
@endsection

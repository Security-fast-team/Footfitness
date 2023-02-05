@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap');

        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Hind Siliguri', sans-serif;
        }

        .thank-you-page {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .thank-you-container {
            max-width: 760px;
            margin: 0 auto;
            padding: 0 30px;
            box-sizing: border-box;
        }

        .thank-you-main {
            padding: 0 13px;
            border: 3px solid #416d4a;
            border-top: 20px solid #416d4a;
            border-radius: 40px;
        }

        .thank-you-main h2 {
            color: #55B067;
            font-family: "Hind Siliguri", Sans-serif;
            font-size: 22px;
            font-weight: 600;
            line-height: 34px;
            text-align: center;
            margin: 20px 0;
        }

        .thank-you-page h3 {
            color: #000000;
            font-size: 27px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 30px;
            line-height: 32px;

        }

        .thank-you-main p {
            color: #404040;
            font-size: 15px;
            margin: 25px 0;
        }

        .thank-you-main .order-col {
            background-color: #F1F1F1;
        }

        .thank-you-main .order-col table {
            padding: 30px;
        }

        .thank-you-main .order-col th {
            font-size: 14px;
            color: #000;
            font-weight: 300;
            width: 120px;
            text-align: left;
            border-right: 1px dashed #000;
            padding: 0 10px;
        }

        .thank-you-main .order-col th:last-child {
            border-right: none;
        }

        .thank-you-main .order-col td {
            font-size: 14px;
            color: #000;
            font-weight: 500;
            max-width: 135px;
            border-right: 1px dashed #000;
            padding: 0 10px;
        }

        .thank-you-main .order-col td:last-child {
            border-right: none;
        }

        /* footer-section */
        .footer-section {
            background-color: #000;
            text-align: center;
            width: 100%;
            position: absolute;
            bottom: 0;
        }

        .footer-section p {
            color: #fff;
            font-size: 16px;
            font-weight: 400;
            padding: 10px 30px;
        }

        .footer-section p span {
            font-weight: 700;
        }

        /* responsive-design code */
        @media only screen and (max-width: 767px) {
            .thank-you-container {
                padding: 0 15px;
            }

            .thank-you-main {
                padding: 0px 10px;
            }

            .thank-you-main .order-col table tbody {
                display: flex;
            }

            .thank-you-main .order-col tr {
                display: flex;
                flex-direction: column;
            }

            .thank-you-main .order-col td,
            .thank-you-main .order-col th {
                border-right: none;
                border-bottom: 1px dashed #000;
                padding: 10px 0;
            }

            .thank-you-main .order-col table {
                padding: 20px;
                padding-bottom: 28px;
            }

            .thank-you-main .order-col td {
                padding-left: 30px;
                padding-right: 10px;
            }

            .thank-you-main .order-col th {
                padding-right: 30px;
            }

            .thank-you-main table {
                width: 100%;
            }

            .thank-you-main .order-col {
                border-radius: 15px;
            }

            .thank-you-main h3 {
                font-size: 25px;
                line-height: 32px;
            }
        }

        @media only screen and (max-width: 414px) {
            .thank-you-main .order-col td {
                padding-left: 0;
                padding-right: 0;
            }

            .thank-you-main .order-col th {
                padding-right: 0;
            }

            .thank-you-main h2 {
                font-size: 18px;
                line-height: 28px;
            }

            .thank-you-page h3 {
                font-size: 22px;
                line-height: 27px;
            }

            .thank-you-main p {
                text-align: center;
            }
        }

        @media only screen and (max-width: 360px) {
            .thank-you-main .order-col table {
                padding: 10px;
            }
        }
    </style>
@endpush
@section('page_conent')
<div class="thank-you-page">
    <div class="thank-you-container">
      <h3>
        <span>Thank you. </span><br />
        Your order has been received.
      </h3>
      <div class="thank-you-main">
        <h2>আপনার অর্ডারটি সফল হয়েছে। ঢাকার ভিতরে ২৪ ঘন্টার ভিতরে ডেলিভারি পাবেন এবং ঢাকার বাইরে তিন দিনের ভিতর ডেলিভারি পাবেন</h2>

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
                <td>৳ {{$order->price + $order->shipping->price}}</td>
                <td>Cash on delivery</td>
            </tr>
          </table>
        </div>
        <p>Pay with cash upon delivery.</p>
      </div>
    </div>
  </div>

  <!-- footer-section -->
  {{-- <footer>
    <div class="footer-section">
      <div class="container">
        <div class="main">
          <p>
            All Rights Reserved <span>Prime Gadget</span> | Designed And developed by <span>Security First</span> | Powdered by
            <span>Designed and developed by e-Business Clinic</span>
          </p>
        </div>
      </div>
    </div>
  </footer> --}}
@endsection

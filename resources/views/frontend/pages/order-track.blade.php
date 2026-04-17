@extends('frontend.layouts.master')

@section('title','Ecommerce Laravel || Order Track Page')

@section('main-content')
@php
    $trackedOrder = $trackedOrder ?? null;
    $statusMeta = [
        'new' => ['label' => 'Order Placed', 'class' => 'is-new', 'note' => 'Your order has been placed successfully.'],
        'process' => ['label' => 'Processing', 'class' => 'is-process', 'note' => 'Your order is being prepared right now.'],
        'delivered' => ['label' => 'Delivered', 'class' => 'is-delivered', 'note' => 'Your order has been delivered.'],
        'cancel' => ['label' => 'Cancelled', 'class' => 'is-cancel', 'note' => 'This order has been cancelled.'],
    ];
    $currentStatus = $trackedOrder ? ($statusMeta[$trackedOrder->status] ?? $statusMeta['new']) : null;
@endphp
<style>
    .track-order-section {
        padding: 56px 0;
    }

    .track-order-card,
    .track-order-result {
        background: #fff;
        border: 1px solid #dbe7df;
        border-radius: 18px;
        box-shadow: 0 20px 45px rgba(15, 81, 50, 0.08);
        padding: 32px;
    }

    .track-order-card p {
        color: #5f6b66;
        line-height: 1.8;
    }

    .tracking_form .form-control {
        height: 52px;
        border-radius: 12px;
        border: 1px solid #c8d7cf;
        box-shadow: none;
    }

    .tracking_form .submit_btn {
        min-width: 180px;
        height: 52px;
        border: none;
        border-radius: 12px;
        background: #154734;
        color: #fff;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .track-order-result {
        margin-top: 28px;
    }

    .track-order-top {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .track-order-top h3 {
        margin-bottom: 8px;
        color: #163f2b;
    }

    .track-order-top p,
    .track-order-meta p,
    .track-order-items li {
        margin: 0;
        color: #5f6b66;
    }

    .track-status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 140px;
        padding: 10px 16px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 13px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .track-status-badge.is-new {
        background: #e9f4ec;
        color: #154734;
    }

    .track-status-badge.is-process {
        background: #fff3d8;
        color: #8a6400;
    }

    .track-status-badge.is-delivered {
        background: #dff5e6;
        color: #166534;
    }

    .track-status-badge.is-cancel {
        background: #fbe3e3;
        color: #b42318;
    }

    .track-order-progress {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin: 26px 0;
    }

    .track-progress-step {
        border: 1px solid #d9e4dd;
        border-radius: 14px;
        padding: 16px;
        background: #f8fbf9;
        color: #6b756f;
        text-align: center;
        font-weight: 600;
    }

    .track-progress-step.active {
        background: #154734;
        border-color: #154734;
        color: #fff;
    }

    .track-order-meta {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 24px;
    }

    .track-order-meta strong {
        display: block;
        margin-bottom: 6px;
        color: #163f2b;
    }

    .track-order-items {
        list-style: none;
        padding: 0;
        margin: 0;
        border-top: 1px solid #e3ece7;
    }

    .track-order-items li {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 14px 0;
        border-bottom: 1px solid #e3ece7;
    }

    @media(max-width: 768px) {
        .track-order-section {
            padding: 36px 0;
        }

        .track-order-card,
        .track-order-result {
            padding: 22px;
        }

        .track-order-progress,
        .track-order-meta {
            grid-template-columns: 1fr;
        }

        .tracking_form .submit_btn {
            width: 100%;
        }
    }

    @media(max-width: 576px) {
        .track-order-section {
            padding: 28px 0;
        }

        .track-order-card,
        .track-order-result {
            padding: 18px;
            border-radius: 14px;
        }

        .track-order-card p,
        .track-order-top p,
        .track-order-meta p,
        .track-order-items li {
            font-size: 14px;
        }

        .tracking_form {
            margin-top: 20px !important;
        }

        .tracking_form .form-group {
            margin-bottom: 12px;
        }

        .tracking_form .form-control,
        .tracking_form .submit_btn {
            height: 48px;
            border-radius: 10px;
        }

        .track-order-top h3 {
            font-size: 22px;
        }

        .track-status-badge {
            min-width: 100%;
        }

        .track-progress-step {
            padding: 14px 12px;
            font-size: 14px;
        }

        .track-order-items li {
            flex-direction: column;
            gap: 6px;
            padding: 12px 0;
        }
    }
</style>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Order Track</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="track-order-section">
    <div class="container">
        <div class="track-order-card">
            <p>Enter your order number and the email used during checkout to track your order status instantly.</p>
            <form class="row tracking_form my-4" action="{{route('product.track.order')}}" method="post" novalidate="novalidate">
                @csrf
                <div class="col-md-5 form-group">
                    <input type="text" class="form-control" name="order_number" value="{{ old('order_number') }}" placeholder="Enter your order number">
                </div>
                <div class="col-md-4 form-group">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                </div>
                <div class="col-md-3 form-group">
                    <button type="submit" value="submit" class="btn submit_btn">Track Order</button>
                </div>
            </form>
        </div>

        @if($trackedOrder)
            <div class="track-order-result">
                <div class="track-order-top">
                    <div>
                        <h3>Order {{ $trackedOrder->order_number }}</h3>
                        <p>{{ $currentStatus['note'] }}</p>
                    </div>
                    <span class="track-status-badge {{ $currentStatus['class'] }}">{{ $currentStatus['label'] }}</span>
                </div>

                <div class="track-order-progress">
                    <div class="track-progress-step {{ in_array($trackedOrder->status, ['new','process','delivered']) ? 'active' : '' }}">Order Placed</div>
                    <div class="track-progress-step {{ in_array($trackedOrder->status, ['process','delivered']) ? 'active' : '' }}">Processing</div>
                    <div class="track-progress-step {{ $trackedOrder->status === 'delivered' ? 'active' : '' }}">Delivered</div>
                </div>

                <div class="track-order-meta">
                    <div>
                        <strong>Customer</strong>
                        <p>{{ $trackedOrder->first_name }} {{ $trackedOrder->last_name }}</p>
                    </div>
                    <div>
                        <strong>Payment</strong>
                        <p>{{ strtoupper($trackedOrder->payment_method) }} / {{ ucfirst($trackedOrder->payment_status) }}</p>
                    </div>
                    <div>
                        <strong>Total</strong>
                        <p>${{ number_format($trackedOrder->total_amount, 2) }}</p>
                    </div>
                </div>

                <ul class="track-order-items">
                    @foreach($trackedOrder->cart_info as $item)
                        <li>
                            <span>{{ optional($item->product)->title ?? 'Product' }} x{{ $item->quantity }}</span>
                            <span>${{ number_format($item->amount, 2) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
@endsection

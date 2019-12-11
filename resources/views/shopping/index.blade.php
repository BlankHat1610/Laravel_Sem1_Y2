@extends('layouts.app')
@section('content')
    <style>
        .cart-table tbody tr td {
            border: 1px solid #e1e1e1;
            border-collapse: collapse;
            font-family: arial;
            font-size: 12px;
            font-weight: normal;
            padding: 10px 0px;
            text-align: center;
            color: #3f3f3f;
        }
        .cart-table tbody tr td:nth-child(5) {
            padding: 36px 20px;
        }
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($products))
                    <? $i = 1; ?>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $i }}</td>
                            <td><a href="">{{ $product->name }}</a></td>
                            <td>
                                <img src="{{ pare_url_file($product->options->avatar) }}" alt="" style="width: 120px;">
                             </td>
                            <td>{{ number_format($product->price,0,',','.') }} ₫</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ number_format($product->qty * $product->price,0,',','.') }} ₫</td>
                            <td>
                                <a href=""><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('delete.shopping.cart', $key) }}"><i class="fa fa-trash"></i> Delete</a>
                            </td
                        </tr>
                        <? $i++; ?>
                    @endforeach
                @endif
                </tbody>
            </table>
            <h5 class="pull-right">Tổng tiền cần thanh toán: {{ Cart::subtotal() }} &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('get.form.pay') }}" class="btn btn-success"> Thanh toán</a></h5>
        </div>
    </div>



@endsection

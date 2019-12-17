@extends('user.layout')
@section('content')
    <h1 class="page-header">Tổng quan</h1>
    <div class="row placeholders">
        <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 0; color: whitesmoke; font-weight: bold">{{ $totalTransaction }} Tổng số đơn hàng</h4>
        </div>
        <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 0; color: whitesmoke; font-weight: bold">{{ $totalTransactionDone }} Đã xử lý</h4>
        </div>
        <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 0; color: whitesmoke; font-weight: bold">{{ $totalTransaction - $totalTransactionDone }} Chưa xử lý</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Danh sách đơn hàng của bạn</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                <tr>
                    <th>#</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tổng tiền</th>
                    <th>Trạng Thái</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                    @if(isset($transactions))
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>#{{ $transaction->id }}</td>
                                <td>{{ $transaction->tr_address }}</td>
                                <td>{{ $transaction->tr_phone }}</td>
                                <td>{{ number_format($transaction->tr_total,0,',','.') }} ₫</td>
                                <td>
                                    <a href="#" class="label {{ $transaction->getStatus($transaction->tr_status)['class'] }}">{{ $transaction->getStatus($transaction->tr_status)['name'] }}</a>
                                </td>
                                <td>
                                    {{ $transaction->created_at->format('d-m-Y') }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

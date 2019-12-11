@extends('layouts.app')
@section('content')
    <style>
        .submit-form.form-group.col-sm-12.submit-review button {
            padding: 5px 15px;
            background: #3f3f3f;
            color: #fff;
            /* margin-top: 0px; */
            display: inline-block;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 700;
        }
        .submit-form button.add-tag-btn{
            padding:5px 25px 3px;
        }
        .submit-form.form-group.col-sm-12.submit-review button:hover {background: #c2a376}
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
                            <li class="category3"><span>Về chúng tôi</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <h2>{{ isset($page) ? $page->ps_name : 'Đang cập nhật' }}</h2>
                        <div>{!! isset($page) ? $page->ps_content : 'Đang cập nhật' !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

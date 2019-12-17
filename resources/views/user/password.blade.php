@extends('user.layout')
@section('content')
    <h1 class="page-header">Cập nhật mật khẩu</h1>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="post">
                @csrf
                <div class="form-group" style="position: relative;">
                    <label>Mật khẩu cũ:</label>
                    <input type="password" class="form-control" name="old_password" value="">
                    <a style="position: absolute; top: 55%;right: 10px; color: #333;" href="javascript:void(0)"><i class="fa fa-eye"></i></a>
                    @if ($errors->has('old_password'))
                        <span class="error-text">
                            {{$errors->first('old_password')}}
                        </span>
                    @endif
                </div>
                <div class="form-group" style="position: relative;">
                    <label>Mật khẩu mới:</label>
                    <input type="password" class="form-control" name="password" value="">
                    <a style="position: absolute; top: 55%;right: 10px; color: #333;" href="javascript:void(0)"><i class="fa fa-eye"></i></a>
                    @if ($errors->has('password'))
                        <span class="error-text">
                            {{$errors->first('password')}}
                        </span>
                    @endif
                </div>
                <div class="form-group" style="position: relative;">
                    <label>Nhập lại mật khẩu mới:</label>
                    <input type="password" class="form-control" name="password_confirm" value="">
                    <a style="position: absolute; top: 55%;right: 10px; color: #333;" href="javascript:void(0)"><i class="fa fa-eye"></i></a>
                    @if ($errors->has('password_confirm'))
                        <span class="error-text">
                            {{$errors->first('password_confirm')}}
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp;Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(".form-group a").click(function () {
                let $this = $(this);

                if ($this.hasClass('active'))
                {
                    $this.parents(".form-group").find('input').attr('type','password')
                    $this.removeClass('active')
                }else
                {
                    $this.parents(".form-group").find('input').attr('type','text')
                    $this.addClass('active')
                }
            });
        });
    </script>
@endsection

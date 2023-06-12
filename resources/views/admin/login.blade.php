<!doctype html>
<html lang="en">

<head>
    @include('admin.includes.head')

    <title>{{env('APP_NAME')}}</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>

<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center">{{env('APP_NAME')}}<span class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">

            @include('admin.includes.message')

            <form method="post" action="{{route('admin.login')}}">

                {{csrf_field()}}

                <div class="form-group">
                    <input class="form-control form-control-lg" id="username" type="text" placeholder="Email" autocomplete="off" name="email" value="{{old('email')}}">
                </div>

                @if($errors->has('email'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="password">
                </div>
{{--                <div class="form-group">--}}
{{--                    <label class="custom-control custom-checkbox">--}}
{{--                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>--}}
{{--                    </label>--}}
{{--                </div>--}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>
{{--        <div class="card-footer bg-white p-0  ">--}}
{{--            <div class="card-footer-item card-footer-item-bordered">--}}
{{--                <a href="#" class="footer-link">Create An Account</a></div>--}}
{{--            <div class="card-footer-item card-footer-item-bordered">--}}
{{--                <a href="#" class="footer-link">Forgot Password</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>


@include('admin.includes.footer_assets')

</body>

</html>

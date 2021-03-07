<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
    <link rel="stylesheet" href="/backend/css/custom.css">
</head>
<body>
<div class='box'>
    <div class='box-form'>
        <div class='box-login-tab'></div>
        <div class='box-login-title'>
            <div class='i i-login'></div><h2>LOGIN</h2>
        </div>
        <div class='box-login'>
            <form role="form" action="{{route('admin.postLogin')}}" method="post" class='fieldset-body' id='login_form'>
                @csrf
                <p class='field'>
                    <label for='user'>E-MAIL</label>
                    <input type='text' id='user' name='email' title='Email' value="{{ old('email') }}"/>
                </p>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('email') }}</span>
                @endif
                <p class='field'>
                    <label for='pass'>PASSWORD</label>
                    <input type='password' id='pass' name='password' title='Password' />
                </p>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('password') }}</span>
                @endif
                @if (session('msg'))
                    <div class="form-group has-feedback"><a href="#" style="color: red">{{ session('msg') }}</a></div>
                @endif
                <br>
                <label class='checkbox'>
                    <input type='checkbox' name="remember" id="remember"/> Ghi nhớ
                </label>
                <button onclick="" class='b-support'> Quên mật khẩu?</button>
<!--                <button onclick="" class='b-cta'> Tạo tài khoản</button>-->

                <input type='submit'  value='Đăng nhập' />
            </form>
        </div>
    </div>

</div>
{

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>


</body>
</html>

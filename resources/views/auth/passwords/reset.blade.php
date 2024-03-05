<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Setup</title>
    <link rel="stylesheet" href="{{asset('forgotpass/index.css')}}">
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{asset('forgotpass/images/connectskillz 1.svg')}}">

</head>

<body>
    <div class="heading">
        <img src="{{asset('forgotpass/w-icon/connectskillz 1.svg')}}" alt="logo" class="logo1">
        <img src="{{asset('forgotpass/w-icon/Vector.svg')}}" alt="">
    </div>
    <section class="sign-in">
        <div class="set-up">
            <div class="inf">
                <h1> Password</h1>
                <p>Set your New password.</p>
            </div>
            <form action="{{ route('password.update') }}" method='post' class="sp-entries">@csrf
                @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="pass-case">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    <input id="password" type="password" placeholder="New Password"
                        class="showup @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                    <div class="openp">
                        <img src="{{asset('forgotpass/w-icon/view.svg')}}" alt="viewit" class="eye-close" />
                        <img src="{{asset('forgotpass/w-icon/popeye.svg')}}" alt="viewit" class="eye-icon" />
                    </div>
                </div>
                <div class="pass-case">
                    <input id="password-confirm" placeholder="Confirm New Password" type="password" class="shew"
                        name="password_confirmation" required autocomplete="new-password">
                    <div class="c-openp">
                        <img src="{{asset('forgotpass/w-icon/view.svg')}}" alt="viewit" class="eye-clse" />
                        <img src="{{asset('forgotpass/w-icon/popeye.svg')}}" alt="viewit" class="eye-icn" />
                    </div>
                </div>


                <button type='submit' class="reg-btn">Update</button>

            </form>
        </div>
    </section>
    <script src="{{asset('forgotpass/func2.js')}}"></script>
</body>

</html>
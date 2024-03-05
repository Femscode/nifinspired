<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Setup</title>
    <link rel="stylesheet" href="{{asset('forgotpass/index.css')}}" >
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
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
            <form action="{{ route('password.confirm') }}" class="sp-entries">@csrf
            <h4>Please confirm your password before you continue</h4>
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
                                @if(Session::has('message') || Session::has('error'))
                                 <div class="alert alert-danger">
                                    <p><strong>Opps Something went wrong</strong></p>
                                    <ul>
                                       Wrong password
                                    </ul>
                                </div>
                                @endif
                <div class="pass-case">
                   <input type="password" name='password' placeholder="Confirm Password" name="view" class="showup">
                    <div class="openp">
                        <img src="{{asset('forgotpass/w-icon/view.svg')}}" alt="viewit" class="eye-close"/>
                        <img src="{{asset('forgotpass/w-icon/popeye.svg')}}" alt="viewit" class="eye-icon"/>
                        </div>
                </div>
              
               
                <button type='submit' class="reg-btn">Update</button>

            </form>
        </div>
    </section>
    <script src="{{asset('forgotpass/func2.js')}}"></script>
</body>
</html> 
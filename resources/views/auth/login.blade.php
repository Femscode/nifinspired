<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="{{ asset('forgotpass/index.css') }}" media="screen">
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('forgotpass/images/connectskillz 1.svg')}}">

</head>
<body>
   
    <div class="mainspace">
        
        <div class="poss">
           <a href='/waitlist'> <img src="assets/w-icon/connectskillz 1.svg" alt="" class="logo-lg"/></a>
            <div class="login-1">
            
                <div class="log_case">
    <!-- the header for the form -->
                    <div class="log-ctnt">
                        <h1>LOG IN TO YOUR DASHBOARD</h1>
                        <p>Stay updated and learn continuously</p>
                    </div>
     <!-- the login form -->
                  @if($errors->any())
                  <div  class="log-ctnt" style='color:red'>
   				 {{ implode('', $errors->all(':message')) }}
              		</div>
					@endif
                    <form action="{{ route('login') }}" method='post' class="lg-form">@csrf
                        <div class="mail-log">
                            <input type="email" name='email' placeholder="Email Address"/>
                        </div>
                        <div class="pass-log">
                           
                            <input type="password" placeholder="Password" name="password" id="password"  class="showup"/>
                            <div class="openp">
                            <img src="{{asset('forgotpass/w-icon/view.svg')}}" alt="viewit" class="eye-close"/>
                            <img src="{{asset('forgotpass/w-icon/popeye.svg')}}" alt="viewit" class="eye-icon"/>
                            </div>
                        </div>
                        <p class="forget"><a href="/waitlist/forgot-password">forgot password?</a></p>
                        <button type='submit' class="login-btn">Join</button>
                    </form>
                </div>
            </div>
    
        </div>
    
        <div class="banner1">
            <a href="assets/Dashboard.html"></a>
            
        </div>
    </div>
</body>

<script src="{{ asset('forgotpass/func2.js') }}"></script>
<script src="{{asset('cdn/jquery-3.6.0.js')}}" ></script>
<script src="{{asset('/cdn/sweetalert.min.js')}}" ></script>
<script>
// function showPasssword() {
//     $("#password").attr('type','text')
// }
</script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="{{asset('forgotpass/index.css')}}" >
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('forgotpass/images/connectskillz 1.svg')}}">

</head>
<body>
        <div class="Mailcont">
            <div class="heading">
                <img src="{{asset('forgotpass/w-icon/connectskillz 1.svg')}}" alt="logo" class="logo1">
            </div>
            <div class="dispcont">

                <div class="illustrate">
                    <img src="{{asset('forgotpass/w-icon/undraw_my_password_re_ydq7.svg')}}" alt="" class="forg">
                </div>

                <div class="fom-mail">
                    <div class="forg-text">
                        <h1>Reset your Password</h1>
                        <p>The verification email will be sent sent to your mailbox.<br>please check it.</p>
                    </div> 
                   
                    <form class="sendmail" action='{{ route("password.email") }}' method='post'>@csrf
                  
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
                        	
                      
                        <div class="both">
                            <label>Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Email" style='padding:10px' class="coli">
                        </div>
                        <button class="mailbtn">Submit</button>
                    </form>
                </div>
            </div>
            
            <p class="infd"><img src="{{asset('forgotpass/w-icon/Infd.svg')}}" alt="" class="inns"">check your mail for the password reset </p>
        </div>
</body>
</html>
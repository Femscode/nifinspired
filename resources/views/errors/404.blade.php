<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page</title>
    <link rel="stylesheet" href="{{ asset('404/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="cont-head">
            <div class="logo">
                <img src="{{ asset('connectskillz.svg')}}" alt="">
            </div>
            <div class="wrapper-cont">
                <div class="wrapper">
                    <h1>Page not found</h1>
                    <P>This Page doesn't exist or was removed! <br>
                        We suggest you back to home.</P>
                       <button>
                           <img src="/Vector.svg" alt="">
                           Back to home
                       </button>
                </div>
                <div class="image-cont">
                    <img src="{{ asset('404/oops.svg') }}" alt="">
                </div>
            </div>
        </div>
        
        
    </div>
</body>

</html>
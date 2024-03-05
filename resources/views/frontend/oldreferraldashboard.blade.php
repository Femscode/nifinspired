<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Admin Referral Dashboard</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="{{ asset('forgotpass/index.css') }}" media="screen">
    <!-- font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header section for all the Dashboard pages -->
    <header class="dsh">
        <nav>
            <div class="cs-logo">
                <img src="https://static.wixstatic.com/media/33e65a_3ea4acd8e91d4f64802798c32330dcd3~mv2.png/v1/crop/x_68,y_165,w_284,h_207/fill/w_85,h_62,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled_design__2_-removebg-preview%20(1).png"
                    alt="logo" class="logo1">

                <div class="menu" onclick="">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>

            <div class="nvbox">
                <ul class="hd-nav">
                    <li class="dg-a"> <a href="https://referralprogram.connectinskillz.com/">Home</a> </li>
                    <!-- <li class="dg-b"> <a href="">Refer a Friend</a></li> -->
                    <li class="dg-c"><a href="/logout"
                            onclick="return confirm('Are you sure you want to log out?')">Logout</a></li>
                </ul>
            </div>

        </nav>
    </header>

    <Section class="disp01">
        <div class="user_name">
            <h1 class='fw-bolder text-center'>CS Referral Dashboard</h1>
        </div>

    </Section>

    <div class='col-md-8'>
        <table id='datatable' class="table datatable table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name </th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Referral Code</th>
                    <th>Country</th>
                    <th>Referral Count</th>
                    <th>Amount</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    @if($user->first_name == null)
                    <td> {{ $user->name }}</td>
                    @else
                    <td>{{ $user->first_name }} - {{ $user->last_name }}
                    </td>
                    @endif

                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->referral_code }}</td>

                    <td>{{ $user->country ?? "Not Yet Captured" }}</td>
                    <td>{{ $user->referral_count ?? 0 }}</td>
                    <td>{{ $user->currency}}{{ $user->referral_count * $user->referral_count }}</td>
                    <td>
                        <a class='btn btn-info'>More Info</a>
                        <a class='btn btn-primary'>User Transactions</a>
                        <a class='btn btn-danger'>Delete User</a>
                    </td>
                </tr>

                @endforeach



            </tbody>

        </table>

    </div>


    <div class='col-md-4'>
        <div class='card'>
            <h1>How you?</h1>
        </div>
    </div>

    <section class="mjr01">
        <div class="scal">

            <div class="table-disp">





            </div>
        </div>


    </section>

    <script src="./func.js"></script>
    <script>
        $(document).ready(function() {
        var oTable = $('.datatable').DataTable({
            ordering: false,
            searching: true
            });   
            });
    </script>



</body>

</html>
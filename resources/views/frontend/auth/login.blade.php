<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add Product For Sale</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>

    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">

                <div class="card-heading">
                    <h2 class="title">Login</h2>
                </div>
                <div class="card-body">
    @include('dashboard.message.message')

                <form method="POST" action = "{{route('login')}}">
                        @csrf
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" placeholder="Your email here" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="password" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                <button class="btn btn--radius-2 btn--blue-2" type="submit">Login</button>
                </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main JS-->
    <script src="{{asset('js/global.js')}}"></script>

</body>

</html>


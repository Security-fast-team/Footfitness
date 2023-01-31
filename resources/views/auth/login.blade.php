<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$site_info->title ?? 'Security Fast'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>
        .password{
            position: relative;
        }
        .password .eye {
            position: absolute;
            top: 10px;
            right: 22px;
            font-size: 25px;
        }
    </style>
</head>


<body>


    {{-- <div class="container">
        <div class="brand-logo"></div>
        <div class="company-details text-center">
            <h1>Login</h1>
        </div> --}}

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h1 class="mb-5 text-center">Sign in</h1>
                            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Phone</label>
                                    <input name="phone" type="number" id="phone-2"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <div class="password">
                                        <input name="password" type="password" id="typePasswordX-2"
                                        class="form-control form-control-lg" />
                                        <i class="fa-solid fa-eye eye"></i>
                                        <i class="fa-solid fa-eye-slash eye"></i>
                                    </div>
                                    <a href="{{ url('forgot-password') }}">Forgot-password</a>
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url('register') }}">Registration</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <a href="#">MADE BY Nobir</a> --}}
    {{-- </div> --}}

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $('.fa-eye').hide();
    $('.fa-eye-slash').on('click',function(){
        $(this).hide();
        $('.fa-eye').show();
        $('.password input').attr('type','text');
    })
    $('.fa-eye').on('click',function(){
        $(this).hide();
        $('.fa-eye-slash').show();
        $('.password input').attr('type','password');
    })
</script>

</body>

</html>






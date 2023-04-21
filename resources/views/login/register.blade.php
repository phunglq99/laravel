<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    @vite('resources/sass/app.scss')
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>
<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card register" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <img src="https://coderthemes.com/hyper/saas/assets/images/logo.png" alt="">
                                <div class="d-flex mb-4 justify-content-center align-items-center mt-3">
                                    <h2 class="text-uppercase text-center fs-5 fw-bold">Sing up</h2>
                                </div>
                                <form method="POST" action="{{ route('login.registerPost') }}">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="text" id=""
                                        class="form-control form-control-lg text-white" name="name" id="name" autocomplete="off"/>
                                        <label class="form-label text-secondary" for="name">Your Name</label>
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-outline mb-4">
                                        <input type="email"  name="email" id="email"
                                        class="form-control form-control-lg text-white" autocomplete="off"/>
                                        <label class="form-label text-secondary" for="">Your Email</label>
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-outline mb-4">
                                        <input type="password"  name="password" id="password"
                                        class="form-control form-control-lg text-white" />
                                        <label class="form-label text-secondary" for="password">Password</label>
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control form-control-lg text-white" />
                                        <label class="form-label text-secondary" for="password_confirmation">Confirm your password</label>
                                    </div>
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body fw-bold">Register</button>
                                    </div>

                                    <p class="text-center text-secondary mt-5 mb-0">Have already an account? <a
                                            href="{{ route('login.index') }}" class="fw-bold text-body"><u class="text-white">Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>

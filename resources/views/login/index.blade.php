<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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
                                    <h2 class="text-uppercase text-center fs-5 fw-bold">Sing in</h2>
                                </div>
                                @if (session('success'))
                                <div class="todo alert alert-success py-2" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                {{-- Alert error --}}
                                @if ($errors->any())
                                    <div class="todo alert alert-danger py-2" role="alert">
                                        {{ $errors->first('email') ? $errors->first('email') : $errors->first('password') }}
                                    </div>
                                @endif

                                <form action="{{ route('login.loginPost') }}" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg"
                                            class="form-control form-control-lg text-white" name="email" value="{{ old('email') }}" autocomplete="off"/>
                                        <label class="form-label text-secondary" for="form3Example3cg">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg"
                                            class="form-control form-control-lg text-white" name="password" value="{{ old('password') }}" />
                                        <label class="form-label text-secondary" for="form3Example4cg">Password</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body fw-bold">Login</button>
                                    </div>

                                    <p class="text-center mt-5 mb-0 text-secondary">Don't have an account? <a
                                            href="{{ route('login.register') }}" class="fw-bold text-body"><u class="text-white">Create new</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
            var $alertSecond = $('.todo.alert');
            var timeoutAlert = setTimeout(function() {
                $alertSecond.removeClass('show').addClass('hide');
                setTimeout(function() {
                    $alertSecond.hide();
                }, 1000);
            }, 2000);
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>

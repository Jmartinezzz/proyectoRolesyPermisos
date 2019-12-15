<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/simplex/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icomoon/icomoon.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('img/logos/ico.png') }}" />
    </head>

    <body class="jumbotron">
        <main>
            <div class="container">
                <div class="container">
                    @if($errors->any())
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">¡Verifica los siguientes campos!</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-5 shadow py-4 rounded">
                            <div class="card border-primary">
                                <div class="card-header bg-primary text-light">
                                    <div class="h1">
                                        Login <span class="icon-lock2"></span>
                                    </div>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="icon-user"></span></span>
                                                </div>
                                                <input type="email" name="email" class="form-control" id="" placeholder="Correo" required>
                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="icon-key"></span></span>
                                                </div>
                                                <input type="password" class="form-control" name="password" placeholder="******" required>
                                                 @if ($errors->has('password'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                     <button type="submit" class="btn btn-primary btn-block">Entrar <span class="icon-login"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>

</html>

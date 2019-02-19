<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teste Uplexis</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('application/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('application/plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('application/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('application/css/spinners.css') }}" rel="stylesheet">
        <link href="{{ asset('application/css/style.css') }}" rel="stylesheet">

        <style>
            .login-register{background:url({{ asset('img/login.jpg') }}) center center/cover no-repeat!important;height:100%;position:fixed}
        </style>
        

    </head>
    <body>
        <section id="wrapper" class="login-register login-sidebar">
          <div class="login-box login-sidebar">
            <div class="white-box">
              <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <h3 class="box-title m-t-40 m-b-20">Faça seu login</h3>
                <div class="form-group ">
                  <div class="col-xs-12">
                    <input class="form-control" type="text" id="usuario" name="usuario" required="" placeholder="Usuário">
                    @if ($errors->has('usuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('usuario') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <input class="form-control" type="password" id="senha" name="senha" required="" placeholder="Senha">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                 @if ($errors->has('usuario'))
                        <div class='alert alert-danger alert-dismissable text-center'>
                            <strong>{{ $errors->first('usuario') }}</strong>
                        </div>
                 @endif
                  
                 
                <div class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
    </body>
</html>

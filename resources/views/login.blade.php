<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Locadora de Veículos</title>

        <link href="{{ asset('css/app.css'); }}" rel="stylesheet" />
    </head>
    <body>
        <section class="vh-100">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-5">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif            

                    <h3 class="mb-5">Sign in</h3>

                    <form action="{{ route('signin') }}" method="POST">
                        @csrf  

                        <div class="form-outline mb-4">
                          <label class="form-label" for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control" value=""/>
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control" />
                        </div>

                        <button class="btn btn-primary col-sm-12" type="submit">Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </body>
</html>

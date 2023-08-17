<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100"">
        <div class="container py-5 h-100 mb-4">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem; margin-top:70px;">
                <div class="card-body p-5 text-center">
                    @if(Session::has('yes'))
                    <div class="alert alert-danger">
                        {{ Session::get('yes') }}
                        @php
                            Session::forget('yes');
                        @endphp
                    @endif

                    @if(Session::has('message'))
                    <div class="alert alert-danger">
                        {{ Session::get('message') }}
                        @php
                            Session::forget('message');
                        @endphp
                    @endif
                  <h3 class="mb-5">Sign in</h3>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-outline mb-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div>



                  <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Login') }}
                </button>
                  </form>


                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>

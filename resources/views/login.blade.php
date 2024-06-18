@extends('layouts.auth')

@section('content')
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('img/logo.png') }}" alt="">
                  <span class="d-none d-lg-block">ruwasa pms</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>
                  @if ($errors->any())
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>                        
                        @foreach ($errors->all() as $error)
                          {{ $error }}
                        @endforeach                      
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif

                  <form method="POST" action="{{ url('/login') }}" class="row g-3 needs-validation">
                    @csrf
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="name@example.com" required>
                        <label for="inputEmail">Email address</label>
                        <div class="invalid-feedback">Please enter your email!</div>
                      </div>
                    </div>

                    <div class="col-12">
                        {{-- <label for="inputPassword" class="form-label">Password</label> --}}
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    {{-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                    </div> --}}
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="#">MUST</a>
              </div>

            </div>
          </div>
        </div>

      </section>
@endsection
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

                @livewire('forms.register-form')

              </div>

              <div class="credits">
                Designed by <a href="#">MUST</a>
              </div>

            </div>
          </div>
        </div>

      </section>
@endsection
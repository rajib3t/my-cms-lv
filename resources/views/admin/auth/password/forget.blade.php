<x-admin-layout>
    <x-slot name="title">
        {{ __('Admin Forget Password') }}
    </x-slot>

      <main class="main-content  mt-0">
        <section>
          <div class="page-header min-vh-75">
            <div class="container">
              <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                  <div class="card card-plain mt-8">
                    <div class="card-header pb-0 text-left bg-transparent">
                      <h3 class="font-weight-bolder text-info text-gradient">{{ __('Password Recovery') }}</h3>
                      <p class="mb-0">{{ __('Enter your email to send reset link') }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))

                            <div class="alert alert-success font-weight-bold text-white" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger font-weight-bold text-white">
                                {{$errors->first()}}
                            </div>
                        @endif
                        {{ Form::open(['route'=>'admin.password.email','method'=>'POST','role'=>'form']) }}
                            {{ Form::label('email','Email') }}

                            <div class="mb-3">
                                {{ Form::email('email',null,$errors->has('email')?['id'=>'email','class'=>'form-control is-invalid','placeholder'=>'email']:['id'=>'email','class'=>'form-control','placeholder'=>'email']) }}

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Send') }}</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                      <p class="mb-4 text-sm mx-auto">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('admin.login') }}" class="text-info text-gradient font-weight-bold">{{ __('Login') }}</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{ asset('admin-design/assets/img/curved-images/curved6.jpg') }}')"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
      <footer class="footer py-5">
        <div class="container">

          <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
              <p class="mb-0 text-secondary">
                Copyright © <script>
                  document.write(new Date().getFullYear())
                </script> {{ config('app.name', 'Laravel') }}
              </p>
            </div>
          </div>
        </div>
      </footer>
</x-admin-layout>

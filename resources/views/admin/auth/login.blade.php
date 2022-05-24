<x-admin-layout>
    <x-slot name="title">
        {{ __('Admin Login') }}
    </x-slot>

      <main class="main-content  mt-0">
        <section>
          <div class="page-header min-vh-75">
            <div class="container">
              <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                  <div class="card card-plain mt-8">
                    <div class="card-header pb-0 text-left bg-transparent">
                      <h3 class="font-weight-bolder text-info text-gradient">{{ __('Welcome back') }}</h3>
                      <p class="mb-0">{{ __('Enter your email and password to sign in') }}</p>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger font-weight-bold text-white">
                                {{$errors->first()}}
                            </div>
                        @endif
                        {{ Form::open(['route'=>'admin.authenticate','method'=>'POST','role'=>'form','id'=>'login']) }}
                            {{ Form::label('email','Email') }}

                            <div class="mb-3">
                                {{ Form::email('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'Email']) }}

                            </div>
                            {{ Form::label('password','Password') }}
                            <div class="mb-3">
                                {{ Form::password('password',['class'=>'form-control','placeholder'=>"Password"]) }}
                            </div>
                            <div class="form-check form-switch">
                                {{ Form::checkbox('rememberPassword','yes',false,['class'=>'form-check-input','id'=>'rememberMe']) }}
                                {{ Form::label('rememberPassword','Remember me',['class'=>'form-check-label']) }}

                            </div>
                            <div class="text-center">
                              {{ Form::submit('Login',['class'=>'btn bg-gradient-info w-100 mt-4 mb-0','id'=>'loginbtn']) }}

                            </div>
                        {{ Form::close() }}
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                      <p class="mb-4 text-sm mx-auto">
                        {{ __('Forget Password!') }}
                        <a href="{{ route('admin.forget.password') }}" class="text-info text-gradient font-weight-bold">{{ __('Get New Password') }}</a>
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
                {{ __('Copyright') }} {{ __('©') }} <script>
                  document.write(new Date().getFullYear())
                </script> {{ config('app.name', 'Laravel') }}
              </p>
            </div>
          </div>
        </div>
      </footer>
      @push('js-vendor')
          {{ Html::script('admin-design/assets/js/just-validate.production.min.js') }}
      @endpush
      @push('js')
         <script>
             const saveEndpoit = ()=>{
                document.getElementById('loginbtn').addEventListener('click',()=>{

                    const validation = new JustValidate('#login', {
                                errorFieldCssClass: 'is-invalid',
                                successFieldCssClass:'is-valid'
                            });
                    //console.log(validation)
                    validation
                        .addField('#email', [
                            {
                                rule: 'required',
                            },
                            {
                              rule:'email'
                            }
                        ])
                        .addField('#password',[
                            {
                                rule:'required'
                            }


                        ])
                        .onSuccess((event)=>{
                            document.getElementById('login').submit();

                        })
                        .onFail((fields)=>{
                            console.log(fields)

                        });
                })
            }
            saveEndpoit();

             </script>
      @endpush
</x-admin-layout>

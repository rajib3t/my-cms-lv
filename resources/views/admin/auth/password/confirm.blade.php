<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Admin User') }}

    </x-slot>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{ asset('admin-design/assets/img/curved8.jpeg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card py-lg-3">
                        <div class="card-body text-center">
                            <div class="info mb-4">
                                <img class="avatar avatar-xxl" alt="Image placeholder" src="{{ asset('admin-design/assets/img/profile.png') }}">
                            </div>
                            <h4 class="mb-0 font-weight-bolder">{{ $user->name }}</h4>
                            <p class="mb-4">{{ __('Enter password to unlock your account.') }}</p>
                            {{ Form::open(['route'=>'admin.password.confirm.auth']) }}
                                <div class="mb-3">
                                    {{ Form::password('password',['class'=>'form-control','placeholder'=>"Password"]) }}

                                </div>
                                <div class="text-center">
                                    {{ Form::submit('Unlock',['class'=>'btn btn-lg bg-gradient-dark mt-3 mb-0']) }}

                                </div>
                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>

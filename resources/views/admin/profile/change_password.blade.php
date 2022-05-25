<x-admin-layout>
    <x-slot name="title">
        {{ __('Admin User Password Change') }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ __('Admin User Password Change') }}</h6>
                        <a href="{{ route('admin.user.admin.profile') }}" class="text-info col  d-flex flex-row-reverse"><span>{{ __('Profile') }}</span></a>

                    </div>


                </div>
                <div class="card-body ">
                    {{ Form::open(['route'=>['admin.user.admin.profile.password.update'],'method'=>'POST','id'=>'user_change_password']) }}

                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('old_password','Old Password') }}
                                    {{ Form::password('old_password',$errors->has('password')?['id'=>'old_password','class'=>'form-control is-invalid','placeholder'=>'Old Password']:['id'=>'old_password','class'=>'form-control','placeholder'=>'Old Password']) }}
                                </div>
                            </div>
                        </div>

                        <div class="row p-2">

                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password','New Password') }}
                                    {{ Form::password('password',$errors->has('password')?['id'=>'password','class'=>'form-control is-invalid','placeholder'=>'Password']:['id'=>'password','class'=>'form-control','placeholder'=>'Password']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password_confirmation','Retype Password') }}
                                    {{ Form::password('password_confirmation',$errors->has('password_confirmation')?['id'=>'password_confirmation','class'=>'form-control is-invalid','placeholder'=>'Confirm Password']:['id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm Password']) }}
                                </div>
                            </div>


                        </div>
                        {{ Form::submit('Update',['class'=>'btn btn-primary pl-2','id'=>'user_password_change_btn']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @push('css-vendor')

        {{ Html::style('admin-design/assets/css/pnotify.css') }}
        {{ Html::style('admin-design/assets/css/BrightTheme.css') }}
    @endpush
   @push('js-vendor')
        {{ Html::script('admin-design/assets/js/pnotify.js') }}
        {{ Html::script('admin-design/assets/js/just-validate.production.min.js') }}
   @endpush
    @push('js')
        <script>
            const changepassword = ()=>{
                document.getElementById('user_password_change_btn').addEventListener('click',()=>{
                    const validation = new JustValidate('#user_change_password', {
                                errorFieldCssClass: 'is-invalid',
                                successFieldCssClass:'is-valid'
                            });
                            validation
                            .addField('#old_password', [
                                {
                                    rule: 'required',
                                }


                            ])
                            .addField('#password', [
                                {
                                    rule: 'required',
                                },
                                {
                                    rule:'password',
                                },

                            ])
                            .addField('#password_confirmation', [
                                {
                                    rule: 'required',
                                },
                                {
                                    rule:'password',
                                },
                                {
                                validator: (value, fields) => {
                                if (fields['#password'] && fields['#password'].elem) {
                                    const repeatPasswordValue = fields['#password'].elem.value;

                                    return value === repeatPasswordValue;
                                }

                                return true;
                                },
                                errorMessage: 'Passwords should be the same',
                            },

                            ])
                            .onSuccess((event)=>{
                                setTimeout(() => {
                                    document.getElementById('user_change_password').submit();
                                }, 2000);


                        })

                });
            }
            changepassword();
            </script>


                @if(Session::has('success'))
                <script>
                    PNotify.success({
                        title: 'Success',
                        text: '{{ Session::get('success') }}',

                    });
                    </script>
                @endif
                @if(Session::has('error'))
                <script>
                    PNotify.error({
                        title: 'Error',
                        text: '{{ Session::get('error') }}',

                    });
                    </script>


                @endif


    @endpush
</x-admin-layout>


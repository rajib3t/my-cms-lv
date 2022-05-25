<x-admin-layout>
    <x-slot name="title">
        {{ __('Admin User Create') }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ __('Admin User Create') }}</h6>
                        <a href="{{ route('admin.user.admin.list') }}" class="text-info col  d-flex flex-row-reverse"><span>{{ __('Admin User List') }}</span></a>

                    </div>


                </div>
                <div class="card-body ">
                    {{ Form::open(['route'=>'admin.user.admin.store','method'=>'POST','id'=>'create_user']) }}
                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('firstname','First Name') }}
                                    {{ Form::text('firstname',null,$errors->has('firstname')?['id'=>'firstname','class'=>'form-control is-invalid','placeholder'=>'Rajib']:['id'=>'firstname','class'=>'form-control','placeholder'=>'Rajib']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('lastname','Last Name') }}
                                    {{ Form::text('lastname',null,$errors->has('lastname')?['id'=>'lastname','class'=>'form-control is-invalid','placeholder'=>'Mondal']:['id'=>'lastname','class'=>'form-control','placeholder'=>'Mondal']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('email','Email') }}
                                    {{ Form::email('email',null,$errors->has('email')?['id'=>'email','class'=>'form-control is-invalid','placeholder'=>'Email']:['id'=>'email','class'=>'form-control','placeholder'=>'Email']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('mobile','Mobile') }}
                                    {{ Form::tel('mobile',null,$errors->has('mobile')?['id'=>'mobile','class'=>'form-control is-invalid','placeholder'=>'7777777777']:['id'=>'mobile','class'=>'form-control','placeholder'=>'7777777777']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('roles','Roles') }}
                                    {{ Form::select('roles',$roles,null,$errors->has('roles')?['id'=>'roles','class'=>'form-control is-invalid','placeholder'=>'Select Roles','multiple'=>true]:['id'=>'role','class'=>'form-control','placeholder'=>'Select roles','multiple'=>true]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password','Password') }}
                                    {{ Form::password('password',$errors->has('password')?['id'=>'password','class'=>'form-control is-invalid','placeholder'=>'Password']:['id'=>'password','class'=>'form-control','placeholder'=>'Password']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('password_confirmation','Confirm Password') }}
                                    {{ Form::password('password_confirmation',$errors->has('password_confirmation')?['id'=>'password_confirmation','class'=>'form-control is-invalid','placeholder'=>'Confirm Password']:['id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm Password']) }}
                                </div>
                            </div>

                        </div>
                        {{ Form::submit('Submit',['class'=>'btn btn-primary pl-2','id'=>'create_user_btn']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @push('js-vendor')
        {{ Html::script('admin-design/assets/js/just-validate.production.min.js') }}
    @endpush
    @push('js')
        <script>
            const createUser = ()=>{
                document.getElementById('create_user_btn').addEventListener('click',()=>{
                    const validation = new JustValidate('#create_user', {
                                errorFieldCssClass: 'is-invalid',
                                successFieldCssClass:'is-valid'
                            });
                        validation
                            .addField('#firstname', [
                                {
                                    rule: 'required',
                                },
                                {
                                    rule:'customRegexp',
                                    value: /^[a-zA-Z]*$/,
                                }
                            ])
                            .addField('#lastname', [
                                {
                                    rule: 'required',
                                },
                                {
                                    rule:'customRegexp',
                                    value: /^[a-zA-Z]*$/,
                                }
                            ])
                            .addField('#email', [
                                {
                                    rule: 'required',
                                },
                                {
                                    rule:'email',

                                }
                            ])
                            .addField('#mobile', [
                                {
                                    rule: 'required',
                                },
                                {
                                    rule:'customRegexp',
                                    value: /^[0-9]*$/,
                                },
                                {
                                    rule:'minLength',
                                    value: 10,
                                },
                                {
                                    rule:'maxLength',
                                    value: 12,
                                }
                            ])
                            .addField('#role', [
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
                                    document.getElementById('create_user').submit();
                                }, 2000);


                        })
                })
            }
            createUser();
        </script>
    @endpush

</x-admin-layout>


<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Admin User') }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ __('Edit Admin User') }}</h6>
                        <a href="{{ route('admin.user.admin.password.change',$user->id) }}" class="text-info col  d-flex flex-row-reverse"><span>{{ __('Password Change') }}</span></a>

                    </div>


                </div>
                <div class="card-body ">
                    {{ Form::model($user,['route'=>['admin.user.admin.update',$user->id],'method'=>'POST','id'=>'edit_user']) }}
                    @php($name= explode(' ',$user->name))


                        <div class="row p-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('firstname','First Name') }}
                                    {{ Form::text('firstname',$name[0],$errors->has('firstname')?['id'=>'firstname','class'=>'form-control is-invalid','placeholder'=>'Rajib']:['id'=>'firstname','class'=>'form-control','placeholder'=>'Rajib']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('lastname','Last Name') }}
                                    {{ Form::text('lastname',$name[1],$errors->has('lastname')?['id'=>'lastname','class'=>'form-control is-invalid','placeholder'=>'Mondal']:['id'=>'lastname','class'=>'form-control','placeholder'=>'Mondal']) }}
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


                        </div>
                        {{ Form::submit('Update',['class'=>'btn btn-primary pl-2','id'=>'edit_user_btn']) }}
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
            const editUser = ()=>{
                document.getElementById('edit_user_btn').addEventListener('click',()=>{
                    const validation = new JustValidate('#edit_user', {
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
                            .onSuccess((event)=>{
                                setTimeout(() => {
                                    document.getElementById('edit_user').submit();
                                }, 2000);


                        })

                });
            }
            editUser();
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


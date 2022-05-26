<x-admin-layout>
    <x-slot name="title">
        {{ __('General Setting') }}

    </x-slot>
    <div class="row mt-4">

        <div class="col-sm-2">
            @include('admin.settings.partials.nav')
        </div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>{{ __('General Setting') }}</h6>
                </div>
                <div class="card-body">
                    {{ Form::open(['route'=>'admin.setting.general.update','method'=>'POST','id'=>'general_setting']) }}
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('site_name','Site Name') }}
                                {{ Form::text('site_name',Setting::get('site_name'),$errors->has('site_name')?['id'=>'site_name','class'=>'form-control is-invalid','placeholder'=>'Site Name']:['id'=>'site_name','class'=>'form-control','placeholder'=>'Site Name']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('site_tag_line','Tag Line') }}
                                {{ Form::text('site_tag_line',Setting::get('site_tag_line'),$errors->has('site_tag_line')?['id'=>'site_tag_line','class'=>'form-control is-invalid','placeholder'=>'Tag Line']:['id'=>'site_tag_line','class'=>'form-control','placeholder'=>'Tag Line']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('timezome','Timezone') }}
                                {{ Form::select('timezome',OptionHelper::get_timezone(),Setting::get('timezome'),$errors->has('timezome')?['id'=>'timezome','class'=>'form-control is-invalid']:['id'=>'timezome','class'=>'form-control']) }}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('language','Language') }}
                                {{ Form::select('language',OptionHelper::get_locale(),Setting::get('language'),$errors->has('language')?['id'=>'language','class'=>'form-control is-invalid']:['id'=>'language','class'=>'form-control']) }}

                            </div>
                        </div>
                    </div>
                    {{ Form::submit('Update',['class'=>'btn btn-primary','id'=>'general_setting_btn']) }}
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
        const updateGeneralSetting = ()=>{
            document.getElementById('general_setting_btn').addEventListener('click',()=>{
                const validation = new JustValidate('#general_setting', {
                            errorFieldCssClass: 'is-invalid',
                            successFieldCssClass:'is-valid'
                        });
                        validation
                        .addField('#site_name', [
                            {
                                rule: 'required',
                            }

                        ])
                        .addField('#site_tag_line', [
                            {
                                rule: 'required',
                            }

                        ])
                        .addField('#timezome', [
                            {
                                rule: 'required',
                            }
                        ])
                        .addField('#language', [
                            {
                                rule: 'required',
                            }

                        ])

                        .onSuccess((event)=>{
                            setTimeout(() => {
                                document.getElementById('general_setting').submit();
                            }, 2000);


                    })

            });
        }
        updateGeneralSetting();


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

<x-admin-layout>
    <x-slot name="title">
        {{ __('Miscellaneous Setting') }}

    </x-slot>
    <div class="row mt-4">

        <div class="col-sm-2">
            @include('admin.settings.partials.nav')
        </div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>{{ __('Miscellaneous Setting') }}</h6>
                </div>
                <div class="card-body">
                    {{ Form::open(['route'=>'admin.setting.miscellaneous.update','method'=>'POST','id'=>'setting']) }}
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('admin_per_page_pagination','Admin Per Page Pagination') }}
                                {{ Form::number('admin_per_page_pagination',Setting::get('admin_per_page_pagination'),$errors->has('admin_per_page_pagination')?['id'=>'admin_per_page_pagination','class'=>'form-control is-invalid','placeholder'=>'10']:['id'=>'admin_per_page_pagination','class'=>'form-control','placeholder'=>'10']) }}
                            </div>
                        </div>

                    </div>
                    {{ Form::submit('Update',['class'=>'btn btn-primary','id'=>'setting_btn']) }}
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
            document.getElementById('setting_btn').addEventListener('click',()=>{
                const validation = new JustValidate('#setting', {
                            errorFieldCssClass: 'is-invalid',
                            successFieldCssClass:'is-valid'
                        });
                        validation
                        .addField('#admin_per_page_pagination', [
                            {
                                rule: 'required',
                            },
                            {
                                rule: 'number',
                            }

                        ])


                        .onSuccess((event)=>{
                            setTimeout(() => {
                                document.getElementById('setting').submit();
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

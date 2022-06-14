<x-admin-layout>
    @php($title = __('Edit District'))
    <x-slot name="title">
        {{ $title }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">
                            {{ $title }}
                        </h6>

                    </div>
                </div>
                <div class="card-body p-3">
                    {{ Form::model($district,['route'=>['admin.organisation.district.update',$district->id] ,'method'=>'PUT','id'=>'edit_district']) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name','Name') }}
                                {{ Form::text('name',null,$errors->has('name')?['id'=>'name','class'=>'form-control is-invalid','placeholder'=>'Nadia']:['id'=>'name','class'=>'form-control','placeholder'=>'Nadia']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('code','Code') }}
                                {{ Form::text('code',null,$errors->has('code')?['id'=>'code','class'=>'form-control is-invalid','placeholder'=>'NAD']:['id'=>'code','class'=>'form-control','placeholder'=>'NAD']) }}
                            </div>
                        </div>
                    </div>
                    <h6 class="font-weight-bolder">{{ __('District Office Address') }}</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('address_line_1','Address Line 1') }}
                                {{ Form::text('address_line_1',optional($district->address()->first())->address_line_1,$errors->has('address_line_1')?['id'=>'address_line_1','class'=>'form-control is-invalid','placeholder'=>'Address Line 1']:['id'=>'address_line_1','class'=>'form-control','placeholder'=>'Address Line 1']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('address_line_2','Address Line 2') }}
                                {{ Form::text('address_line_2',optional($district->address()->first())->address_line_2,$errors->has('address_line_2')?['id'=>'address_line_2','class'=>'form-control is-invalid','placeholder'=>'Address Line 2']:['id'=>'address_line_2','class'=>'form-control','placeholder'=>'Address Line 2']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('city','City') }}
                                {{ Form::text('city',optional($district->address()->first())->city,$errors->has('city')?['id'=>'city','class'=>'form-control is-invalid','placeholder'=>'Kalyani']:['id'=>'city','class'=>'form-control','placeholder'=>'Kalyani']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('district','District') }}
                                {{ Form::text('district',optional($district->address()->first())->district,$errors->has('district')?['id'=>'district','class'=>'form-control is-invalid','placeholder'=>'Nadia']:['id'=>'district','class'=>'form-control','placeholder'=>'Nadia']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('postal_code','Postcode') }}
                                {{ Form::number('postal_code',optional($district->address()->first())->postal_code,$errors->has('postal_code')?['id'=>'postal_code','class'=>'form-control is-invalid','placeholder'=>'741235']:['id'=>'postal_code','class'=>'form-control','placeholder'=>'741235']) }}

                            </div>
                        </div>
                    </div>
                    {{ Form::submit('Update',['class'=>'btn btn-primary','id'=>'add_district']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @push('css')
        {{ Html::style('admin-design/assets/css/pnotify.css') }}
        {{ Html::style('admin-design/assets/css/BrightTheme.css') }}
    @endpush
    @push('js-vendor')
        {{ Html::script('admin-design/assets/js/just-validate.production.min.js') }}
        {{ Html::script('admin-design/assets/js/pnotify.js') }}
    @endpush
    @push('js')
        <script>
            const editDistrct = ()=>{

                    const validation = new JustValidate('#edit_district', {
                                errorFieldCssClass: 'is-invalid',
                                successFieldCssClass:'is-valid',
                                focusInvalidField: true,
                                lockForm: true,
                            });
                            validation
                                .addField('#name',[
                                    {
                                        rule: 'required',
                                    }
                                ])
                                .addField('#code',[
                                    {
                                        rule: 'required',
                                    },

                                ])
                                .addField('#address_line_1',[
                                    {
                                        rule: 'required',
                                    }
                                ])
                                .addField('#city',[
                                    {
                                        rule: 'required',
                                    }
                                ])
                                .addField('#district',[
                                    {
                                        rule: 'required',
                                    }
                                ])
                                .addField('#postal_code',[
                                    {
                                        rule: 'required',
                                    },
                                    {
                                        rule:'minLength',
                                        value:6,
                                    },
                                    {
                                        rule:'maxLength',
                                        value:6,
                                    }

                                ])
                                .onSuccess((event)=>{
                                    event.preventDefault();
                                    setTimeout(() => {
                                        document.getElementById('edit_district').submit();
                                    }, 2000);
                                })

                    }
                    editDistrct();
            const name = document.getElementById('name');
            name.addEventListener('keyup',()=>{
                const district = document.getElementById('name').value;
               document.getElementById('district').value = district;
            });
            const code = document.getElementById('code');
            code.addEventListener('keyup',()=>{
                code.value = code.value.toUpperCase();
            });
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

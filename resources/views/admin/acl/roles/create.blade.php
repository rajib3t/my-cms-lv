<x-admin-layout>
    <x-slot name="title">
        {{ __('Create') }}
    </x-slot>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    {{ Form::open(['route'=>'admin.role.store','method'=>'POST']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('name','Name') }}
                                    {{ Form::text('name',null,$errors->has('name')?['id'=>'name','class'=>'form-control is-invalid','placeholder'=>'Sub Admin']:['id'=>'name','class'=>'form-control','placeholder'=>'Sub Admin']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('guard','Guard') }}
                                    {{ Form::select('guard',$guards,null,$errors->has('guard')?['id'=>'guard','class'=>'form-control is-invalid','placeholder'=>'Select guard']:['id'=>'guard','class'=>'form-control','placeholder'=>'Select guard']) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::submit('Save',['class'=>'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>

<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Permission') }}
    </x-slot>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ __('Permission : ') }}{{ $permission->name }}</h6>
                        <a href="{{ route('admin.permission.add_role',$permission->id) }}" class="text-info col  d-flex flex-row-reverse">{{ __('Add Role') }}</a>
                    </div>


                </div>
                <div class="card-body p-3">
                    {{ Form::model($permission,['route'=>['admin.permission.update',$permission->id],'method'=>'POST']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('name','Name') }}
                                    {{ Form::text('name',null,$errors->has('name')?['id'=>'name','class'=>'form-control is-invalid','placeholder'=>'create.permission']:['id'=>'name','class'=>'form-control','placeholder'=>'create.permission']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('guard','Guard') }}
                                    {{ Form::select('guard',$guards,$permission->guard_name,$errors->has('guard')?['id'=>'guard','class'=>'form-control is-invalid','placeholder'=>'Select guard']:['id'=>'guard','class'=>'form-control','placeholder'=>'Select guard']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('description','Description') }}
                                    {{ Form::textarea('description',$permissioneDetail->description,$errors->has('description')?['id'=>'description','class'=>'form-control is-invalid','placeholder'=>'Description','rows'=>5]:['id'=>'description','class'=>'form-control','placeholder'=>'Description','rows'=>5]) }}
                                </div>
                            </div>
                        </div>

                        {{ Form::submit('Update',['class'=>'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>

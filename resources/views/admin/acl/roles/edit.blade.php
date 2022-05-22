<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Role') }}
    </x-slot>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ __('Role : ') }}{{ $role->name }}</h6>
                        <a href="{{ route('admin.role.add_permission',$role->id) }}" class="text-info col  d-flex flex-row-reverse">{{ __('Add Permissions') }}</a>
                    </div>


                </div>
                <div class="card-body p-3">
                    {{ Form::model($role,['route'=>['admin.role.update',$role->id],'method'=>'POST']) }}
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
                                    {{ Form::select('guard',$guards,$role->guard_name,$errors->has('guard')?['id'=>'guard','class'=>'form-control is-invalid','placeholder'=>'Select guard']:['id'=>'guard','class'=>'form-control','placeholder'=>'Select guard']) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::submit('Update',['class'=>'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ $role->name }} {{ 'has permission' }}</h6>

                    </div>


                </div>
                <div class="card-body p-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary   font-weight-bolder" scope="col">{{ __('Name') }}</th>

                                    <th class="text-secondary   font-weight-bolder" scope="col">{{ __('Description') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $item)
                                    <tr>
                                        <td class="text-secondary font-weight-bolder">{{ $item->name }}</td>
                                        <td class="text-secondary ">
                                            @php($detail = App\Models\PermissionDetail::where('permission_id',$item->id)->first())
                                            {{ $detail->description }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ __('No permission') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css')
        {{ Html::style('admin-design/assets/css/pnotify.css') }}
    @endpush
    @push('js')
        {{ Html::script('admin-design/assets/js/pnotify.js') }}
        @if(Session::has('success'))
            <script>
                PNotify.success({
                    title: 'Roles',
                    text: '{{ Session::get('success') }}',

                });
            </script>
        @endif
        @if(Session::has('error'))
            <script>
                PNotify.error({
                    title: 'Roles',
                    text: '{{ Session::get('error') }}',

                });
            </script>


        @endif
    @endpush
</x-admin-layout>

<x-admin-layout>
    <x-slot name="title">
        {{ __('Add Role to Permission') }}
    </x-slot>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ __('Add Role to  ') }}{{ $permission->name }}</h6>

                    </div>


                </div>
                <div class="card-body p-3">
                    <div class="form-check">
                        {!! Form::checkbox('checkall', 'all', null, ['class'=>'form-check-input','id'=>'checkall']) !!}

                        {!! Form::label('checkall','Check All', ['class'=>'form-check-label']) !!}
                      </div>
                    {{ Form::open(['route' => ['admin.permission.store_role', $permission->id], 'method' => 'POST']) }}
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Name') }}</th>
                                    <th class="text-secondary text-center text-xxs font-weight-bolder" scope="col">{{ __('Guard') }}</th>

                                    <th class="text-secondary   font-weight-bolder" scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    @if ($role->id !=1)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    @php($r = $permission->roles()->where('role_id',$role->id)->first())
                                                    @if($r)
                                                        @php($checked = true)
                                                    @else
                                                        @php($checked = false)
                                                    @endif
                                                    {{ Form::checkbox('roles[]', $role->id, $checked, ['class' => 'form-check-input', 'id' => 'role' . $permission->id]) }}
                                                    {{ Form::label('role-'.$role->id,$role->name,['class'=>'custom-control-label']) }}


                                                </div>

                                            </td>
                                            <td class="text-center text-xxs">{{ $role->guard_name }}</td>

                                            <td>
                                                @if($r)
                                                    <a class="text-danger" href="{{ route('admin.permission.remove_role',['id'=>$permission->id,'role_id'=>$role->id]) }}"><i class="ni ni-fat-remove"></i></a>

                                                @else
                                                    <a class="text-success"href="{{ route('admin.permission.add_single_role',['id'=>$permission->id,'role_id'=>$role->id]) }}"><i class="ni ni-fat-add"></i></a>

                                                @endif
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {{ Form::submit(__('Save'), ['class' => 'btn btn-primary']) }}

                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            var checkall = document.getElementById('checkall');
            checkall.addEventListener('click',function(){
                var checkboxes = document.getElementsByName("roles[]");
                if(this.checked == true){
                    for(var i=0; i<checkboxes.length; i++){

                        checkboxes[i].checked=true;
                    }
                }else{
                    for(var i=0; i<checkboxes.length; i++){

                        checkboxes[i].checked=false;
                    }
                }
            })
        </script>
    @endpush
</x-admin-layout>

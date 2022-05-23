<x-admin-layout>
    <x-slot name="title">
        {{ __('Admin User List') }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">{{ __('Admin User List') }}</h6>
                        <a href="{{ route('admin.user.admin.create') }}" class="text-info col  d-flex flex-row-reverse"><i class="ni ni-fat-add"></i><span>{{ __('Add Admin User') }}</span></a>
                    </div>


                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-2">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Name') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Email') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Mobole') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Role') }}</th>
                                    <th class="text-secondary text-center text-xxs font-weight-bolder" scope="col">{{ __('Action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                    <tr>
                                        <td class="text-xs text-secondary">{{ $item->name }}</td>
                                        <td class="align-middle  text-sm">{{ $item->email }}</td>
                                        <td class="align-middle  text-sm">{{ $item->mobile }}</td>
                                        <td class="align-middle  text-sm">
                                            @php($roles = $item->getRoleNames()->toArray() )
                                            {!! implode(',',$roles) !!}
                                        </td>
                                        <td class="align-middle  text-sm">
                                            @if ($item->id != 1)
                                                <a href="{{ route('admin.user.admin.edit',$item->id) }}" class="p-1 text-secondary font-weight-bold text-xs text-info">{{ __('Edit') }}</a>
                                                {{-- <a href="{{ route('admin.user.admin.delete',$item->id) }}" class="p-1 text-secondary font-weight-bold text-xs text-danger">{{ __('Delete') }}</a> --}}

                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">{{ __('No Users Found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-2">{{ $users->links() }}</div>
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

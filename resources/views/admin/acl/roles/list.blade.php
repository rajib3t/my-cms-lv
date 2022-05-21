<x-admin-layout>
    <x-slot name="title">
        {{ __('Roles') }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>{{ __('Roles') }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Name') }}</th>
                                    <th class="text-secondary text-center text-xxs font-weight-bolder" scope="col">{{ __('Guard') }}</th>
                                    <th class="text-secondary text-center text-xxs font-weight-bolder" scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $item)
                                    <tr>
                                        <td class="text-xs text-secondary">{{ $item->name }}</td>
                                        <td class="align-middle text-center text-sm">{{ $item->guard_name }}</td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($item->id != 1)
                                                <a href="{{ route('admin.role.edit',$item->id) }}" class="p-1 text-secondary font-weight-bold text-xs text-info">{{ __('Edit') }}</a>
                                                <a href="{{ route('admin.role.delete',$item->id) }}" class="p-1 text-secondary font-weight-bold text-xs text-danger">{{ __('Delete') }}</a>

                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">{{ __('No Roles Founds') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-2">{{ $roles->links() }}</div>
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

<x-admin-layout>
    <x-slot name="title">
        {{ __('Permissions') }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>{{ __('Permissions') }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 p-2">
                            <thead>
                                <tr>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Name') }}</th>
                                    <th class="text-secondary text-center text-xxs font-weight-bolder" scope="col">{{ __('Guard') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Descriptions') }}</th>
                                    <th class="text-secondary text-center text-xxs font-weight-bolder" scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $item)
                                    <tr>
                                        <td class="text-xs text-secondary">{{ $item->name }}</td>
                                        <td class="align-middle text-center text-sm">{{ $item->guard_name }}</td>
                                        <td class="align-middle  text-sm">
                                            @php($detail = App\Models\PermissionDetail::where('permission_id',$item->id)->first())
                                            {{ $detail->description }}
                                        </td>
                                        <td class="align-middle text-center text-sm">

                                            <a href="{{ route('admin.permission.edit',$item->id) }}" class="p-1 text-secondary font-weight-bold text-xs text-info">{{ __('Edit') }}</a>
                                            <a href="{{ route('admin.permission.delete',$item->id) }}" class="p-1 text-secondary font-weight-bold text-xs text-danger">{{ __('Delete') }}</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">{{ __('No Permissions Found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-2">{{ $permissions->links() }}</div>
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
    @endpush
    @push('js')




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

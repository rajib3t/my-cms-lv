<x-admin-layout>
    @php($title = 'Deleted Districts')
    <x-slot name="title">
        {{ __($title) }}

    </x-slot>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col  d-flex flex-row ">
                            {{ __($title) }}
                        </h6>

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-2">
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Name') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Code') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Slug') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($districts as $item)
                                    <tr>
                                        <td class="text-xs text-secondary">{{ $item->name }}</td>
                                        <td class="text-xs text-secondary">{{ $item->code }}</td>
                                        <td class="text-xs text-secondary">{{ $item->slug }}</td>
                                        <td class="text-xs text-secondary">
                                            <a href="{{ route('admin.organisation.district.restore',$item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Restore District" class="p-1 text-secondary font-weight-bold text-xs text-info"><i class="fas fa-trash-restore"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            {{ __('No Districts Found') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-2">{{ $districts->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    @push('css-vendor')
        {{ Html::style('admin-design/assets/css/pnotify.css') }}
        {{ Html::style('admin-design/assets/css/BrightTheme.css') }}
        {{ Html::script('https://kit.fontawesome.com/42d5adcbca.js',['crossorigin'=>'anonymous']) }}
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

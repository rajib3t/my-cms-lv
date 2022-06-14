<x-admin-layout>
    @php($title='Samithis List')
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
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('District') }}</th>
                                    <th class="text-secondary  text-xxs font-weight-bolder" scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($samithis as $samithi)
                                    <tr>
                                        <td class="text-sm">{{ $samithi->name }}</td>
                                        <td class="text-sm">{{ $samithi->district()->first()->name }}</td>
                                        <td class="text-sm">

                                            <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Restore Samithi" class="p-1 text-secondary font-weight-bold text-xs text-success" onclick="event.preventDefault();
                                            document.getElementById('delete-form-{{ $samithi->id }}').submit();"><i class="fas fa-trash-restore"></i></a>
                                            <form id="delete-form-{{  $samithi->id  }}" action="{{ route('admin.organisation.samithi.restore', $samithi->id) }}" method="post" style="display: none;">
                                                @csrf
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            {{ __('No Samithis Found') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                    <div class="p-2">{{ $samithis->links() }}</div>
                </div>
            </div>
        </div>
    </div>
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

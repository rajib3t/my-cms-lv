@php($route = Route::currentRouteName())
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill flex-column p-1" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 {{ NavHelper::tabActive($route,'admin.user.admin.setting.general') }}" role="tab" href="{{ route('admin.user.admin.setting.general') }}" >
                    {{ __('General') }}
                    </a>
                  </li>


                </ul>
            </div>

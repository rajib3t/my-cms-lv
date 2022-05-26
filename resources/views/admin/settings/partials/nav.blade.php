@php($route = Route::currentRouteName())
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill flex-column p-1" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 {{ NavHelper::tabActive($route,'admin.setting.general') }}" role="tab" href="{{ route('admin.setting.general') }}" >
                    {{ __('General') }}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 {{ NavHelper::tabActive($route,'admin.setting.miscellaneous') }}" role="tab"  href="{{ route('admin.setting.miscellaneous') }}" >
                        {{ __('Miscellaneous') }}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#payments-tabs-vertical" role="tab" aria-controls="code" aria-selected="false">
                      Payments
                    </a>
                  </li>
                </ul>
            </div>

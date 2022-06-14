<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('admin-design/assets/img/ssssevaorg-logo-white.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">{{ __('SSSSOWB') }}</span>
      </a>
    </div>
    @php($route = Route::currentRouteName())
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item {{ NavHelper::navActive($route,['admin.dashboard']) }}">
          <a class="nav-link {{ NavHelper::linkActive($route,'admin.dashboard') }}" href="{{ route('admin.dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
          </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Organisations') }}</h6>
        </li>
        @php($organisations = [
            'admin.organisation.district.list',
            'admin.organisation.district.create',
            'admin.organisation.district.edit',
            'admin.organisation.district.trash',
            'admin.organisation.samithi.list',
            'admin.organisation.samithi.create',
            'admin.organisation.samithi.edit',
            'admin.organisation.samithi.trash',
            ])
        <li class="nav-item ">
          <a data-bs-toggle="collapse" href="#organisations"  class="nav-link {{ NavHelper::linkActive($route,$organisations) }}" aria-controls="organisations" role="button" aria-expanded="{{ NavHelper::navExpand($route,$organisations) }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
               <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><title>image-personnel-staff-crew-appearance-company-organization</title><path d="M6.09027,8.07672a.09147.09147,0,0,0-.18054,0,3.74934,3.74934,0,0,1-2.83295,2.833.09149.09149,0,0,0,0,.1806,3.74942,3.74942,0,0,1,2.833,2.833.09146.09146,0,0,0,.18054,0,3.74942,3.74942,0,0,1,2.833-2.833.09149.09149,0,0,0,0-.1806A3.74934,3.74934,0,0,1,6.09027,8.07672Z"/><path d="M60.92322,16.90967a3.74934,3.74934,0,0,1-2.833-2.83295.09147.09147,0,0,0-.18054,0,3.74934,3.74934,0,0,1-2.833,2.83295.09149.09149,0,0,0,0,.1806,3.74942,3.74942,0,0,1,2.833,2.833.09146.09146,0,0,0,.18054,0,3.74942,3.74942,0,0,1,2.833-2.833A.09149.09149,0,0,0,60.92322,16.90967Z"/><path d="M3,62H61V51.647C61,48.00848,56.52283,46,51,46c-4.43555,0-8.191,1.2981-9.5,3.693C40.191,47.2981,36.43555,46,32,46s-8.191,1.2981-9.5,3.693C21.191,47.2981,17.43555,46,13,46,7.47717,46,3,48.00848,3,51.647Z"/><circle cx="13" cy="40" r="6"/><path d="M13,32a7.98919,7.98919,0,0,1,6.26117,12.96515A10.82533,10.82533,0,0,1,22.504,46.6889a10.84985,10.84985,0,0,1,3.23565-1.72271,8,8,0,1,1,12.52076,0A10.84985,10.84985,0,0,1,41.496,46.6889a10.82533,10.82533,0,0,1,3.2428-1.72375A7.98919,7.98919,0,0,1,51,32V2H13ZM45,6h2V8H45Zm0,4h2v2H45Zm0,4h2v2H45Zm0,4h2v2H45Zm0,4h2v2H45Zm0,4h2v2H45ZM41,6h2V8H41Zm0,4h2v2H41Zm0,4h2v2H41Zm0,4h2v2H41Zm0,4h2v2H41Zm0,4h2v2H41ZM31,28H29V26h2Zm0-4H29V22h2Zm4,4H33V26h2Zm0-4H33V22h2Zm4,4H37V26h2Zm0-4H37V22h2ZM30.13678,10.96021,31.93384,7,33.845,10.90131,38,11.46576l-2.95563,3.1073.77094,4.30908-3.7378-1.98083L28.39886,19l.64551-4.3316L26,11.65637ZM25,22h2v2H25Zm0,4h2v2H25ZM21,6h2V8H21Zm0,4h2v2H21Zm0,4h2v2H21Zm0,4h2v2H21Zm0,4h2v2H21Zm0,4h2v2H21ZM17,6h2V8H17Zm0,4h2v2H17Zm0,4h2v2H17Zm0,4h2v2H17Zm0,4h2v2H17Zm0,4h2v2H17Z"/><circle cx="32" cy="40" r="6"/><circle cx="51" cy="40" r="6"/></svg>
            </div>
            <span class="nav-link-text ms-1">{{ __('Organisations') }}</span>
            </a>
            <div class="collapse {{ NavHelper::navOpen($route,$organisations) }}" id="organisations" style="">

                <ul class="nav ms-4 ps-3">
                    @php($districts = [
                    'admin.organisation.district.list',
                    'admin.organisation.district.create',
                    'admin.organisation.district.edit',
                    'admin.organisation.district.trash'
                    ])
                    <li class="nav-item  ">
                        <a class="nav-link  {{ NavHelper::navActive($route,$districts)}}" data-bs-toggle="collapse" aria-expanded="{{ NavHelper::navExpand($route,$districts) }}" href="#districts">

                            <span class="sidenav-normal">{{ __('Districts') }}</span>
                        </a>
                        <div class="collapse {{ NavHelper::navOpen($route,$districts) }}" id="districts" style="">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a class="nav-link {{ NavHelper::linkActive($route,'admin.organisation.district.list') }}" href="{{ route('admin.organisation.district.list') }}"  >
                                        {{ __('List') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ NavHelper::linkActive($route,'admin.organisation.district.create') }}" href="{{ route('admin.organisation.district.create') }}"  >
                                        {{ __('Create') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ NavHelper::linkActive($route,'admin.organisation.district.trash') }}" href="{{ route('admin.organisation.district.trash') }}"  >
                                        {{ __('Trash') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @php($samithies = [
                    'admin.organisation.samithi.list',
                    'admin.organisation.samithi.create',
                    'admin.organisation.samithi.edit',
                    'admin.organisation.samithi.trash'
                    ])
                    <li class="nav-item">
                        <a class="nav-link {{ NavHelper::navActive($route,$samithies)}}"data-bs-toggle="collapse" aria-expanded="{{ NavHelper::navExpand($route,$samithies) }}" href="#samithies" >
                            <span class="sidenav-normal">{{ __('Samithis') }}</span>
                        </a>
                        <div class="collapse {{ NavHelper::navOpen($route,$samithies) }}" id="samithies" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ NavHelper::linkActive($route,'admin.organisation.samithi.list') }}" href="{{ route('admin.organisation.samithi.list') }}"  >
                                        {{ __('List') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ NavHelper::linkActive($route,'admin.organisation.samithi.create') }}" href="{{ route('admin.organisation.samithi.create') }}"  >
                                        {{ __('Create') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ NavHelper::linkActive($route,'admin.organisation.samithi.trash') }}" href="{{ route('admin.organisation.samithi.trash') }}"  >
                                        {{ __('Trash') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ NavHelper::navActive($route,['admin.setting.general','admin.setting.miscellaneous']) }}">
            <a class="nav-link {{ NavHelper::navActive($route,['admin.setting.general','admin.setting.miscellaneous']) }}" href="{{ route('admin.setting.general') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>settings</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(304.000000, 151.000000)">
                    <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                    <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                    <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                    </g>
                    </g>
                     </g>
                    </g>
                    </svg>
              </div>
              <span class="nav-link-text ms-1">{{ __('Setting') }}</span>
            </a>
          </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('Users') }}</h6>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#users" class="nav-link {{ NavHelper::navActive($route,['admin.user.admin.list','admin.user.admin.create','admin.user.admin.edit','admin.user.admin.password.change','admin.user.admin.trash']) }}" aria-controls="users" role="button" aria-expanded="{{ NavHelper::navExpand($route,['admin.user.admin.list','admin.user.admin.create','admin.user.admin.edit','admin.user.admin.password.change','admin.user.admin.trash']) }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                    viewBox="0 0 511.996 511.996" style="enable-background:new 0 0 511.996 511.996;" xml:space="preserve">
                            <path d="M461.832,3.145c-11.109-5.328-24.266-3.797-33.891,3.922c-39.984,32.141-111.953,32.125-151.875,0.016
                            c-11.719-9.438-28.406-9.422-40.125-0.016C195.975,39.207,123.975,39.191,84.07,7.082C74.459-0.652,61.26-2.184,50.193,3.145
                            C39.086,8.457,32.008,19.691,32.008,32.004l-0.016,256c0,100.297,80.406,183.555,215.078,222.727
                            c2.92,0.844,5.918,1.266,8.938,1.266c3.012,0,6.016-0.422,8.938-1.266c134.668-39.172,215.059-122.414,215.059-222.727v-256
                            C480.004,19.691,472.941,8.457,461.832,3.145z M416.004,256.004H255.99v190.578C155.602,415.066,95.992,356.215,96.008,288.004v-32
                            H255.99V70.754h0.018c45.84,26.922,108.686,32.391,159.996,14.688V256.004z"/>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">{{ __('Users') }}</span>
            </a>
            <div class="collapse {{ NavHelper::navOpen($route,['admin.user.admin.list','admin.user.admin.create','admin.user.admin.edit','admin.user.admin.password.change','admin.user.admin.trash']) }}" id="users" style="">
                <ul class="nav ms-4 ps-3">
                    <li class="nav-item  ">
                        <a class="nav-link {{ NavHelper::navActive($route,['admin.user.admin.list','admin.user.admin.create','admin.user.admin.edit','admin.user.admin.password.change','admin.user.admin.trash']) }}" data-bs-toggle="collapse" aria-expanded="{{ NavHelper::navExpand($route,['admin.user.admin.list','admin.user.admin.create','admin.user.admin.edit','admin.user.admin.password.change','admin.user.admin.trash']) }}" href="#admins">

                            <span class="sidenav-normal">{{ __('Admins') }}</span>
                        </a>
                        <div class="collapse {{ NavHelper::navOpen($route,['admin.user.admin.list','admin.user.admin.create','admin.user.admin.edit','admin.user.admin.password.change','admin.user.admin.trash']) }}" id="admins" style="">
                            <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.user.admin.list') }}" href="{{ route('admin.user.admin.list') }}"  >
                                            {{ __('List') }}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.user.admin.create') }}" href="{{ route('admin.user.admin.create') }}"  >
                                            {{ __('Create') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.user.admin.trash') }}" href="{{ route('admin.user.admin.trash') }}"  >
                                            {{ __('Trash') }}
                                        </a>
                                    </li>


                            </ul>
                        </div>
                    </li>

                    <li class="nav-item  ">
                        <a class="nav-link {{ NavHelper::navActive($route,['admin.permission.list','admin.permission.create','admin.permission.edit','admin.permission.add_role']) }}" data-bs-toggle="collapse" aria-expanded="{{ NavHelper::navExpand($route,['admin.permission.list','admin.permission.create','admin.permission.edit','admin.permission.add_role']) }}" href="#permissions">

                            <span class="sidenav-normal">{{ __('Permission') }}</span>
                        </a>
                        <div class="collapse {{ NavHelper::navOpen($route,['admin.permission.list','admin.permission.create','admin.permission.edit','admin.permission.add_role']) }}" id="permissions" style="">
                            <ul class="nav nav-sm flex-column">
                                @can('role.list')
                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.permission.list') }}" href="{{ route('admin.permission.list') }}"  >
                                            {{ __('List') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('role.create')
                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.permission.create') }}" href="{{ route('admin.permission.create') }}"  >
                                            {{ __('Create') }}
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('ACL') }}</h6>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#acl" class="nav-link {{ NavHelper::navActive($route,['admin.role.list','admin.role.create','admin.role.edit','admin.permission.list','admin.permission.create','admin.permission.edit','admin.role.add_permission','admin.permission.add_role','admin.permission.edit']) }}" aria-controls="acl" role="button" aria-expanded="{{ NavHelper::navExpand($route,['admin.role.list','admin.role.create','admin.role.edit','admin.role.add_permission','admin.permission.add_role']) }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                    viewBox="0 0 511.996 511.996" style="enable-background:new 0 0 511.996 511.996;" xml:space="preserve">
                            <path d="M461.832,3.145c-11.109-5.328-24.266-3.797-33.891,3.922c-39.984,32.141-111.953,32.125-151.875,0.016
                            c-11.719-9.438-28.406-9.422-40.125-0.016C195.975,39.207,123.975,39.191,84.07,7.082C74.459-0.652,61.26-2.184,50.193,3.145
                            C39.086,8.457,32.008,19.691,32.008,32.004l-0.016,256c0,100.297,80.406,183.555,215.078,222.727
                            c2.92,0.844,5.918,1.266,8.938,1.266c3.012,0,6.016-0.422,8.938-1.266c134.668-39.172,215.059-122.414,215.059-222.727v-256
                            C480.004,19.691,472.941,8.457,461.832,3.145z M416.004,256.004H255.99v190.578C155.602,415.066,95.992,356.215,96.008,288.004v-32
                            H255.99V70.754h0.018c45.84,26.922,108.686,32.391,159.996,14.688V256.004z"/>
                    </svg>
                </div>
                <span class="nav-link-text ms-1">{{ __('ACL') }}</span>
            </a>
            <div class="collapse {{ NavHelper::navOpen($route,['admin.role.list','admin.role.create','admin.role.edit','admin.role.add_permission','admin.permission.list','admin.permission.create','admin.permission.edit','admin.permission.add_role']) }}" id="acl" style="">
                <ul class="nav ms-4 ps-3">
                    <li class="nav-item  ">
                        <a class="nav-link {{ NavHelper::navActive($route,['admin.role.list','admin.role.create','admin.role.edit','admin.role.add_permission']) }}" data-bs-toggle="collapse" aria-expanded="{{ NavHelper::navExpand($route,['admin.role.list','admin.role.create','admin.role.edit','admin.role.add_permission']) }}" href="#roles">

                            <span class="sidenav-normal">{{ __('Roles') }}</span>
                        </a>
                        <div class="collapse {{ NavHelper::navOpen($route,['admin.role.list','admin.role.create','admin.role.edit','admin.role.add_permission']) }}" id="roles" style="">
                            <ul class="nav nav-sm flex-column">
                                @can('role.list')
                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.role.list') }}" href="{{ route('admin.role.list') }}"  >
                                            {{ __('List') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('role.create')
                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.role.create') }}" href="{{ route('admin.role.create') }}"  >
                                            {{ __('Create') }}
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link {{ NavHelper::navActive($route,['admin.permission.list','admin.permission.create','admin.permission.edit','admin.permission.add_role']) }}" data-bs-toggle="collapse" aria-expanded="{{ NavHelper::navExpand($route,['admin.permission.list','admin.permission.create','admin.permission.edit','admin.permission.add_role']) }}" href="#permissions">

                            <span class="sidenav-normal">{{ __('Permission') }}</span>
                        </a>
                        <div class="collapse {{ NavHelper::navOpen($route,['admin.permission.list','admin.permission.create','admin.permission.edit','admin.permission.add_role']) }}" id="permissions" style="">
                            <ul class="nav nav-sm flex-column">
                                @can('role.list')
                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.permission.list') }}" href="{{ route('admin.permission.list') }}"  >
                                            {{ __('List') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('role.create')
                                    <li class="nav-item">
                                        <a class="nav-link {{ NavHelper::linkActive($route,'admin.permission.create') }}" href="{{ route('admin.permission.create') }}"  >
                                            {{ __('Create') }}
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </li>

      </ul>
    </div>

  </aside>

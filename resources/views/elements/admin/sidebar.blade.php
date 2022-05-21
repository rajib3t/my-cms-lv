<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
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
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ __('ACL') }}</h6>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#acl" class="nav-link {{ NavHelper::navActive($route,['admin.role.list','admin.role.create']) }}" aria-controls="acl" role="button" aria-expanded="{{ NavHelper::navExpand($route,['admin.role.list','admin.role.create']) }}">
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
            <div class="collapse {{ NavHelper::navOpen($route,['admin.role.list','admin.role.create','admin.role.edit']) }}" id="acl" style="">
                <ul class="nav ms-4 ps-3">
                    <li class="nav-item  ">
                        <a class="nav-link {{ NavHelper::navActive($route,['admin.role.list','admin.role.create','admin.role.edit']) }}" data-bs-toggle="collapse" aria-expanded="{{ NavHelper::navExpand($route,['admin.role.list','admin.role.create']) }}" href="#roles">

                            <span class="sidenav-normal">{{ __('Roles') }}</span>
                        </a>
                        <div class="collapse {{ NavHelper::navOpen($route,['admin.role.list','admin.role.create','admin.role.edit']) }}" id="roles" style="">
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

                </ul>
            </div>
        </li>

      </ul>
    </div>

  </aside>

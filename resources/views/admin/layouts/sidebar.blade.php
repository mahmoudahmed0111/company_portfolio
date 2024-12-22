<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="index-2.html" class="logo">
            <span>
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label mt-2">
                        <span>Main</span>
                    </li>

                    {{-- permission dashboard  --}}
                    @permission('dashboard-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">
                                <i class="iconoir-report-columns menu-icon"></i>
                                <span>{{ __('translations.dashboard') }}</span>
                            </a>
                        </li>
                    @endpermission

                    {{-- permission roles --}}
                    @permission('roles-list')
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarRoles" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarRoles">
                                <i class="iconoir-task-list menu-icon"></i>
                                <span>{{ __('translations.roles') }}</span>
                            </a>
                            <div class="collapse" id="sidebarRoles">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('roles.index') }}">{{ __('translations.roles') }}</a>
                                    </li><!--end nav-item-->
                                    @permission('roles-create')
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('roles.create') }}">{{ __('translations.roles-create') }}</a>
                                        </li><!--end nav-item-->
                                    @endpermission
                                </ul><!--end nav-->
                            </div><!--end sidebarRoles-->
                        </li>
                    @endpermission

                    {{-- permission users  --}}
                    @permission('users-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="iconoir-group menu-icon"></i>
                                <span>{{ __('translations.users') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission services  --}}
                    @permission('services-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('services.index') }}">
                                <i class="iconoir-okrs menu-icon"></i>
                                <span>{{ __('translations.Services') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission articles  --}}
                    @permission('articles-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('articles.index') }}">
                                <i class="iconoir-book menu-icon"></i>
                                <span>{{ __('translations.Articles') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission projects  --}}
                    @permission('projects-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.index') }}">
                                <i class="iconoir-view-grid menu-icon"></i>
                                <span>{{ __('translations.Projects') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission packages  --}}
                    @permission('packages-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('packages.index') }}">
                                <i class="iconoir-packages menu-icon"></i>
                                <span>{{ __('translations.Packages') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission packages  --}}
                    @permission('testimonials-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('testimonials.index') }}">
                                <i class="iconoir-group menu-icon"></i>
                                <span>{{ __('translations.Testimonials') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission packages  --}}
                    @permission('contactus-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactus.index') }}">
                                <i class="iconoir-phone menu-icon"></i>
                                <span>{{ __('translations.Contactus') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission packages  --}}
                    @permission('settings')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.index') }}">
                                <i class="iconoir-settings menu-icon"></i>
                                <span>{{ __('translations.Settings') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission

                    {{-- permission packages  --}}
                    @permission('social_links-list')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('social_links.index') }}">
                                <i class="iconoir-link menu-icon"></i>
                                <span>{{ __('translations.social_links') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission


                    {{-- permission packages  --}}
                    @permission('terms')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('terms.index') }}">
                                <i class="iconoir-air-conditioner menu-icon"></i>
                                <span>{{ __('translations.Terms') }}</span>
                            </a>
                        </li><!--end nav-item-->
                    @endpermission








                </ul><!--end navbar-nav--->

            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div><!--end startbar-->
<div class="startbar-overlay d-print-none"></div>

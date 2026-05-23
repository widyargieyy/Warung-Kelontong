<header class="app-topbar">
    <div class="container-fluid topbar-menu">
        <div class="d-flex align-items-center gap-2">

            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="index.html" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets') }}/images/logo.png" alt="logo" />
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo" />
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('assets') }}/images/logo-black.png" alt="dark logo" />
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo" />
                    </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="sidenav-toggle-button btn btn-primary btn-icon">
                <i class="ti ti-menu-4"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu">
                <i class="ti ti-menu-4"></i>
            </button>

            <!-- Search -->
            <div id="search-box-rounded" class="app-search d-none d-xl-flex">
                <input type="search" class="form-control rounded-pill topbar-search" name="search"
                    placeholder="Quick Search..." />
                <i class="ti ti-search app-search-icon text-muted"></i>
            </div>

            <!-- Mega Menu - Apps -->
            <div id="megamenu-apps" class="topbar-item d-none d-md-flex">
                <div class="dropdown">
                    <button class="topbar-link btn fw-medium btn-link dropdown-toggle drop-arrow-none px-2"
                        data-bs-toggle="dropdown" type="button" aria-haspopup="false" aria-expanded="false">
                        Apps
                        <i class="ti ti-chevron-down ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-xxl p-0">
                        <div class="h-100" style="max-height: 380px" data-simplebar="">
                            <div class="row g-0">
                                <div class="col-sm-8">
                                    <div class="row g-0">
                                        <div class="col-sm-6">
                                            <div class="p-2">
                                                <a href="#!" class="dropdown-item">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-primary border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-basket fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">eCommerce</h5>
                                                            <span class="text-muted fs-12">Products, orders &amp;
                                                                etc.</span>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="#!" class="dropdown-item my-2">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-success border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-message fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">Chat</h5>
                                                            <span class="text-muted fs-12">Team conversations</span>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="#!" class="dropdown-item my-2">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-danger border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-list-check fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">Task</h5>
                                                            <span class="text-muted fs-12">Plan and track work</span>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="#!" class="dropdown-item mt-2">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-info border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-mailbox fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">Email</h5>
                                                            <span class="text-muted fs-12">Messages and inbox</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="p-2">
                                                <a href="#!" class="dropdown-item">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-secondary border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-building fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">Companies</h5>
                                                            <span class="text-muted fs-12">Business profiles</span>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="#!" class="dropdown-item my-2">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-dark border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-id fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">Contacts Diary</h5>
                                                            <span class="text-muted fs-12">People and
                                                                connections</span>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="#!" class="dropdown-item my-2">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-warning border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-calendar fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">Calendar</h5>
                                                            <span class="text-muted fs-12">Events and reminders</span>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="#!" class="dropdown-item mt-2">
                                                    <span class="d-flex align-items-center">
                                                        <span class="avatar-md me-2">
                                                            <span
                                                                class="avatar-title text-success border border-light bg-light bg-opacity-50 rounded">
                                                                <i class="ti ti-lifebuoy fs-22"></i>
                                                            </span>
                                                        </span>
                                                        <span>
                                                            <h5 class="fs-base mb-0 lh-base">Support</h5>
                                                            <span class="text-muted fs-12">Help and assistance</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row-->

                                    <div class="row g-0 border-top border-light border-dashed text-center">
                                        <div class="col">
                                            <div class="p-3">
                                                <p class="fw-medium text-muted mb-2 fs-11 text-uppercase lh-1">-:
                                                    &nbsp; Support &nbsp;:-</p>
                                                <h5 class="fs-15 mb-0">help@mydomain.com</h5>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3">
                                                <p class="fw-medium text-muted mb-2 fs-11 text-uppercase lh-1">-:
                                                    &nbsp; Help: &nbsp;:-</p>
                                                <h5 class="fs-15 mb-0">+(12) 3456 7890</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <!-- Theme Toggle -->
            <div id="theme-dropdown" class="topbar-item d-none d-sm-flex">
                <div class="dropdown">
                    <button class="topbar-link" data-bs-toggle="dropdown" type="button" aria-haspopup="false"
                        aria-expanded="false">
                        <i class="ti ti-sun topbar-link-icon d-none" id="theme-icon-light"></i>
                        <i class="ti ti-moon topbar-link-icon d-none" id="theme-icon-dark"></i>
                        <i class="ti ti-sun-moon topbar-link-icon d-none" id="theme-icon-system"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" data-thememode="dropdown">
                        <label class="dropdown-item cursor-pointer">
                            <input class="form-check-input" type="radio" name="data-bs-theme" value="light"
                                style="display: none" />
                            <i class="ti ti-sun align-middle me-1 fs-16"></i>
                            <span class="align-middle">Light</span>
                        </label>
                        <label class="dropdown-item cursor-pointer">
                            <input class="form-check-input" type="radio" name="data-bs-theme" value="dark"
                                style="display: none" />
                            <i class="ti ti-moon align-middle me-1 fs-16"></i>
                            <span class="align-middle">Dark</span>
                        </label>
                        <label class="dropdown-item cursor-pointer">
                            <input class="form-check-input" type="radio" name="data-bs-theme" value="system"
                                style="display: none" />
                            <i class="ti ti-sun-moon align-middle me-1 fs-16"></i>
                            <span class="align-middle">System</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Apps Grid Dropdown -->
            <div id="apps-dropdown-grid" class="topbar-item d-none d-xl-flex">
                <div class="dropdown">
                    <button class="topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown"
                        type="button" data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-apps topbar-link-icon"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-2 dropdown-menu-end">
                        <div class="row align-items-center g-1">
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="{{ asset('assets') }}/images/logos/google.svg" alt="Google Logo"
                                                height="18" />
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Google</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="{{ asset('assets') }}/images/logos/figma.svg" alt="Figma Logo"
                                                height="18" />
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Figma</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="{{ asset('assets') }}/images/logos/slack.svg" alt="Slack Logo"
                                                height="18" />
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Slack</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="{{ asset('assets') }}/images/logos/dropbox.svg"
                                                alt="Dropbox Logo" height="18" />
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Dropbox</span>
                                </a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="javascript:void(0);" class="btn btn-sm rounded-circle btn-icon btn-danger">
                                    <i class="ti ti-circle-dashed-plus fs-18"></i>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-calendar fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Calendar</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-message-circle fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Chat</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-folder fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Files</span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);"
                                    class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-users fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Team</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div id="notification-dropdown-people" class="topbar-item">
                @include('layouts.partials.topbar-notifications')
            </div>

            <!-- Fullscreen -->
            <div id="fullscreen-toggler" class="topbar-item d-none d-md-flex">
                <button class="topbar-link" type="button" data-toggle="fullscreen">
                    <i class="ti ti-maximize topbar-link-icon"></i>
                    <i class="ti ti-minimize topbar-link-icon d-none"></i>
                </button>
            </div>

            <!-- Monochrome -->
            <div id="monochrome-toggler" class="topbar-item d-none d-xl-flex">
                <button id="monochrome-mode" class="topbar-link" type="button" data-toggle="monochrome">
                    <i class="ti ti-palette topbar-link-icon"></i>
                </button>
            </div>

            <!-- Theme Settings -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link btn-theme-setting" data-bs-toggle="offcanvas"
                    data-bs-target="#theme-settings-offcanvas" type="button">
                    <i class="ti ti-settings topbar-link-icon"></i>
                </button>
            </div>

            <!-- Language Selector -->
            <div id="language-selector-rounded" class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link fw-bold" data-bs-toggle="dropdown" type="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets') }}/images/flags/us.svg" alt="user-image"
                            class="rounded-circle me-2" height="18" id="selected-language-image" />
                        <span id="selected-language-code">EN</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="en"
                            title="English">
                            <img src="{{ asset('assets') }}/images/flags/us.svg" alt="English"
                                class="me-1 rounded-circle" height="18" />
                            <span class="align-middle">English</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="de"
                            title="German">
                            <img src="{{ asset('assets') }}/images/flags/de.svg" alt="German"
                                class="me-1 rounded-circle" height="18" />
                            <span class="align-middle">Deutsch</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="it"
                            title="Italian">
                            <img src="{{ asset('assets') }}/images/flags/it.svg" alt="Italian"
                                class="me-1 rounded-circle" height="18" />
                            <span class="align-middle">Italiano</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="es"
                            title="Spanish">
                            <img src="{{ asset('assets') }}/images/flags/es.svg" alt="Spanish"
                                class="me-1 rounded-circle" height="18" />
                            <span class="align-middle">Español</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="ru"
                            title="Russian">
                            <img src="{{ asset('assets') }}/images/flags/ru.svg" alt="Russian"
                                class="me-1 rounded-circle" height="18" />
                            <span class="align-middle">Русский</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="hi"
                            title="Hindi">
                            <img src="{{ asset('assets') }}/images/flags/in.svg" alt="Hindi"
                                class="me-1 rounded-circle" height="18" />
                            <span class="align-middle">हिन्दी</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="ar"
                            title="Arabic">
                            <img src="{{ asset('assets') }}/images/flags/sa.svg" alt="Arabic"
                                class="me-1 rounded-circle" height="18" />
                            <span class="align-middle">عربي</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Dropdown -->
            <div id="user-dropdown-detailed" class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                        href="#!" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets') }}/images/users/user-1.jpg" width="32"
                            class="rounded-circle me-lg-2 d-flex" alt="user-image" />
                        <div class="d-lg-flex align-items-center gap-1 d-none">
                            <span>
                                <h5 class="my-0 lh-1 pro-username">{{ Auth::user()->nama ?? 'gak ada' }}</h5>
                                <span class="fs-xs lh-1">{{ Auth::user()->role }}</span>
                            </span>
                            <i class="ti ti-chevron-down align-middle"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome back 👋!</h6>
                        </div>
                        <a href="#!" class="dropdown-item">
                            <i class="ti ti-user-circle me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Profile</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-bell-ringing me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Notifications</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-settings-2 me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Account Settings</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-headset me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Support Center</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="auth-lock-screen.html" class="dropdown-item">
                            <i class="ti ti-lock me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Lock Screen</span>
                        </a>
                        <a href="{{ route('logout') }}" class="dropdown-item fw-semibold">
                            <i class="ti ti-logout me-1 fs-lg align-middle"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- Topbar End -->

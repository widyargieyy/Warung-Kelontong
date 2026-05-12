<div class="offcanvas offcanvas-end overflow-hidden" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex justify-content-between text-bg-primary gap-2 p-3"
        style="background-image: url({{ asset('assets') }}/images/settings-bg.png)">
        <div>
            <h5 class="mb-1 fw-bold text-white text-uppercase">Admin Customizer</h5>
            <p class="text-white text-opacity-75 fst-italic fw-medium mb-0">Easily configure layout, styles, and
                preferences for your admin interface.</p>
        </div>
        <div class="flex-grow-0">
            <button type="button" class="d-block btn btn-sm bg-white bg-opacity-25 text-white rounded-circle btn-icon"
                data-bs-dismiss="offcanvas">
                <i class="ti ti-x fs-lg"></i>
            </button>
        </div>
    </div>

    <div class="offcanvas-body theme-customizer-bar p-0 h-100" data-simplebar="">

        {{-- Select Theme / Skin --}}
        <div id="skin" class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fw-bold">Select Theme</h5>
            <div class="row g-3">
                @foreach (['default', 'minimal', 'modern', 'material', 'saas', 'flat', 'galaxy', 'luxe', 'retro', 'neon', 'pixel', 'soft', 'mono', 'prism', 'nova', 'zen', 'elegant', 'vivid', 'aurora', 'crystal', 'matrix', 'orbit', 'neo', 'silver', 'xenon'] as $skin)
                    <div class="col-6" id="skin-{{ $skin }}">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-skin"
                                id="demo-skin-{{ $skin }}" value="{{ $skin }}" />
                            <label class="form-check-label p-0 w-100" for="demo-skin-{{ $skin }}">
                                <img src="{{ asset('assets') }}/images/layouts/skin-{{ $skin }}.png"
                                    alt="layout-img" class="img-fluid" />
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">{{ ucfirst($skin) }}</h5>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Color Scheme --}}
        <div id="theme" class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fw-bold">Color Scheme</h5>
            <div class="row">
                @foreach (['light', 'dark', 'system'] as $theme)
                    <div class="col-4" id="theme-{{ $theme }}">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme"
                                id="layout-color-{{ $theme }}" value="{{ $theme }}" />
                            <label class="form-check-label p-0 w-100" for="layout-color-{{ $theme }}">
                                <img src="{{ asset('assets') }}/images/layouts/theme-{{ $theme }}.png"
                                    alt="layout-img" class="img-fluid" />
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">{{ ucfirst($theme) }}</h5>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Topbar Color --}}
        <div id="topbar-color" class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fw-bold">Topbar Color</h5>
            <div class="row g-3">
                @foreach (['light', 'dark', 'gray', 'gradient'] as $color)
                    <div class="col-4" id="topbar-color-{{ $color }}">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color"
                                id="layout-topbar-color-{{ $color }}" value="{{ $color }}" />
                            <label class="form-check-label p-0 w-100" for="layout-topbar-color-{{ $color }}">
                                <img src="{{ asset('assets') }}/images/layouts/topbar-color-{{ $color }}.png"
                                    alt="layout-img" class="img-fluid" />
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">{{ ucfirst($color) }}</h5>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Sidenav Color --}}
        <div id="sidenav-color" class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fw-bold">Sidenav Color</h5>
            <div class="row g-3">
                @foreach (['light', 'dark', 'gray', 'gradient', 'image'] as $color)
                    <div class="col-4" id="sidenav-color-{{ $color }}">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color"
                                id="layout-sidenav-color-{{ $color }}" value="{{ $color }}" />
                            <label class="form-check-label p-0 w-100" for="layout-sidenav-color-{{ $color }}">
                                <img src="{{ asset('assets') }}/images/layouts/sidenav-color-{{ $color }}.png"
                                    alt="layout-img" class="img-fluid" />
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">{{ ucfirst($color) }}</h5>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Sidebar Size --}}
        <div id="sidenav-size" class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fw-bold">Sidebar Size</h5>
            <div class="row g-3">
                <div class="col-4" id="sidenav-size-default">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="layout-sidenav-size-default" value="default" />
                        <label class="form-check-label p-0 w-100" for="layout-sidenav-size-default">
                            <img src="{{ asset('assets') }}/images/layouts/sidenav-size-default.png" alt="layout-img"
                                class="img-fluid" />
                        </label>
                    </div>
                    <h5 class="mb-0 text-center text-muted mt-2">Default</h5>
                </div>
                <div class="col-4" id="sidenav-size-compact">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="layout-sidenav-size-compact" value="compact" />
                        <label class="form-check-label p-0 w-100" for="layout-sidenav-size-compact">
                            <img src="{{ asset('assets') }}/images/layouts/sidenav-size-compact.png" alt="layout-img"
                                class="img-fluid" />
                        </label>
                    </div>
                    <h5 class="mb-0 text-center text-muted mt-2">Compact</h5>
                </div>
                <div class="col-4" id="sidenav-size-condensed">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="layout-sidenav-size-condensed" value="condensed" />
                        <label class="form-check-label p-0 w-100" for="layout-sidenav-size-condensed">
                            <img src="{{ asset('assets') }}/images/layouts/sidenav-size-condensed.png"
                                alt="layout-img" class="img-fluid" />
                        </label>
                    </div>
                    <h5 class="mb-0 text-center text-muted mt-2">Condensed</h5>
                </div>
                <div class="col-4" id="sidenav-size-on-hover">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="layout-sidenav-size-small-hover" value="on-hover" />
                        <label class="form-check-label p-0 w-100" for="layout-sidenav-size-small-hover">
                            <img src="{{ asset('assets') }}/images/layouts/sidenav-size-on-hover.png"
                                alt="layout-img" class="img-fluid" />
                        </label>
                    </div>
                    <h5 class="mb-0 text-center text-muted mt-2">On Hover</h5>
                </div>
                <div class="col-4" id="sidenav-size-offcanvas">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                            id="layout-sidenav-size-offcanvas" value="offcanvas" />
                        <label class="form-check-label p-0 w-100" for="layout-sidenav-size-offcanvas">
                            <img src="{{ asset('assets') }}/images/layouts/sidenav-size-offcanvas.png"
                                alt="layout-img" class="img-fluid" />
                        </label>
                    </div>
                    <h5 class="mb-0 text-center text-muted mt-2">Offcanvas</h5>
                </div>
            </div>
        </div>

        {{-- Layout Width --}}
        <div id="width" class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fw-bold">Layout Width</h5>
            <div class="row g-3">
                @foreach (['fluid', 'boxed'] as $width)
                    <div class="col-4" id="width-{{ $width }}">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-layout-width"
                                id="layout-width-{{ $width }}" value="{{ $width }}" />
                            <label class="form-check-label p-0 w-100" for="layout-width-{{ $width }}">
                                <img src="{{ asset('assets') }}/images/layouts/width-{{ $width }}.png"
                                    alt="layout-img" class="img-fluid" />
                            </label>
                        </div>
                        <h5 class="mb-0 text-center text-muted mt-2">{{ ucfirst($width) }}</h5>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Layout Direction --}}
        <div id="dir" class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fw-bold">Layout Direction</h5>
            <div class="row g-3">
                @foreach (['ltr', 'rtl'] as $dir)
                    <div class="col-4" id="dir-{{ $dir }}">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="dir"
                                id="layout-dir-{{ $dir }}" value="{{ $dir }}" />
                            <label class="form-check-label p-0 w-100" for="layout-dir-{{ $dir }}">
                                <img src="{{ asset('assets') }}/images/layouts/dir-{{ $dir }}.png"
                                    alt="layout-img" class="img-fluid" />
                            </label>
                        </div>
                        <h5 class="mb-0 text-center text-muted mt-2">{{ strtoupper($dir) }}</h5>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Layout Position --}}
        <div id="position" class="p-3 border-bottom border-dashed">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Layout Position</h5>
                <div class="d-flex gap-1">
                    <div id="position-fixed">
                        <input type="radio" class="btn-check" name="data-layout-position"
                            id="layout-position-fixed" value="fixed" />
                        <label class="btn btn-sm btn-soft-warning w-sm" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div id="position-scrollable">
                        <input type="radio" class="btn-check" name="data-layout-position"
                            id="layout-position-scrollable" value="scrollable" />
                        <label class="btn btn-sm btn-soft-warning w-sm ms-0"
                            for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar User Info --}}
        <div id="sidenav-user" class="p-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <label class="fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label>
                </h5>
                <div class="form-check form-switch fs-lg">
                    <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check" />
                </div>
            </div>
        </div>

    </div>

    <div class="offcanvas-footer border-top p-3 text-center">
        <div class="row justify-content-end">
            <div class="col-6">
                <a href="#" class="btn btn-success fw-semibold py-2 w-100" target="_blank">
                    <i class="ti ti-basket me-2 fs-md"></i> Buy Now
                </a>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger fw-semibold py-2 w-100" id="reset-layout">
                    <i class="ti ti-refresh me-2 fs-md"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end offcanvas-->

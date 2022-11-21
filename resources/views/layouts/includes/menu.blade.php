<!--begin::Menu wrapper-->
<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
    <!--begin::Menu-->
    <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
        <a href="{{ route('home') }}" class="menu-item {{ Route::is('home') ? 'here' : '' }} me-0 me-lg-2">
            <span class="menu-link">
                <span class="menu-title">Tableau de Bord</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
        </a>
        <a href="{{ route('caution') }}" class="menu-item {{ Route::is('caution') ? 'here' : '' }} me-0 me-lg-2">
            <span class="menu-link">
                <span class="menu-title">Ma caution</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
        </a>
        <a href="{{ route('credit') }}" class="menu-item {{ Route::is('credit') ? 'here' : '' }} me-0 me-lg-2">
            <span class="menu-link">
                <span class="menu-title">Crédit</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
        </a>
    </div>
    <!--end::Menu-->
</div>
<!--end::Menu wrapper-->

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar w-100">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-column">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack my-10 my-lg-14">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex title-custom fw-bolder fs-2hx flex-column justify-content-center my-0">Bienvenue {{ $user->full_name }}
                    <!--begin::Description-->
                    <span class="page-desc text-white opasity-50 fs-7 fw-semibold pt-2"></span>
                    <!--end::Description--></h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center">

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Hero-->
        <div class="row align-items-center mb-14 mb-lg-18">
            <!--begin::Col-->
            <div class="col-md-4 mb-10 mb-md-0">
                <!--begin::Statistics-->
                <div class="d-flex align-items-center mb-13">
                    <!--begin::Avatar-->
                    <div class="symbol symbol- symbol-70px me-6">
                        <img src="{{ Gravatar::get($user->email) }}" class="" alt="" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Info-->
                    <div class="d-flex flex-column mb-1">
                        <a href="{{ route('account') }}" class="title-custom fs-2">{{ $user->full_name }}</a>
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Statistics-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-8 d-flex justify-content-md-end">
                <!--begin::Card-->
                <div class="card card-flush bg-white border-0 mw-575px w-lg-600px pt-3 pb-1">
                    <!--begin::Header-->
                    <div class="card-header d-flex align-items-center">
                        <!--begin::Title-->
                        <h2 class="title-custom fs-2">A Faire ensuite</h2>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3">
                        @if($user->created_at == $user->updated_at)
                            <div class="d-flex align-items-center mb-8">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-40px bg-primary me-3"></span>
                                <!--end::Bullet-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="{{ route('account') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Redéfinir le mot de passe</a>
                                </div>
                                <!--end::Description-->
                                <a href="{{ route('account') }}" class="btn btn-sm btn-primary">Mon Compte</a>
                            </div>
                        @endif
                        @if($user->sign_caution == 0 && $user->signed_at == null)
                                <div class="d-flex align-items-center mb-8">
                                    <!--begin::Bullet-->
                                    <span class="bullet bullet-vertical h-40px bg-primary me-3"></span>
                                    <!--end::Bullet-->
                                    <!--begin::Description-->
                                    <div class="flex-grow-1">
                                        <a href="{{ route('caution') }}" class="text-gray-800 text-hover-primary fw-bold fs-6">Signer l'acte de cautionnement</a>
                                    </div>
                                    <!--end::Description-->
                                    <a href="{{ route('caution') }}" class="btn btn-sm btn-primary">Ma caution</a>
                                </div>
                        @endif
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Hero-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->

@extends("layouts.app")

@section("content")
<div class="card shadow-sm">
    <div class="card-header">
        <div class="card-title">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#infos">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#security">Sécurité</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="infos" role="tabpanel">
                ...
            </div>
            <div class="tab-pane fade" id="security" role="tabpanel">
                <x-base.underline
                    title="Changement du mot de passe"
                    size-text="fs-1"
                    size="2"
                    color="primary" />

                <!--begin::Main wrapper-->
                <div class="fv-row" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Label-->
                        <label class="form-label fw-semibold fs-6 mb-2">
                            Nouveau mot de passe
                        </label>
                        <!--end::Label-->

                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid"
                                   type="password" placeholder="" name="password" autocomplete="off" />

                            <!--begin::Visibility toggle-->
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                  data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>

                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                            <!--end::Visibility toggle-->
                        </div>
                        <!--end::Input wrapper-->

                        <!--begin::Highlight meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Highlight meter-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Hint-->
                    <div class="text-muted">
                        Use 8 or more characters with a mix of letters, numbers & symbols.
                    </div>
                    <!--end::Hint-->
                </div>
                <!--end::Main wrapper-->
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")

@endsection

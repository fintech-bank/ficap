<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head><base href="../../../"/>
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular & Laravel by Keenthemes</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>body { background-image: url('/assets/media/auth/bg10.jpeg'); } [data-theme="dark"] body { background-image: url('/assets/media/auth/bg10-dark.jpeg'); }</style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <!--begin::Image-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="/assets/media/auth/agency.png" alt="" />
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="/assets/media/auth/agency-dark.png" alt="" />
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">{{ config("app.name") }}</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-600 fs-base text-center fw-semibold">
                    Suivez l'avancement des prêts dont vous êtes cautions simplement.
                </div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <!--begin::Wrapper-->
            <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                <!--begin::Content-->
                <div class="w-md-400px">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="" action="{{ route('login') }}" method="post">
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Connexion</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">
                                Seul les cautionnaires peuvent se connecter au service.<br>
                                Si vous êtes client de FINTECH Bank veuillez cliquer <a href="https://v2.fintech.ovh/login">ici</a>.
                            </div>
                            <!--end::Subtitle=-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Mot de passe" name="password" autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Password-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Connexion</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Veuillez patientez...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="/assets/js/custom/authentication/sign-in/general.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>

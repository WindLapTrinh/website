<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-width="fullwidth" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> ZYNIX - Bootstrap 5 Premium Admin & Dashboard Template </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Wcsrm Software Private Limited">
    <meta name="keywords"
        content="bootstrap template, admin panel bootstrap, bootstrap dashboard, admin, admin dashboard template, dashboard template, html css templates, dashboard, template dashboard,  bootstrap dashboard template, dashboard html css, bootstrap admin dashboard,  bootstrap admin, dashboard template, bootstrap5 admin template">

    <!-- Favicon -->
    <link rel="icon" href={{ asset('assets/images/brand-logos/favicon.ico') }} type="image/x-icon">

    <!-- Choices JS -->
    <script src={{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}></script>

    <!-- Main Theme Js -->
    <script src={{ asset('assets/js/main.js') }}></script>

    <!-- Bootstrap Css -->
    <link id="style" href={{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">

    <!-- Style Css -->
    <link href={{ asset('assets/css/styles.css') }} rel="stylesheet">

    <!-- Icons Css -->
    <link href={{ asset('assets/css/icons.css') }} rel="stylesheet">

    <!-- Node Waves Css -->
    <link href={{ asset('assets/libs/node-waves/waves.min.css') }} rel="stylesheet">

    <!-- Simplebar Css -->
    <link href={{ asset('assets/libs/simplebar/simplebar.min.css') }} rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href={{ asset('assets/libs/flatpickr/flatpickr.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}>

    <!-- Choices Css -->
    <link rel="stylesheet" href={{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}>

    <!-- FlatPickr CSS -->
    <link rel="stylesheet" href={{ asset('assets/libs/flatpickr/flatpickr.min.css') }}>

    <!-- Auto Complete CSS -->
    <link rel="stylesheet" href={{ asset('assets/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}>


</head>

<body>

    <!-- Start Switcher -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom d-block p-0">
            <div class="d-flex align-items-center justify-content-between p-3">
                <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <nav class="border-top border-block-start-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                        aria-selected="true">Theme Styles</button>
                    <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-profile" type="button" role="tab"
                        aria-controls="switcher-profile" aria-selected="false">Theme Colors</button>
                </div>
            </nav>
        </div>
        <div class="offcanvas-body">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                    aria-labelledby="switcher-home-tab" tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-light-theme" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-ltr"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction"
                                        id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-vertical" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-regular" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-classic">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-modern">
                                        Modern
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-modern">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-width">
                                        compact
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-default-width">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-full-width" checked>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Loader:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-enable">
                                        Enable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-enable">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-disable">
                                        Disable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-disable" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel"
                    aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Gradient Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio"
                                        name="header-colors" id="switcher-header-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio"
                                        name="header-colors" id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio"
                                        name="header-colors" id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Gradient Header"
                                        type="radio" name="header-colors" id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Header"
                                        type="radio" name="header-colors" id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio"
                                        name="theme-primary" id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio"
                                        name="theme-primary" id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio"
                                        name="theme-primary" id="switcher-primary4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary" onchange="updateChartColor(this.value)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio"
                                        name="theme-background" id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
                                <div
                                    class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-image mb-3">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="menu-background" id="switcher-bg-img">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="menu-background" id="switcher-bg-img1">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio"
                                        name="menu-background" id="switcher-bg-img2">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="menu-background" id="switcher-bg-img3">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="menu-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block canvas-footer flex-wrap">
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-danger m-1 w-100">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->


    <!-- Loader -->
    <div id="loader">
        <img src={{ asset('assets/images/media/loader.svg') }} alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        <header class="app-header sticky" id="header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src={{ asset('assets/images/brand-logos/desktop-logo.png') }} alt="logo"
                                    class="desktop-logo">
                                <img src={{ asset('assets/images/brand-logos/toggle-logo.png') }} alt="logo"
                                    class="toggle-logo">
                                <img src={{ asset('assets/images/brand-logos/desktop-dark.png') }} alt="logo"
                                    class="desktop-dark">
                                <img src={{ asset('assets/images/brand-logos/toggle-dark.png') }} alt="logo"
                                    class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link" data-bs-toggle="sidebar"
                            href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn" width="32"
                                height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon menu-btn-close"
                                width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z">
                                </path>
                            </svg>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->


                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <ul class="header-content-right">

                    <!-- Start::header-element -->
                    <li class="header-element d-md-none d-block">
                        <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                            data-bs-target="#header-responsive-search">
                            <!-- Start::header-link-icon -->
                            <i class="bi bi-search header-link-icon"></i>
                            <!-- End::header-link-icon -->
                        </a>
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element search-dropdown dropdown d-md-block d-none">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" width="32"
                                height="32" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M228.24,219.76l-51.38-51.38a86.15,86.15,0,1,0-8.48,8.48l51.38,51.38a6,6,0,0,0,8.48-8.48ZM38,112a74,74,0,1,1,74,74A74.09,74.09,0,0,1,38,112Z">
                                </path>
                            </svg>
                        </a>
                        <ul class="main-header-dropdown dropdown-menu dropdown-menu-end overflow-visible"
                            data-popper-placement="none">
                            <li class="px-3 py-2">
                                <div class="header-element header-search d-md-block d-none my-auto">
                                    <!-- Start::header-link -->
                                    <input type="text" class="header-search-bar form-control" id="header-search"
                                        placeholder="Search for Results..." spellcheck=false autocomplete="off"
                                        autocapitalize="off">
                                    <a href="javascript:void(0);" class="header-search-icon border-0">
                                        <i class="bi bi-search"></i>
                                    </a>
                                    <!-- End::header-link -->
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element country-selector dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <polyline points="240 216 184 104 128 216" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="144" y1="184" x2="224" y2="184" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                                <line x1="96" y1="32" x2="96" y2="56" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                                <line x1="32" y1="56" x2="160" y2="56" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="16" />
                                <path d="M128,56a96,96,0,0,1-96,96" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M69.47,88A96,96,0,0,0,160,152" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <li>
                                <div class="py-2 px-3">
                                    <input class="form-control form-control-sm" type="text"
                                        placeholder="Search Here" aria-label=".form-control-sm example">
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/us_flag.jpg') }} alt="img">
                                        </span>
                                        English
                                    </div>
                                    <span class="text-muted fs-12">(US)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/spain_flag.jpg') }} alt="img">
                                        </span>
                                        español
                                    </div>
                                    <span class="text-muted fs-12">(ES)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/french_flag.jpg') }}
                                                alt="img">
                                        </span>
                                        français
                                    </div>
                                    <span class="text-muted fs-12">(FR)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/uae_flag.jpg') }} alt="img">
                                        </span>
                                        عربي
                                    </div>
                                    <span class="text-muted fs-12">(AE)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/germany_flag.jpg') }}
                                                alt="img">
                                        </span>
                                        DE
                                    </div>
                                    <span class="text-muted fs-12">(US)</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0);">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-rounded avatar-xs lh-1 me-2">
                                            <img src={{ asset('assets/images/flags/china_flag.jpg') }} alt="img">
                                        </span>
                                        中国人
                                    </div>
                                    <span class="text-muted fs-12">(CN)</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element header-theme-mode">
                        <!-- Start::header-link|layout-setting -->
                        <a href="javascript:void(0);" class="header-link layout-setting">
                            <span class="light-layout">
                                <!-- Start::header-link-icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon"
                                    viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path d="M108.11,28.11A96.09,96.09,0,0,0,227.89,147.89,96,96,0,1,1,108.11,28.11Z"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                </svg>
                                <!-- End::header-link-icon -->
                            </span>
                            <span class="dark-layout">
                                <!-- Start::header-link-icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon"
                                    viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <line x1="128" y1="40" x2="128" y2="32"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <circle cx="128" cy="128" r="56" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16" />
                                    <line x1="64" y1="64" x2="56" y2="56"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="64" y1="192" x2="56" y2="200"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="192" y1="64" x2="200" y2="56"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="192" y1="192" x2="200" y2="200"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="40" y1="128" x2="32" y2="128"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="128" y1="216" x2="128" y2="224"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <line x1="216" y1="128" x2="224" y2="128"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                </svg>
                                <!-- End::header-link-icon -->
                            </span>
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element notifications-dropdown d-xl-block d-none dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon animate-bell"
                                viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <path d="M96,192a32,32,0,0,0,64,0" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M184,24a102.71,102.71,0,0,1,36.29,40" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M35.71,64A102.71,102.71,0,0,1,72,24" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path
                                    d="M56,112a72,72,0,0,1,144,0c0,35.82,8.3,56.6,14.9,68A8,8,0,0,1,208,192H48a8,8,0,0,1-6.88-12C47.71,168.6,56,147.81,56,112Z"
                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="16" />
                            </svg>
                            <span class="header-icon-pulse bg-secondary rounded pulse pulse-secondary"></span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end"
                            data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-16">Notifications</p>
                                    <a href="javascript:void(0);" class="badge bg-secondary-transparent"
                                        id="notifiation-data">15 Unread</a>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="pb-0 px-3">
                                <ul class="nav nav-tabs mb-0 tab-style-8 scaleX" role="tablist">
                                    <li class="nav-item" role="presentation"> <button class="nav-link active"
                                            id="activity-tab" data-bs-toggle="tab"
                                            data-bs-target="#activity-tab-pane" type="button" role="tab"
                                            aria-controls="activity-tab-pane" aria-selected="true">Activity</button>
                                    </li>
                                    <li class="nav-item" role="presentation"> <button class="nav-link"
                                            id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes-tab-pane"
                                            type="button" role="tab" aria-controls="notes-tab-pane"
                                            aria-selected="false" tabindex="-1">Notes</button>
                                    </li>
                                    <li class="nav-item" role="presentation"> <button class="nav-link"
                                            id="alert-tab" data-bs-toggle="tab" data-bs-target="#alert-tab-pane"
                                            type="button" role="tab" aria-controls="alert-tab-pane"
                                            aria-selected="false" tabindex="-1">Alerts</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="tab-content">
                                <div class="tab-pane show active p-0 border-0" id="activity-tab-pane" role="tabpanel"
                                    aria-labelledby="activity-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0" id="header-notification-scroll1">
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded svg-white">
                                                        <img src={{ asset('assets/images/faces/2.jpg') }}
                                                            alt="img">
                                                    </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold">Way to go Jack Miller ! &#127881;
                                                        </p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Congratulations on snagging the Monthly Best Seller Gold
                                                            Badge !</div>
                                                        <span class="text-muted fs-12">2 Min
                                                            Ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md bg-primary-transparent avatar-rounded svg-white">
                                                        SM </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold">You’ve Got Mail!</p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Natalie has sent you a new message. Click here to view it.
                                                        </div>
                                                        <span class="text-muted fs-12">5 Min
                                                            Ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded svg-white">
                                                        <img src={{ asset('assets/images/faces/6.jpg') }}
                                                            alt="img">
                                                    </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"> Application Approved By Team
                                                            &#128640;.</p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Congratulations! Your project application has been approved.
                                                        </div>
                                                        <span class="text-muted fs-12">Yesterday</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md bg-secondary-transparent avatar-rounded svg-white">
                                                        TR </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold">New Connection Request</p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Peter has sent you a connection request, please check your
                                                            connection requests.</div>
                                                        <span class="text-muted fs-12">2 Days Ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded svg-white">
                                                        <img src={{ asset('assets/images/faces/14.jpg') }}
                                                            alt="img">
                                                    </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold">Whoo! Your Order Is On the Way
                                                            &#128666;.</p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Great news! Your order is now on its way to you.</div>
                                                        <span class="text-muted fs-12">1 Hr Ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane p-0 border-0" id="notes-tab-pane" role="tabpanel"
                                    aria-labelledby="notes-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0" id="header-notification-scroll2">
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-primary">
                                                        <i class="ri-file-text-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a href="javascript:void(0);">This
                                                                Month Notes
                                                                Prepared</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Your notes for this month are ready and available. Please
                                                            review them at your convenience.</div>
                                                        <span class="fs-13 text-muted">2 min ago</span>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-secondary">
                                                        <i class="ri-box-3-line fs-16"></i></span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">Order <span
                                                                    class="text-success">#54321</span> has been
                                                                shipped.</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Order is on its way. You can track your shipment using the
                                                            tracking number provided.</div>
                                                        <span class="fs-13 text-muted">2 min ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-success">
                                                        <i class="ri-mail-open-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a href="javascript:void(0);">A
                                                                Email Will be
                                                                sent to customer.</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            An email regarding your recent order will be sent to the
                                                            customer shortly.</div>
                                                        <span class="fs-13 text-muted">10 Days ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-info">
                                                        <i class="ri-bank-card-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">Payment Form
                                                                Will be Activated.</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            The payment form will be activated shortly. Please ensure
                                                            that all necessary details are correctly filled out to
                                                            proceed with the payment process.</div>
                                                        <span class="fs-13 text-muted">Yesterday</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-warning">
                                                        <i class="ri-group-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">Meeting will be
                                                                held tomorrow</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            This is a reminder that a meeting will be held tomorrow.
                                                        </div>
                                                        <span class="fs-13 text-muted">2 days ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane p-0 border-0" id="alert-tab-pane" role="tabpanel"
                                    aria-labelledby="alert-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0" id="header-notification-scroll3">
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-primary-transparent">
                                                        <i class="ri-mail-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">Mail Login with
                                                                Different Device</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Your email account has been accessed from a new device. If
                                                            this was you, no action is needed. </div>
                                                        <span class="fs-13 text-muted">2 min ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-secondary-transparent">
                                                        <i class="ri-folder-warning-line fs-16"></i></span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">Your
                                                                Subscription was expaired.</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Your subscription has expired. Please renew your
                                                            subscription to continue enjoying uninterrupted access to
                                                            our services. </div>
                                                        <span class="fs-13 text-muted">15 min ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-success-transparent">
                                                        <i class="ri-database-2-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">Your storage
                                                                space is running low.</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Your storage space is running low. Please free up some space
                                                            or upgrade your storage plan to avoid any interruptions.
                                                        </div>
                                                        <span class="fs-13 text-muted">23 min ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-info-transparent">
                                                        <i class="ri-bank-card-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">Your changes
                                                                have been saved.</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Your changes have been saved. If you need to make any more
                                                            adjustments, feel free to do so. </div>
                                                        <span class="fs-13 text-muted">Yesterday</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-item">
                                            <div class="d-flex align-items-start">
                                                <div class="pe-2 lh-1"> <span
                                                        class="avatar avatar-md avatar-rounded bg-warning-transparent">
                                                        <i class="ri-stack-line fs-16"></i> </span>
                                                </div>
                                                <div
                                                    class="flex-grow-1 d-flex align-items-start justify-content-between">
                                                    <div>
                                                        <p class="mb-0 fw-semibold"><a
                                                                href="javascript:void(0);">New updates are
                                                                available soon.</a></p>
                                                        <div
                                                            class="fw-normal fs-13 header-notification-text text-truncate">
                                                            Exciting new updates are on the way! Stay tuned for
                                                            enhancements and new features that will be available soon.
                                                        </div>
                                                        <span class="fs-13 text-muted">2 days ago</span>
                                                    </div>
                                                    <div> <a href="javascript:void(0);"
                                                            class="min-w-fit-content text-muted dropdown-item-close1"><i
                                                                class="ri-close-line fs-5"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-3 empty-header-item1 border-top">
                                <div class="d-grid text-center">
                                    <a href="checkout.html" class="text-primary text-decoration-underline">View
                                        All<i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                            <div class="p-5 empty-item1 d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                        <i class="ri-notification-off-line fs-2"></i>
                                    </span>
                                    <h6 class="fw-medium mt-3">No New Notifications</h6>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element header-fullscreen">
                        <!-- Start::header-link -->
                        <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                            <svg xmlns="http://www.w3.org/2000/svg" class="full-screen-open header-link-icon"
                                viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <polyline points="168 48 208 48 208 88" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polyline points="88 208 48 208 48 168" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polyline points="208 168 208 208 168 208" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <polyline points="48 88 48 48 88 48" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="full-screen-close header-link-icon d-none" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <polyline points="160 48 208 48 208 96" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="144" y1="112" x2="208" y2="48"
                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="16" />
                                <polyline points="96 208 48 208 48 160" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="112" y1="144" x2="48" y2="208"
                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="16" />
                            </svg>
                        </a>
                        <!-- End::header-link -->
                    </li>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <li class="header-element dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-xl-2 me-0">
                                    <img src={{ asset('images/logo/wind-app.png') }} alt="img"
                                        class="avatar avatar-sm avatar-rounded">
                                </div>
                                <div class="d-xl-block d-none lh-1">
                                    <span class="fw-medium lh-1"> {{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li>
                                <div class="py-2 px-3 text-center">
                                    <span class="fw-semibold">{{ Auth::user()->name }}</span>
                                    <span class="d-block fs-12 text-muted">
                                        {{ Auth::user()->position->name ?? 'Chưa có chức vụ' }}</span>
                                </div>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="profile.html"><i
                                        class="ti ti-user text-primary me-2 fs-16"></i>Profile</a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="mail.html"> <i
                                        class="ti ti-mail text-secondary me-2 fs-16"></i>Inbox</a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="to-do-list.html"><i
                                        class="ti ti-checklist text-success me-2 fs-16"></i>Task
                                    Manager</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="mail-settings.html"><i
                                        class="ti ti-settings text-info me-2 fs-16"></i>Settings</a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="chat.html"><i
                                        class="ti ti-headset text-warning me-2 fs-16"></i>Support</a>
                            </li>
                            <li class="py-2 px-3">
                                <a class="btn btn-primary btn-sm w-100" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- End::header-element -->

                </ul>

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="index.html" class="header-logo">
                    <img src={{ asset('images/logo/logo-dark.png') }} alt="logo" class="desktop-logo">
                    <img src={{ asset('images/logo/logo-light.png') }} alt="logo" class="toggle-dark">
                    <img src={{ asset('images/logo/logo-light.png') }} alt="logo" class="desktop-dark">
                    <img src={{ asset('images/logo/logo-dark.png') }} alt="logo" class="toggle-logo">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Sidebar -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>
                    <ul class="main-menu">

                        <!-- CRM -->
                        <li class="slide__category"><span class="category-name">CRM</span></li>

                        <li class="slide has-sub">
                            <a href="" class="side-menu__item">
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <path
                                        d="M104,216V152h48v64h64V120a8,8,0,0,0-2.34-5.66l-80-80a8,8,0,0,0-11.32,0l-80,80A8,8,0,0,0,40,120v96Z"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                </svg>
                                <span class="side-menu__label">Dashboards</span>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="">Dashboards</a>
                                </li>
                                <li class="slide">
                                    <a href={{ asset('admin') }} class="side-menu__item">Doanh thu</a>
                                </li>
                                <li class="slide">
                                    <a href={{asset('admin/dashboard')}} class="side-menu__item">Số liệu</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <path
                                        d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Khách hàng</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0);">Khách hàng</a>
                                </li>
                                <li class="slide">
                                    <a href={{ url('admin/customer/list') }} class="side-menu__item">Danh sách</a>
                                </li>
                                <li class="slide">
                                    <a href="full-calendar.html" class="side-menu__item">Lịch sử mua hàng</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End CRM -->

                        <!-- Nội dung -->
                        <li class="slide__category"><span class="category-name">Nội dung</span></li>
                        <!-- End Nội dung -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <path
                                        d="M9 6H15C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6ZM7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6H20C20.5523 6 21 6.44772 21 7V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V7C3 6.44772 3.44772 6 4 6H7ZM5 8V20H19V8H5ZM9 10C9 11.6569 10.3431 13 12 13C13.6569 13 15 11.6569 15 10H17C17 12.7614 14.7614 15 12 15C9.23858 15 7 12.7614 7 10H9Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Bài viết</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Bài viết</a>
                                </li>
                                <li class="slide">
                                    <a href="full-calendar.html" class="side-menu__item">Danh sách</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Danh mục</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Quản lý Tags</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Vận hành</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <path
                                        d="M9 6H15C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6ZM7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6H20C20.5523 6 21 6.44772 21 7V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V7C3 6.44772 3.44772 6 4 6H7ZM5 8V20H19V8H5ZM9 10C9 11.6569 10.3431 13 12 13C13.6569 13 15 11.6569 15 10H17C17 12.7614 14.7614 15 12 15C9.23858 15 7 12.7614 7 10H9Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Sản phẩm</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Sản phẩm</a>
                                </li>
                                <li class="slide">
                                    <a href="full-calendar.html" class="side-menu__item">Danh sách</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Danh mục</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Biến thể</a>
                                </li>
                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- Kho hàng -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <polyline points="32 176 128 232 224 176" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polyline points="32 128 128 184 224 128" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polygon points="32 80 128 136 224 80 128 24 32 80" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16" />
                                    <path
                                        d="M21 13.2422V20H22V22H2V20H3V13.2422C1.79401 12.435 1 11.0602 1 9.5C1 8.67286 1.22443 7.87621 1.63322 7.19746L4.3453 2.5C4.52393 2.1906 4.85406 2 5.21132 2H18.7887C19.1459 2 19.4761 2.1906 19.6547 2.5L22.3575 7.18172C22.7756 7.87621 23 8.67286 23 9.5C23 11.0602 22.206 12.435 21 13.2422ZM19 13.9725C18.8358 13.9907 18.669 14 18.5 14C17.2409 14 16.0789 13.478 15.25 12.6132C14.4211 13.478 13.2591 14 12 14C10.7409 14 9.5789 13.478 8.75 12.6132C7.9211 13.478 6.75911 14 5.5 14C5.331 14 5.16417 13.9907 5 13.9725V20H19V13.9725ZM5.78865 4L3.35598 8.21321C3.12409 8.59843 3 9.0389 3 9.5C3 10.8807 4.11929 12 5.5 12C6.53096 12 7.44467 11.3703 7.82179 10.4295C8.1574 9.59223 9.3426 9.59223 9.67821 10.4295C10.0553 11.3703 10.969 12 12 12C13.031 12 13.9447 11.3703 14.3218 10.4295C14.6574 9.59223 15.8426 9.59223 16.1782 10.4295C16.5553 11.3703 17.469 12 18.5 12C19.8807 12 21 10.8807 21 9.5C21 9.0389 20.8759 8.59843 20.6347 8.19746L18.2113 4H5.78865Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Kho hàng</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Kho hàng</a>
                                </li>
                                <li class="slide">
                                    <a href="javascript:void(0);" class="side-menu__item">Sản phẩm</a>
                                </li>
                                <li class="slide">
                                    <a href="javascript:void(0);" class="side-menu__item">Lịch sử nhập xuất kho</a>
                                </li>

                            </ul>
                        </li>
                        <!-- End Kho hàng -->

                        <!-- Order product -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <polyline points="32 176 128 232 224 176" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polyline points="32 128 128 184 224 128" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <polygon points="32 80 128 136 224 80 128 24 32 80" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16" />
                                    <path
                                        d="M20 2C20.5523 2 21 2.44772 21 3V6.757L19 8.757V4H5V20H19V17.242L21 15.242V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20ZM21.7782 8.80761L23.1924 10.2218L15.4142 18L13.9979 17.9979L14 16.5858L21.7782 8.80761ZM13 12V14H8V12H13ZM16 8V10H8V8H16Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Đơn hàng</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Đơn hàng</a>
                                </li>
                                <li class="slide">
                                    <a href="javascript:void(0);" class="side-menu__item">Danh sách</a>
                                </li>
                                <li class="slide">
                                    <a href="javascript:void(0);" class="side-menu__item">Quản lý hoàn trả</a>
                                </li>

                                <li class="slide">
                                    <a href="javascript:void(0);" class="side-menu__item">Vận chuyển</a>
                                </li>

                            </ul>
                        </li>
                        <!-- End::slide -->

                        <!-- NoteMenu::Setting -->
                        <li class="slide__category"><span class="category-name">Hệ thống</span></li>
                        <!-- NoteMenu::Setting -->
                        <!-- Menu::Setting -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <path
                                        d="M12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5ZM4 5V19H20V7H11.5858L9.58579 5H4ZM8 18C8 15.7909 9.79086 14 12 14C14.2091 14 16 15.7909 16 18H8ZM12 13C10.6193 13 9.5 11.8807 9.5 10.5C9.5 9.11929 10.6193 8 12 8C13.3807 8 14.5 9.11929 14.5 10.5C14.5 11.8807 13.3807 13 12 13Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Nhân sự</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Nhân sự</a>
                                </li>
                                <li class="slide">
                                    <a href="full-calendar.html" class="side-menu__item">Danh sách</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Chức vụ</a>
                                </li>
                            </ul>
                        </li>

                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">

                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <path
                                        d="M3.33946 17.0002C2.90721 16.2515 2.58277 15.4702 2.36133 14.6741C3.3338 14.1779 3.99972 13.1668 3.99972 12.0002C3.99972 10.8345 3.3348 9.824 2.36353 9.32741C2.81025 7.71651 3.65857 6.21627 4.86474 4.99001C5.7807 5.58416 6.98935 5.65534 7.99972 5.072C9.01009 4.48866 9.55277 3.40635 9.4962 2.31604C11.1613 1.8846 12.8847 1.90004 14.5031 2.31862C14.4475 3.40806 14.9901 4.48912 15.9997 5.072C17.0101 5.65532 18.2187 5.58416 19.1346 4.99007C19.7133 5.57986 20.2277 6.25151 20.66 7.00021C21.0922 7.7489 21.4167 8.53025 21.6381 9.32628C20.6656 9.82247 19.9997 10.8336 19.9997 12.0002C19.9997 13.166 20.6646 14.1764 21.6359 14.673C21.1892 16.2839 20.3409 17.7841 19.1347 19.0104C18.2187 18.4163 17.0101 18.3451 15.9997 18.9284C14.9893 19.5117 14.4467 20.5941 14.5032 21.6844C12.8382 22.1158 11.1148 22.1004 9.49633 21.6818C9.55191 20.5923 9.00929 19.5113 7.99972 18.9284C6.98938 18.3451 5.78079 18.4162 4.86484 19.0103C4.28617 18.4205 3.77172 17.7489 3.33946 17.0002ZM8.99972 17.1964C10.0911 17.8265 10.8749 18.8227 11.2503 19.9659C11.7486 20.0133 12.2502 20.014 12.7486 19.9675C13.1238 18.8237 13.9078 17.8268 14.9997 17.1964C16.0916 16.5659 17.347 16.3855 18.5252 16.6324C18.8146 16.224 19.0648 15.7892 19.2729 15.334C18.4706 14.4373 17.9997 13.2604 17.9997 12.0002C17.9997 10.74 18.4706 9.5632 19.2729 8.6665C19.1688 8.4405 19.0538 8.21822 18.9279 8.00021C18.802 7.78219 18.667 7.57148 18.5233 7.36842C17.3457 7.61476 16.0911 7.43414 14.9997 6.80405C13.9083 6.17395 13.1246 5.17768 12.7491 4.03455C12.2509 3.98714 11.7492 3.98646 11.2509 4.03292C10.8756 5.17671 10.0916 6.17364 8.99972 6.80405C7.9078 7.43447 6.65245 7.61494 5.47428 7.36803C5.18485 7.77641 4.93463 8.21117 4.72656 8.66637C5.52881 9.56311 5.99972 10.74 5.99972 12.0002C5.99972 13.2604 5.52883 14.4372 4.72656 15.3339C4.83067 15.5599 4.94564 15.7822 5.07152 16.0002C5.19739 16.2182 5.3324 16.4289 5.47612 16.632C6.65377 16.3857 7.90838 16.5663 8.99972 17.1964ZM11.9997 15.0002C10.3429 15.0002 8.99972 13.6571 8.99972 12.0002C8.99972 10.3434 10.3429 9.00021 11.9997 9.00021C13.6566 9.00021 14.9997 10.3434 14.9997 12.0002C14.9997 13.6571 13.6566 15.0002 11.9997 15.0002ZM11.9997 13.0002C12.552 13.0002 12.9997 12.5525 12.9997 12.0002C12.9997 11.4479 12.552 11.0002 11.9997 11.0002C11.4474 11.0002 10.9997 11.4479 10.9997 12.0002C10.9997 12.5525 11.4474 13.0002 11.9997 13.0002Z">
                                    </path>
                                </svg>
                                <span class="side-menu__label">Cài đặt</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Cài đặt</a>
                                </li>
                                <li class="slide">
                                    <a href={{ route('permission.list') }} class="side-menu__item">Phân quyền</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Vai trò</a>
                                </li>

                            </ul>
                        </li>

                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                                    viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="48" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="48" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="48" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                    <rect x="144" y="144" width="64" height="64" rx="8"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="16" />
                                </svg>
                                <span class="side-menu__label">Quản trị hệ thống</span>
                                <i class="ri-arrow-right-s-line side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Quản trị hệ thống</a>
                                </li>
                                <li class="slide">
                                    <a href="gallery.html" class="side-menu__item">Danh sách trang</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Menu::Setting -->

                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg></div>
                </nav>
                <!-- End Sidebar -->

            </div>
            <!-- End::main-sidebar -->


        </aside>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        @yield('content')
        <!-- End::app-content -->


        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Manager Website <span id="year"></span> <a href="javascript:void(0);"
                        class="text-dark fw-medium"></a>.
                    Designed with by <a href="https://windlaptrinh.com/"
                        target="_blank">
                        <span class="fw-medium text-primary">Wind Lập Trình</span>
                    </a>
                </span>
            </div>
        </footer>
        <!-- Footer End -->
        <div class="modal fade" id="header-responsive-search" tabindex="-1"
            aria-labelledby="header-responsive-search" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0"
                                placeholder="Search Anything ..." aria-label="Search Anything ..."
                                aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button" id="button-addon2"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow lh-1"><i class="ti ti-arrow-big-up fs-16"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src={{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}></script>

    <!-- Bootstrap JS -->
    <script src={{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <!-- Defaultmenu JS -->
    <script src={{ asset('assets/js/defaultmenu.min.js') }}></script>

    <!-- Node Waves JS-->
    <script src={{ asset('assets/libs/node-waves/waves.min.js') }}></script>

    <!-- Sticky JS -->
    <script src={{ asset('assets/js/sticky.js') }}></script>

    <!-- Simplebar JS -->
    <script src={{ asset('assets/libs/simplebar/simplebar.min.js') }}></script>
    <script src={{ asset('assets/js/simplebar.js') }}></script>

    <!-- Auto Complete JS -->
    <script src={{ asset('assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js') }}></script>

    <!-- Color Picker JS -->
    <script src={{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}></script>

    <!-- Date & Time Picker JS -->
    <script src={{ asset('assets/libs/flatpickr/flatpickr.min.js') }}></script>


    <!-- Apex Charts JS -->
    <script src={{ asset('assets/libs/apexcharts/apexcharts.min.js') }}></script>

    <!-- Sales Dashboard -->
    <script src={{ asset('assets/js/sales-dashboard.js') }}></script>

    <!-- Custom JS -->
    <script src={{ asset('assets/js/custom.js') }}></script>


    <!-- Custom-Switcher JS -->
    <script src={{ asset('assets/js/custom-switcher.min.js') }}></script>

</body>

</html>

<div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
        <!--begin::Toolbar wrapper-->
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">{{ $pageTitle }}</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            @if($actionRoute && $actionName)
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ $actionRoute }}"
                       class="btn btn-flex btn-primary h-40px fs-7 fw-bold">{{ $actionName }}</a>
                </div>
            @endif
            <!--end::Actions-->
        </div>
        <!--end::Toolbar wrapper-->
    </div>
    <!--end::Toolbar container-->
</div>

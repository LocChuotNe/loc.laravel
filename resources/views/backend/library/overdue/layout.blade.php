<div class="align-items-center product-offcanvas">
    <div class="breadcrumb-title breadcrumb-title-custom border-end me-3 pe-3 d-none d-xl-block">
        <small class="text-capitalize text-capitalize-custom">{{ config('apps.overdue.titleRental')}}</small>
    </div>
    <ul class="d-flex ">
        <li class="">
            <a href="{{ route('dashboard.index')}}">Dashboard</a>
        </li>
        <li class="">/</li>
        <li class=""><strong>{{ config('apps.overdue.titleRental')}}</strong></li>
    </ul>
</div>
<div class="content-inner container-fluid content-inner-rental pb-0" id="page_layout">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ config('apps.rental.tableRental') }} </h5>
                </div>
                <div class="card-body px-0">
                    <div class="table-left-bordered table-responsive-custom">
                        @include('backend.library.overdue.component.filter')

                        @include('backend.library.overdue.component.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
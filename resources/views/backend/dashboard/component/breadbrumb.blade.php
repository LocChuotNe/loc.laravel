<div class="align-items-center product-offcanvas">
    <div class="breadcrumb-title breadcrumb-title-custom border-end me-3 pe-3 d-none d-xl-block">
        <small class="text-capitalize text-capitalize-custom">{{ $title }}</small>
    </div>
    <ul class="d-flex ">
        <li class="">
            <a href="{{ route('dashboard.index')}}">Dashboard</a>
        </li>
        <li class="">/</li>
        <li class=""><strong>{{ $title }}</strong></li>
    </ul>
</div>
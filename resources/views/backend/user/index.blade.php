@include('backend.dashboard.component.breadbrumb', ['title' => $config['seo']['index']['title']])
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ $config['seo']['index']['tableHeading'] }} </h5>
                </div>
                <div class="card-body px-0">
                    <div class="table-left-bordered table-responsive">
                        @include('backend.user.component.filter')

                        @include('backend.user.component.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
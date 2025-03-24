<div class="filter">
    <div class="d-flex justify-content-between align-items-center mb30 pl-24 pr-24">
        <div class="col-md-4">
            <div class="d-flex align-center dataTables_length" id="user-list-table_length">
                <label style="display: -webkit-inline-box">Chọn <select name="user-list-table_length" aria-controls="user-list-table" class="form-select form-select-sm">
                    @for($i = 10; $i<=100; $i+=10 )
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    </select> Bản ghi </label>
            </div>
        </div>
        <div class="col-md-4">
            <div id="user-list-table_filter" class="d-flex dataTables_filter">
                <div class="title-seacl">Search:</div>
                <label  style="display: contents"><input type="search" class="form-control  form-control-custom form-control-sm" placeholder="" aria-controls="user-list-table"></label>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{ route('rentals.export') }}" class="btn btn-success">Export to Excel</a>
        </div>
    </div>
</div>
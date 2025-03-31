@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])

<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ $config['seo']['index']['tableHeading'] }} </h5>
                </div>
                <div class="card-body px-0">
                    <div class="table-left-bordered table-responsive">
                        <div class="content-inner pb-0 container-fluid" id="page_layout">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <!-- Nội dung của col-lg-4 -->
                                </div>
                                <div class="col-sm-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="header-title">
                                                <h4 class="card-title">Horizontal Form</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form action="{{ route('user.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Email:<span class="text-danger">(*)</span>
                                                            </label>
                                                            <input type="text" class="form-control" value="{{ old('email', ($user->email) ?? '' ) }}" name="email" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Họ Và Tên:<span class="text-danger">(*)</span>
                                                            </label>
                                                            <input type="text" class="form-control" value="{{ old('name', ($user->name) ?? '') }}" name="name" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                @php
                                                    $userCatalogue = [
                                                        '0' => 'Chọn nhóm thành viên',
                                                        'admin' => 'Quản trị viên',
                                                        'staff' => 'Cộng tác viên',
                                                    ];
                                                    $userCatalogueSelected = old('user_catalogue_id', $user->role  ?? 0);
                                                @endphp

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Nhóm Thành Viên:<span class="text-danger">(*)</span>
                                                            </label>
                                                            <select name="user_catalogue_id" class="form-select setupSelect2" id="exampleFormControlSelect1">
                                                                @foreach($userCatalogue as $key => $item)
                                                                    <option value="{{ $key }}" {{  $key == $userCatalogueSelected ? 'selected' : '' }} >
                                                                        {{ $item }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Ngày Sinh:
                                                            </label>
                                                            <input type="date" class="form-control" value="{{ old('birthday', ($user->birthday) ? date('Y-m-d', strtotime($user->birthday)) : '' ) }}" name="birthday" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($config['method'] == 'create')
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Mật Khẩu:<span class="text-danger">(*)</span>
                                                                </label>
                                                                <input type="password" class="form-control" name="password" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">
                                                                    Nhập Lại Mật Khẩu:<span class="text-danger">(*)</span>
                                                                </label>
                                                                <input type="password" class="form-control" value="{{ old('re_password') }}" name="re_password" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="customFile1" class="form-label">Choose file</label>
                                                            <input class="form-control" value="{{ old('image'), ($user->image) ?? '' }}" type="file" id="customFile1" name="image">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('user.index') }}'">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

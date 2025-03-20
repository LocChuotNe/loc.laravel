@include('backend.dashboard.component.breadbrumb', ['title' => $config['seo']['create']['title']])
<div class="content-inner pb-0 container-fluid" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                
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
                                        <label class="control-label" for="">
                                            Email:<span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="">
                                            Họ Và Tên:<span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="">
                                            Nhóm Thành Viên:<span class="text-danger">(*)</span>
                                        </label>
                                        <select name="user_catalogue_id" class="form-select setupSelect2" id="exampleFormControlSelect1">
                                            <option value="0">[Chọn nhóm thành viên]</option>
                                            <option value="1">Quản trị viên</option>
                                            <option value="2">Cộng tác viên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="">
                                            Ngày Sinh:
                                        </label>
                                        <input type="date" class="form-control" name="birthday" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="">
                                            Mật Khẩu:<span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" class="form-control" name="password" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="">
                                            Nhập Lại Mật Khẩu:<span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{ old('re_password') }}" name="re_password" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="customFile1" class="form-label custom-file-input">Choose file</label>
                                        <input class="form-control" type="file" id="customFile1" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('user.index') }}'">cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
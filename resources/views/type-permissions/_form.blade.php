<div class="row">
    <div class="col-sm-12 col-xl-9">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Thông tin chung</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group row mb-2">
                                <label class="col-md-2 title-attribute" for="name">Tên loại quyền</label>
                                <div class="col-md-10">
                                    <input class="form-control" id="name" name="name" type="text"
                                           placeholder="Quyền bài viết...">
                                    @if ($errors->has('name'))
                                        <div class="mt-1 red">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-md-2 title-attribute" for="">Kích hoạt</label>
                                <div class="col-md-3">
                                    <div class="form-check checkbox checkbox-primary mb-0">
                                        <input class="form-check-input" name="status" id="checkbox-primary-1" type="checkbox">
                                        <label class="form-check-label" for="checkbox-primary-1"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xl-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Chức năng</h6>
                    </div>
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('type-permissions.index')}}" class="btn btn-secondary">Thoát</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tên quyền</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="Tên quyền" name="name"
                               value="{{old('name', $permission['name'])}}">
                        @if ($errors->has('name'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Mã quyền</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="key" name="key"
                               value="{{old('key', $permission['key'])}}" placeholder="Mã quyền (news-post)">
                        @if ($errors->has('key'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('key')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Loại quyền</label>
                    <div class="col-sm-9">
                        <select name="type_permission_id" id="" class="form-control text-white">
                            <option value="">--chọn--</option>
                            @foreach($typePermissions as $typePermission)
                                <option
                                    {{$permission['type_permission_id'] == $typePermission->id ? 'selected="selected"' : ''}} value="{{$typePermission->id}}">{{$typePermission->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('type_permission_id'))
                            <div class="mt-1 notification-error">
                                {{$errors->first('type_permission_id')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputConfirmPassword2" class="col-sm-3 pt-2 col-form-label">Trạng thái</label>
                    <div class="col-sm-9">
                        <div class="form-check" style="margin-top: 5px;">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                       {{$permission['status'] ? "checked" : ''}} value="{{$permission['status']}}"
                                       name="status">
                                <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2">Lưu</button>
                    <a href="{{route('permissions.index')}}" class="btn btn-dark">Quay lại</a>
                </div>

            </div>
        </div>
    </div>
</div>

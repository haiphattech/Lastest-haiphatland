<div class="email-wrap">
    <div class="row">
        <div class="col-xl-3 col-md-3 box-col-6">
            <div class="email-left-aside">
                <div class="card">
                    <div class="card-body">
                        <div class="email-app-sidebar">
                            <div class="media">
                                <div class="media-size-email">
                                    <img class="me-3 rounded-circle"
                                         src="{{$staff->avatar ? $staff->avatar : '/images/avatar-user.jpg'}}"
                                         alt=""
                                         width="60">
                                </div>
                                <div class="media-body middle">
                                    <h6 class="f-w-600">{{$staff->name}}</h6>
                                    <p><i>Tham gia: {{$staff->getCreatedAt()}}</i></p>
                                </div>
                            </div>
                            <ul class="nav main-menu" role="tablist">
                                <li>
                                    <hr>
                                </li>
                                <li class="mb-2">
                                    <div style="font-size: 14px">
                                                    <span class="title">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i> Email:</span>
                                        <span class="badge pull-right info-txt"
                                              style="color: #0000cc">{{$staff->email}}</span>
                                    </div>
                                </li>
                                @if($staff->phone)
                                    <li class="mb-2">
                                        <div style="font-size: 14px">
                                                    <span class="title">
                                                        <i class="fa fa-phone-square" aria-hidden="true"></i> Số điện thoại</span>
                                            <span class="badge pull-right info-txt"
                                                  style="color: #0000cc">{{$staff->phone}}</span>
                                        </div>
                                    </li>
                                @endif
                                <li class="mb-2">
                                    <div style="font-size: 14px">
                                                    <span class="title">
                                                        <i class="fa fa-check-square-o" aria-hidden="true"></i> Trạng thái:</span>
                                        <span class="form-check form-switch pull-right"
                                              style="display: inline-block" data-bs-toggle="tooltip"
                                              data-bs-placement="top"
                                              title="{{$staff['status'] ? 'Đang hoạt động' : 'Không hoạt động'}}">
                                                        <input name="my-checkbox" type="checkbox"
                                                               class="form-check-input"
                                                               data-id="{{$staff['id']}}"
                                                               data-api="{{route('enable-column')}}" data-table="staffs"
                                                               data-column="status"
                                                            {{ $staff['status'] ? 'checked="checked"' : '' }}>
                                                    </span>
                                    </div>
                                </li>
                                @if($staff->gender)
                                    <li class="mb-2">
                                        <div style="font-size: 14px">
                                                    <span class="title">
                                                        <i class="fa fa-venus-mars" aria-hidden="true"></i> Giới tính:</span>
                                            <span class="badge pull-right info-txt"
                                                  style="color: #0000cc">
                                                        {{$staff->getGender()}}
                                                        </span>
                                        </div>
                                    </li>
                                @endif
                                @if($staff->address)
                                    <li class="mb-2">
                                        <div style="font-size: 14px">
                                                    <span class="title">
                                                        <i class="fa fa-venus-mars"
                                                           aria-hidden="true"></i> Địa chỉ:</span>
                                            <span class="badge pull-right info-txt"
                                                  style="color: #0000cc">
                                                        {{$staff->address}}
                                                        </span>
                                        </div>
                                    </li>
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4">
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Thông tin chức vụ</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="form-group row mb-2">
                                            <label class="" for="">Chức vụ</label>
                                            <div class="">
                                                <input class="form-control" id="name" name="name"
                                                       type="text" value="{{$role ? $role->name : old('name')}}"
                                                       placeholder="Phụ trách sản phẩm, Kế toán,...">
                                                @if ($errors->has('name'))
                                                    <div class="mt-1 red">
                                                        {{$errors->first('name')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <p><i class="red">Hướng dẫn: tạo tên những chức vụ và cung cấp những quyền phù hợp cho nhân viên đó.</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-5 col-md-5">
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Danh sách quyền</h6>
                                </div>
                                <div class="card-body">
                                    @foreach($permissions as $permission)
                                        <div class="mb-3">
                                            <p class="font-weight-bold">{{$permission['type_name']}}</p>
                                            @if(count($permission['childPermissions']))
                                                <div style="margin-left: 10px">
                                                    @foreach($permission['childPermissions'] as $key_per => $per)
                                                        <div class="form-check checkbox checkbox-primary mb-0">
                                                            <input class="form-check-input" {{$per->active ? 'checked' : ''}} name="select_pre[]" id="checkbox-primary-{{$per['id']}}" type="checkbox" value="{{$per['id']}}">
                                                            <label class="form-check-label" for="checkbox-primary-{{$per['id']}}">{{$per['title']}}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="my-3 text-center">
                                            <button class="btn btn-success" type="submit"><i
                                                    class="fa fa-floppy-o" aria-hidden="true"></i> Lưu
                                            </button>
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

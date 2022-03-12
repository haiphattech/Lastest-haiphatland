<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tên quyền</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" placeholder="Tên quyền" name="name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <div class="mt-1 red">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Mã quyền</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="name" value="{{old('title')}}" placeholder="Mã quyền (news-post)">
                            @if ($errors->has('title'))
                                <div class="mt-1 red">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

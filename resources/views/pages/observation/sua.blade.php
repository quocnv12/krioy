@extends('master-layout')
@section('title')
    EDIT Observation
@endsection
@section('content')

    <div class="observation-sua">
        <div class="row" style="margin: 5px">
                    <form role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" class="idProduct">
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Frist_name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control first_name"  value="{{$childrent->first_name}}" name="first_name" placeholder="Nhập tên first_name "style="width: 500px;">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>last_name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control last_name"  value="{{$childrent->last_name}}" name="last_name"   placeholder="Nhập tên last_name"style="width: 500px;">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Birthday</label>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control birthday"  value="{{$childrent->birthday}}"  name="birthday" placeholder="Nhập birthday "type="date" name="birthday" placeholder="Birthday" style="width: 500px;">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Gender</label>
                                </div>
                                <div class="col-sm-9">

                                    <input class="form-control gender" name="gender"   value="{{$childrent->gender}}"  placeholder="Nhập gender "style="width: 500px;">

                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Observation</label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-control name" name="id_observations" style="width: 500px;height: 34px">
                                        <option value="">--Chọn Observation--</option>
                                        @foreach($vendors as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                </div>
        </div>
        <div class="button-sua" style="text-align: center;">
            <button type="submit" class="btn btn-success">Sửa</button>
            <button type="reset" class="btn btn-primary">Nhập Lại</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>

            </form>
    </div>
    </div>
    </div>
    </div>
@endsection

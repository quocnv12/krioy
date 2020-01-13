@extends('master-layout')
@section('title')
    EDIT Observation
@endsection
<style type="text/css">
    input,select{
        width: 100%;
    }
    label,p{
        font-weight: 600;
    }
    .ob-p{
        text-align: center;
    }
    .ob-p p{
        margin: 15px;
        font-size: 26px;
        padding: 10px 0;
        color: #ff4081;
    }
    form{
        width: 80%;
        margin:auto;
    }
    body{
        background-image: url('https://images.wallpaperscraft.com/image/children_grass_heart_part_67334_1280x720.jpg');
        background-size: cover;
        background-position: center 50%;
    }
</style>
@section('content')
    <div class="observation-sua">
        <div class="container">
            <div class="ob-p">
                <p>EDIT Observation</p>
            </div>
            <div class="hr"></div>
            <div style="margin: 10px 0">
                <form role="form" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="id" class="idProduct">
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Frist_name</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control first_name"  value="{{$childrent->first_name}}" name="first_name" placeholder="Nhập tên first_name ">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>last_name</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control last_name"  value="{{$childrent->last_name}}" name="last_name"   placeholder="Nhập tên last_name">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Birthday</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control birthday"  value="{{$childrent->birthday}}"  name="birthday" placeholder="Nhập birthday "type="date" name="birthday" placeholder="Birthday">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control gender" name="gender"   value="{{$childrent->gender}}"  placeholder="Nhập gender ">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Observation</label>
                             </div>
                            <div class="col-md-10">
                                <select class="form-control name" name="id_observations" style="height: 34px">
                                    <option value="">--Chọn Observation--</option>
                                    @foreach($vendors as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="button-sua" style="text-align: center; margin-bottom: 30px;">
            <button type="submit" class="btn btn-success">Sửa</button>
            <button type="reset" class="btn btn-primary">Nhập Lại</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
    </div>
@endsection

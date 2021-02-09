@extends('layouts.create')

@section('form')
    <h3>Create Skirts</h3>
    <br>
    <form role="form" action="{{ route('skirts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row1">
            <div class="col-50">

                <div class="row1">
                    <div class="col-50">
                        <br> <label for="gender">Gender</label>
                        <select name="gender" id="gender" style="width:100%; height: 48%;">
                            <option selected disabled>Select gender</option>
                            <option value="girl">Girl</option>
                            <option value="boy">Boy</option>
                            <option value="unisex">Unisex</option>
                        </select>

                    </div>
                    <div class="col-50">
                        <label for="color">Age</label>
                        <input type="text" id="age" name="age" placeholder="Please Enter Age" value="{{ old('age') }}">
                    </div>

                </div>

                <div class="row">
                    <div class="input-group realprocode control-group lst increment">
                        <input type="file" name="filenames[]" class="myfrm form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="button"> <i
                                    class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                    </div>
                    <div class="clone hide">
                        <div class="realprocode control-group lst input-group" style="margin-top:10px">
                            <input type="file" name="filenames[]" class="myfrm form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i
                                        class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                        </div>

                    </div>


                </div>
                <input type="submit" value="Post Skirt To Website" class="btn">
            </div>
        </div>
    </form>
@endsection

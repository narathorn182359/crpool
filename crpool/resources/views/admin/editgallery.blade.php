@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
          <a href="{{url('/home')}}">ย้อนกลับ</a>
            <div class="card">
                <div class="card-header">
                  แก้ไขแกลลอรี่ {{$gallery->name}}</div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div> 
                    @endif
                    @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <strong>Whoops!</strong> Some problems with your input.<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
               
              <form method="POST" action="{{url('productedit/'.$gallery->id)}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" id="type" value="{{$gallery->id}}">
                    <input type="hidden" name="name" id="name" value="{{$gallery->name}}">
                    <div class="row">
                     
                      <div class="form-group col-md-4">
                        <label for="">เลือกรูปภาพ </label>
                      <input type="file" name="profileImage"  required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                      <button type="submit" class="btn btn-success" style="margin-top:10px">เพิ่มรูป</button>
                      </div>
                    </div>
                    
              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

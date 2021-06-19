@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-9">
          <a href="{{url('/home')}}">ย้อนกลับ</a>
            <div class="card">
                <div class="card-header">
                  
                  เพิ่มแกลลอรี่ {{$name}}</div>

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
               
              <form method="post" action="{{url('multiple-image-upload')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" id="type" value="{{$id}}">
                    <input type="hidden" name="name" id="name" value="{{$name}}">
                    <div class="row">
                     
                      <div class="form-group col-md-4">
                        <label for="">เลือกรูปภาพเพิ่มได้มากกว่า 1 รูป </label>
                      <input type="file" name="profileImage[]"  multiple="">
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

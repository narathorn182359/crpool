@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
          <a href="{{url('/home')}}">ย้อนกลับ</a>
            <div class="card">
                <div class="card-header">เพิ่มสินค้า</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div> 
                    @endif
                 
               
              <form method="post" action="{{url('addproduct')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                      
                      <div class="form-group col-md-4">
                        <label for="">รูปปก:</label>
                      <input type="file" name="profileImageTitel"  multiple="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">รูปแสดงในหน้ารายละเอียด:</label>
                      <input type="file" name="profileImage[]"  multiple="">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="">ชื่อสินค้า:</label>
                      <input type="text" name="name" class="form-control" multiple="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">ประเภท:</label>
                            <select name="category" id="category" class="form-control">
                                <option value="B1">เคมีภัณท์</option>
                                <option value="B2">ปั้มต่าง</option>
                                <option value="B3">อุปกรณ์ต่าง</option>
                            </select>
                    </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                      <label for="">รายละเอียด:</label>
                      <textarea name="detail" id="detail" cols="30" rows="10"  class="form-control">

                      </textarea>
                    </div>
                  </div>
                    <div class="row">
                    
                      <div class="form-group col-md-4">
                      <button type="submit" class="btn btn-success" style="margin-top:10px">บันทึก</button>
                      </div>
                    </div>
                    
              </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

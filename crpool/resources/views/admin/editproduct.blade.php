@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <a href="{{ url('/home') }}">ย้อนกลับ</a>
                <div class="card">
                    <div class="card-header">เพิ่มสินค้า</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <form method="post" action="{{ url('productedits/'.$product->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="">รูปปก:</label>
                                    <input type="file" name="profileImageTitel" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">รูปแสดงในหน้ารายละเอียด > 1 รูป:</label>
                                    <input type="file" name="profileImage[]" multiple="" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">ชื่อสินค้า:</label>
                                    <input type="text" name="name" class="form-control" required
                                        value="{{ $product->name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">ประเภท:</label>
                                    <select name="category" id="category" class="form-control" required>
                                        @if ($product->category == 'B1')
                                            <option value="B1" selected >เคมีภัณท์</option>
                                            <option value="B2">ปั้มต่าง</option>
                                            <option value="B3">อุปกรณ์ต่าง</option>
                                        @elseif($product->category == 'B2')
                                        <option value="B1">เคมีภัณท์</option>
                                        <option value="B2" selected>ปั้มต่าง</option>
                                        <option value="B3">อุปกรณ์ต่าง</option>
                                            @elseif($product->category == 'B3')
                                            <option value="B1">เคมีภัณท์</option>
                                            <option value="B2">ปั้มต่าง</option>
                                            <option value="B3" selected>อุปกรณ์ต่าง</option>
                                        @endif
                                     


                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">รายละเอียด:</label>
                                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control" required>
                                        {{$product->detail}}
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

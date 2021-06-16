@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">จัดการแกลลอรี่</div>

                <div class="card-body">
                    <a href="{{url('/gallery/a1/งานก่อสร้างสระว่ายน้ำ')}}" class="btn btn-primary">งานก่อสร้างสระว่ายน้ำ</a>
                    <a href="{{url('/gallery/a2/งานซ่อม,บริการ')}}" class="btn btn-primary">งานซ่อม,บริการ</a>
                    <a href="{{url('/gallery/a3/งานปรับปรุงสระเก่า')}}" class="btn btn-primary">งานปรับปรุงสระเก่า</a>
                    <a href="{{url('/gallery/a4/งานระบบน้ำพุ')}}" class="btn btn-primary">งานระบบน้ำพุ</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">จัดการสินค้า</div>

                <div class="card-body">
                    <a href="{{url('/addproduct')}}" class="btn btn-primary">เพิ่มสินค้า</a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

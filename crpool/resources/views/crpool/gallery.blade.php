@extends('layouts.cr')
@section('content')

<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
       
        <h3>แกลลอรี่</h3>
        
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">ทั้งหมด</li>
            <li data-filter=".a1">งานก่อสร้างสระว่ายน้ำ</li>
            <li data-filter=".a2">งานซ่อม,บริการ</li>
            <li data-filter=".a3">งานปรับปรุงสระเก่า</li>
            <li data-filter=".a4">งานระบบน้ำพุ</li>
        </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ($gallery as $item)
        <div class="col-lg-4 col-md-6 portfolio-item {{$item->type}}">
            <img src="{{url('gallery/'.$item->img)}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$item->name}}</h4>
             
              <a href="{{url('gallery/'.$item->img)}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
             
            </div>
          </div>
        @endforeach
     

     
    

     

      </div>

    </div>
  </section><!-- End Portfolio Section -->





@endsection
@extends('layouts.cr')
@section('content')

<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
       
        <h3>สินค้าของเรา</h3>
        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">ทั้งหมด</li>
            <li data-filter=".B1">เคมีภัณท์</li>
            <li data-filter=".B2">ปั้มต่าง</li>
            <li data-filter=".B3">อุปกรณ์ต่าง</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @foreach ($product as $item)
          <div class="col-lg-4 col-md-6 portfolio-item {{$item->category}}">
            <img src="{{url('product/'.$item->img)}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$item->name}}</h4>
              <a href="{{url('product/'.$item->img)}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="{{url('productview/'.$item->id)}}" class="details-link" title="More Details"><i class="fas fa-eye"></i></a>
            </div>
          </div>
          @endforeach
       

     

      </div>

    </div>
  </section><!-- End Portfolio Section -->





@endsection
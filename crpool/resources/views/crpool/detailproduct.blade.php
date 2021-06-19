@extends('layouts.cr')
@inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
@section('content')
<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>{{$product->name}}</h2>
      
      </div>

    </div>
  </section><!-- Breadcrumbs Section -->

  <!-- ======= Portfolio Details Section ======= -->
  <section class="portfolio-details">
    <div class="container">

      <div class="portfolio-details-container">

        <div class="owl-carousel portfolio-details-carousel">
            @foreach ($img as $item)
            <img src="{{url('products/'.$item->img)}}" class="img-fluid" alt="" width="50%">
            @endforeach
        
  
        </div>

        <div class="portfolio-info">
          <h3>{{$product->name}}</h3>
          <ul>

            <li><strong>วันที่</strong>: {{ $thaiDateHelper->simpleDateFormat($item->created_at) }}</li>
           
          </ul>
        </div>

      </div>

      <div class="portfolio-description">
        <h2>รายละเอียด</h2>
        <p>
            {{$product->detail}}
        </p>
      </div>
    </div>
  </section><!-- End Portfolio Details Section -->

@endsection
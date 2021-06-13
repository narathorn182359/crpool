@extends('layouts.cr')
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
          
            <h3><span>ติดต่อเรา</span></h3>
            <p></p>
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
                <i class="bx bx-map"></i>
                <h3>ที่อยู่</h3>
                <p>275 หมู่ 5 ตำบลบ้านส้อง อำเภอเวียงสระ จังหวัดสุราษร์ธานี 84190</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-envelope"></i>
                <h3>อีเมล์</h3>
                <p>crpool2015@gmail.com </p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-phone-call"></i>
                <h3>โทร</h3>
                <p>+66 077-366736
                </p>
              </div>
            </div>
  
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
  
            <div class="col-lg-6 ">
                <iframe  class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.249909036291!2d99.36836111450121!3d8.667766996929181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305170f5d07a7feb%3A0x54b3951ec7c600b8!2zNDAwOSDguJXguLPguJrguKUg4Lia4LmJ4Liy4LiZ4Liq4LmJ4Lit4LiHIOC4reC4s-C5gOC4oOC4reC5gOC4p-C4teC4ouC4h-C4quC4o-C4sCDguKrguLjguKPguLLguKnguI7guKPguYzguJjguLLguJnguLU!5e0!3m2!1sth!2sth!4v1622882930971!5m2!1sth!2sth"  allowfullscreen="" loading="lazy" style="border:0; width: 100%; height: 384px;"></iframe>
              
            </div>
  
            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="col form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->

@endsection
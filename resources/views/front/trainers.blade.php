@extends('layout.front.app')

@section('content')

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>IN the trainer section featur we can explor the teachers and staf you can connected by using socialmedia with teacher all the intraction link are connected with every teacher profile and show all the teachers experties and what will do with us .  </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($trainers as $trainer)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <!-- <img src="{{ asset('uploads/trainer/'.$trainer->image) }}" class="img-fluid" alt=""> -->
              <img src="{{ asset('uploads/trainer/'.$trainer->image) }}" class="img-fluid" alt="...">
              <div class="member-content">
              
                <h4>{{ $trainer->name }}</h4>
               
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

  





@endsection

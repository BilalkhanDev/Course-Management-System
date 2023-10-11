@extends('layout.front.app')

@section('content')
    
        <main id="main" data-aos="fade-in">

            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs">
                <div class="container">
                    <h2>Courses</h2>
                    <p> IN this courses section, we can find and explore over needed courses and learn with video lectures. It enhances your mentality level about what your mind says, don't waste your time and start the learning program with E-LEARNER. </p>
                </div>
            </div><!-- End Breadcrumbs -->

            <!-- ======= Courses Section ======= -->
            <section id="courses" class="courses">
                <div class="container" data-aos="fade-up">

                    <div class="row" data-aos="zoom-in" data-aos-delay="100">

                        @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                <img src="{{ asset('uploads/courses/'.$course->image) }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $course->category->name }}</h4>
                                        <p class="price">FREE</p>
                                    </div>

                                    <h3><a href="{{ route('course-details',$course->id) }}">{{ $course->name }}</a></h3>
                                    <p>{!! $course->description !!}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            @if ($course->trainer)
                                                <img src="{{ asset('uploads/trainer/'.$course->trainer->image) }}" class="img-fluid" alt="">
                                                <span>{{ $course->trainer->name }}</span>
                                            @else
                                                <span>No Trainer Available</span>
                                            @endif
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bx bx-user"></i>&nbsp;{{ rand(1,100) }}
                                            &nbsp;&nbsp;
                                            <i class="bx bx-heart"></i>&nbsp;{{ rand(1,100) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </section><!-- End Courses Section -->

        </main><!-- End #main -->
@endsection

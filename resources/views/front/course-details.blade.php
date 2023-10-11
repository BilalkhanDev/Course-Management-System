@extends('layout.front.app')
@push('styles')
<style>
  .breadcrumbs{
    padding: 100px 0px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.433);
    background-blend-mode: overlay;
  }
  .lecture-div{
    border: 1px solid gray;
    border-left: none;
    border-right: none;
    cursor: pointer;
  }
</style>
@endpush
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in" style="background-image: url({{ asset('uploads/courses/'.$course->image) }})">
            <div class="container ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="btn btn-outline-success">
                            <b>Beginner</b>
                        </div>
                        <h2> {{ $course->name }} </h2>
                        @if ($course->meeting_link)
                            <p>Live Meeting will start at <strong class="text-success">{{ $course->meeting_date }} {{ $course->meeting_time }}</strong> click the link <strong><a href="{{ $course->meeting_link }}" class="text-success">{{ $course->meeting_link }}</a></strong> to join the meeting at given time</p>
                        @endif
                    </div>
                    <div class="col-md-4 mt-auto">
                        <div class="social-btn">
                            {{-- <a href="" class="btn btn-outline-dark p-2 mx-2"> Like</a>
                            <a href="" class="btn btn-outline-dark p-2 mx-2"><img
                                    src="assets/img/icons8-facebook-like-24.png" alt=""> Like</a>
                            <a href="" class="btn btn-outline-dark p-2 mx-2"><i class="fa fa-share text-primary"
                                    aria-hidden="true"></i> Share</a>
                            <a href="" class="btn btn-outline-dark p-2 mx-2">  <img src="{{ asset('uploads/courses/'.$course->image) }}" class="img-fluid" alt="...">Embed</a> --}}
                            {{-- <p>3233 enrolled</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="my-5">About Course</h1>
                        <p class="mb-5">
                            {!! $course->description !!}
                        </p>

                        <video width="100%" id="video-tag" style="border: 1px solid black;border-radius:10px;box-shadow:0px 0px 10px rgba(0, 0, 0, 0.329);margin-top:50px;" height="310" controls>
                          <source src="{{ asset('uploads/courses/ttvideo_1663735794.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-lg-4">

                        <div class="duration text-center my-4">
                            <div class="d-flex justify-content-center">
                                <div class="time d-flex mx-1">
                                    <i class="mx-1 fa fa-2x fa-youtube-square" aria-hidden="true"></i>
                                    <small>{{ $course->lectures_count }} Lecture In this Course</small>
                                </div>
                            </div>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Trainer</h5>
                            <p><a href="#">{{ $course->trainer->name }}</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Course Fee</h5>
                            <p>Free</p>
                        </div>

                        <h4 class="text-center">Lecture List</h4>
                        <div style="height: 500px;">
                        
                          @foreach ($course->lectures as $item)
                              <div class="py-4 lecture-div" data-link="{{ $item->video }}">
                                {{ $loop->iteration }}). <i class="fa fa-play text-primary mx-2"></i> {{ $item->title }}
                              </div>
                          @endforeach
                          
                        </div>
                        
                    </div>
                </div>
                <div class="row  my-5">
                    <div class="col-12">
                        <div class="heading  d-flex justify-content-between">
                            <h1><b>Related Courses</b></h1>
                        </div>
                    </div>
                </div>
                <div class="explore-courses">
                    <div class="row px-3 course-dtl justify-content-around">

                        @foreach ($relatedCourses as $course)
                            <div class="col-lg-4 ovr col-md-6">
                                <div class="inner-padding">
                                    <a href="course-details/${course.id}">
                                        <div class="overlay">
                                            <b>{{ $course->name }}</b>
                                            <p>{!! $course->description !!}</p>
                                            <div class="dtl">
                                                <p><b>VIEW DETAILS</b></p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card">
                                        <div class="tag"><span>Beginner</span></div>
                                        <p class="my-3"><b>{{ $course->name }}</b></p>
                                        <div class="img d-flex">
                                            <img src="{{ asset('uploads/trainer/' . $course->trainer->image) }}"
                                                width="17%" class="rounded-circle" alt="">
                                            <p class="mx-2"> {{ $course->trainer->name }} </p>
                                        </div>
                                        <div class="duration">
                                            <div class="d-flex my-2">
                                                <div class="time d-flex mx-1">
                                                    <i class="mx-1 fa fa-2x fa-play-circle" aria-hidden="true"></i>
                                                    <small class='py-2'>{{ $course->lectures }} Lecture In this
                                                        List</small>
                                                </div>
                                            </div>
                                            <small>46 recommended | 3224 enrolled</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </section><!-- End Cource Details Section -->

    </main><!-- End #main -->
    @push('scripts')
        <script>
          $('.lecture-div').on("click",function(){
            let src = $(this).data('link');
            console.log("{{ asset('uploads/courses/') }}"+"/"+src);
            $("#video-tag source").attr('src',"{{ asset('uploads/courses/') }}"+"/"+src)
            $("#video-tag")[0].load();
            // console.log($("#video-tag source").attr('src'));
          })
        </script>
    @endpush
@endsection

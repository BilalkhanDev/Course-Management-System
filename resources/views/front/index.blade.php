@extends('layout.front.app')
<style>
    .activeness:hover {
        color: black;
    }

    .icon-box:hover {
        background-color: #5FCF80 !important;
        transition: 0.5s;
    }

    .icon-box:hover * {
        color: white;
    }
</style>
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Learning Today,<br>Leading Tomorrow</h1>
            <h2>It has the power to transform lives
                            for ourselves,or our communities.</h2>
            <a href="/" class="btn-get-started">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('front/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>'Capacity to learn is gifted. Ability to learn is a skill. Willingness to learn is a choice'</h3><br>
                        <p class="fst-italic">
                        Learning does not occur accidently; learners, in order to achieve their goal, 
                        should take factors of learning into account: intellectuality,skillness,
                         and real intention. 
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> “The beautiful thing about learning is that
                             nobody can take it away from you.”

                            </li>
                            <li><i class="bi bi-check-circle"></i> “Spoon feeding in the long run teaches us nothing but the shape of the spoon.”
</li>
                            <li><i class="bi bi-check-circle"></i>  "The key to pursuing excellence is to embrace an organic,
                             long-term learning process, and not to live in a shell of static, safe mediocrity. Usually,
                              growth comes at the expense of previous comfort or safety."
</li>
                        </ul>
                        <p>
                        “The more that you read, the more things you will know.
                         The more that you learn, the more places you'll go.”

                        </p>

                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Students</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Courses</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Events</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Trainers</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Explore section ====== -->
        <section class="explore-courses">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h1>Explore Courses</h1>
                        <p>Premium self paced courses to master the skills</p>
                    </div>
                    <div class="col-md-3">
                        <div class="mbl-image">
                            <img src="{{ asset('front/assets/img/mobile-castle.png') }}" width="100%" alt="">
                        </div>
                    </div>
                    <div class="row categories-sec m-3">
                        <div class="col-md-4">
                            <div class="categories">
                                <p class="heading">Categories</p>
                                @foreach ($categories as $item)
                                    @if ($loop->first)
                                        <p><a href="javascript:void(0)" class="course-link activeness"
                                                data-id="{{ $item->id }}">{{ $item->name }}</a></p>
                                    @else
                                        <p><a href="javascript:void(0)" class="course-link"
                                                data-id="{{ $item->id }}">{{ $item->name }}</a></p>
                                    @endif
                                @endforeach
                                {{-- <p><a href="#" class="course-link">Web Development</a></p>
                                <p><a href="#" class="course-link">Programming Languages</a></p>
                                <p><a href="#" class="course-link">Data Structure and Algorithms</a></p>
                                <p><a href="#" class="course-link">Data Base</a></p>
                                <p><a href="#" class="course-link">Operating System</a></p>
                                <p><a href="#" class="course-link">Mobile Application Development</a></p>
                                <p><a href="#" class="course-link">Cloud Computing</a></p>
                                <p><a href="#" class="course-link">DevOps</a></p>
                                <p><a href="#" class="course-link">Big Data</a></p>
                                <p><a href="#" class="course-link">Cyber Security</a></p>
                                <p><a href="#" class="course-link">Testing and Automation</a></p>
                                <p><a href="#" class="course-link">Others</a></p> --}}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row course-dtl">
                                @if($categories->count()>0)
                                @foreach ($categories[0]->courses ?? [] as $course)
                                    <div class="col-lg-4 ovr col-md-6">
                                        <div class="inner-padding">
                                            <a href="course-details/{{ $course->id }}">
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
                                                    @if($course->trainer)
                                                <img src="{{ asset('uploads/trainer/' .$course->trainer->image) }}"
                                                        width="17%" class="rounded-circle" alt="">
                                                <!-- <img src="{{ asset('front/assets/img/mobile-castle.png') }}"
                                                        width="17%" class="rounded-circle" alt=""> -->
                                                    <p class="mx-2"> BILAL </p>
                                                    @endif
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Explore section end ====== -->


        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">
                <div class="row icon-boxes" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-3 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-receipt"></i>
                            <h3>Why Choose Online Education?</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-3 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-receipt"></i>
                            <h4>Corporis voluptates sit</h4>
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                aliquip</p>
                        </div>
                    </div>
                    <div class="col-xl-3 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-cube-alt"></i>
                            <h4>Ullamco laboris ladore pan</h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt</p>
                        </div>
                    </div>
                    <div class="col-xl-3 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                            <i class="bx bx-images"></i>
                            <h4>Labore consequatur</h4>
                            <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis
                                facere</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Features Section ======= -->
        {{-- <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box">
                            <i class="ri-store-line" style="color: #ffbb2c;"></i>
                            <h3><a href="">Lorem Ipsum</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3><a href="">Dolor Sitema</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                            <h3><a href="">Sed perspiciatis</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                            <h3><a href="">Magni Dolores</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-database-2-line" style="color: #47aeff;"></i>
                            <h3><a href="">Nemo Enim</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                            <h3><a href="">Eiusmod Tempor</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="">Midela Teren</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                            <h3><a href="">Pira Neve</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-anchor-line" style="color: #b2904f;"></i>
                            <h3><a href="">Dirada Pack</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-disc-line" style="color: #b20969;"></i>
                            <h3><a href="">Moton Ideal</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-base-station-line" style="color: #ff5828;"></i>
                            <h3><a href="">Verdo Park</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box">
                            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                            <h3><a href="">Flavor Nivelanda</a></h3>
                        </div>
                    </div>
                </div>


            </div>
        </section><!-- End Features Section --> --}}

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($trainers as $trainer)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <img src="{{ asset('uploads/trainer/' . $trainer->image) }}" class="img-fluid"
                                    alt="">
                                <div class="member-content">
                                    <h4>{{ $trainer->name }}</h4>
                                    <span>{{ $trainer->course->name }}</span>
                                    <p>
                                        Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis
                                        quaerat qui aut aut aut
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



    <!-- ======= Kickstart section  ====== -->

    <div class="row kickstart m-0 text-white">
        <div class="col-md-7">
            <h1><b>Quickstart your learning journey with NTA today!</b></h1>
        </div>
        <div class="col-md-4 text-center">
            <a href="" class="btn btn-primary rounded-pills px-4">JOIN NOW</a>
        </div>
    </div>

    <!-- ======= Kickstart section end ====== -->

    @push('scripts')
        <script>
            $(".course-link").on("click", function() {

                $(".course-link").removeClass('activeness');
                $(this).addClass('activeness');

                let id = $(this).data('id');
                $(".course-dtl").html("");
                $.ajax({
                    type: 'get',
                    url: "{{ route('category-courses') }}",
                    data: {
                        id
                    },
                    success: function(res) {

                        $(".course-dtl").html("");
                        res.forEach(course => {
                            $(".course-dtl").html(`
                            <div class="col-lg-4 ovr col-md-6">
                                    <div class="inner-padding">
                                        <a href="course-details/${course.id}">
                                            <div class="overlay">
                                                <b>${course.name}</b>
                                                <p>${course.description}</p>
                                                <div class="dtl">
                                                    <p><b>VIEW DETAILS</b></p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="card">
                                            <div class="tag"><span>Beginner</span></div>
                                            <p class="my-3"><b>${course.name}</b></p>
                                            <div class="img d-flex">
                                                <img src="{{ asset('uploads/trainer/${course.trainer.image}') }}" width="17%"
                                                    class="rounded-circle" alt="">
                                                    <p class="mx-2"> ${course.trainer.name} </p>
                                            </div>
                                            <div class="duration">
                                                <div class="d-flex my-2">
                                                    <div class="time d-flex mx-1">
                                                        <i class="mx-1 fa fa-2x fa-play-circle"
                                                            aria-hidden="true"></i>
                                                        <small class='py-2'>${course.lectures} Lecture In this List</small>
                                                    </div>
                                                </div>
                                                <small>46 recommended | 3224 enrolled</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `)
                        });
                        // <p class="mx-2"> ${course.trainer.name??"N/A"}</p>

                    }
                })

            })
        </script>
    @endpush
@endsection

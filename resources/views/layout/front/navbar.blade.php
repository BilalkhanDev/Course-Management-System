@php
    $announcements = DB::table('announcements')->where('is_active',1)->get() 
@endphp
<header id="header" class="fixed-top {{ $announcements->count()>0?"pt-0":"" }}">
  
      @if ($announcements->count()>0) 
      <div class="container-fluid mb-2">
              <div class="row">
                <div class="col-md-12 bg-warning">
                  <marquee behavior="" direction="">
                    @foreach ($announcements as $item)
                        <span class="mx-5"> {{ $loop->iteration }}) {{ $item->content }}</span>
                    @endforeach
                  </marquee>
                </div>
              </div>
          </div>
      @endif
      <div class="container d-flex align-items-center">
      
      <h1 class="logo me-auto"><a href="index.html">E-learner</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        @if (auth()->check())
          <ul>
            <li><a class="active" href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about-us') }}">About</a></li>
            <li><a href="{{ route('courses') }}">Courses</a></li>
            <li><a href="{{ route('trainers') }}">Trainers</a></li>
            <li><a href="{{ route('logout') }}" class="btn btn-danger text-white">Logout</a></li>
          </ul>
        @endif
        @if (!auth()->check())
        <ul>
          <li><a href="{{ route('login-form') }}" class="btn btn-primary text-white">Login</a></li>
        </ul>
        @endif
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    
    </div>

    </div>
  </header>
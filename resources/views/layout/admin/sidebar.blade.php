<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
            class="logo-name">Otika</span>
        </a>
      </div>
      @if (auth()->user()->role=='admin')
          
      <ul class="sidebar-menu">
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="fas fa-keyboard"></i> <span>Category</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('category.add') }}">Add Category</a></li>
              <li><a class="nav-link" href="{{ route('category') }}">All Categories</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="fas fa-book"></i> <span>Course</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('course.add') }}">Add Course</a></li>
              <li><a class="nav-link" href="{{ route('course') }}">All Courses</a></li>
            </ul>
        </li>

        {{-- <li class="dropdown">uu --}}
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown">
            <i class="far fa-file-video"></i> <span>Lecture</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('lecture.add') }}">Add Lecture</a></li>
            <li><a class="nav-link" href="{{ route('lecture') }}">All Lectures</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown">
            <i class="fas fa-chalkboard-teacher"></i> <span>Trainer</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('trainer.add') }}">Add Trainer</a></li>
            <li><a class="nav-link" href="{{ route('trainer') }}">All Trainers</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown">
            <i class="fas fa-users"></i> <span>Admin</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('user.add') }}">Add Admin</a></li>
            <li><a class="nav-link" href="{{ route('user') }}">All Admins</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown">
            <i class="fas fa-bell"></i> <span>Announcement</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('announcement.add') }}">Add Announcement</a></li>
            <li><a class="nav-link" href="{{ route('announcement') }}">All Announcements</a></li>
          </ul>
        </li>

      </ul>
      @endif
      {{-- {{ dd(auth()->user()->role=='trainer') }} --}}
      @if (auth()->user()->role=='trainer')
      <ul class="sidebar-menu">        
        <li><a class="nav-link" href="{{ route('course.add') }}"><i class="fa fa-plus"></i> Add Course</a></li>
        <li><a class="nav-link" href="{{ route('course') }}"><i class="fas fa-tv"></i> All Courses</a></li>
        <li><a class="nav-link" href="{{ route('lecture.add') }}"><i class="fa fa-plus"></i> Add Lecture</a></li>
        <li><a class="nav-link" href="{{ route('lecture') }}"><i class="fas fa-tv"></i> All Lectures</a></li>
      </ul>  
      @endif
    </aside>
  </div>
@extends('layout.front.app')

@section('content')


<div class="container joinnow py-5">
    <div class="row">
        
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="fa fa-check-circle"></i>  {{ session()->get('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <ul>
                @foreach ($errors->all() as $error)
                 <li><i class="fa fa-warning"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="col-md-6">
            <h1>Join Waitlist</h1>
            <p>We share invites with 100 lucky users every Monday. After the platform invite you can enjoy benefits like 100% assured job opportunities</p>
            <ul>
                <li>150+ Premium Courses</li>
                <li>Earn rewards on learning</li>
                <li> 2500 discount on Job-ready Programs</li>
            </ul>
        </div>
        <div class="col-md-5 bg-light">
            <div class="form p-4 rounded">
                <form action="{{ route('create') }}" method="POST">
                    @csrf
                    <label for="">Name</label>
                    <input type="text" required class="form-control" placeholder="Bilal" name="name" id="">
                    <label for="">Email ID</label>
                    <input type="email" placeholder="Bilal@gmail.com"  required class="form-control" name="email" id="">
                    <label for="">Password</label>
                    <input type="password" required class="form-control" name="password" id="">
                    <button class="btn btn-outline-success w-100 my-4" type="submit">Join And Learn</button>
                </form>
            </div>
        </div>
    </div>
  </div>

@endsection

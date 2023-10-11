@extends('layout.admin.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
@endpush
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">

                    <div class="card">
                        <div class="card-header">
                            <h4>New Course</h4>
                        </div>
                        <div class="card-body">

                            
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
                            
                            <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" placeholder="Enter Course Name" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="text" placeholder="Enter Course Code" name="code" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if (auth()->user()->role=='admin')
                                    <div class="col-md-12 form-group">
                                        <select name="trainer" id="trainer" class="form-control">
                                            <option value="">Select Trainer</option>
                                            @foreach ($trainers as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <div class="col-md-12 form-group">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="meeting_link" placeholder="Enter Meeting Link" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="date" name="meeting_date" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="time" name="meeting_time" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="submit" class="btn btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script>
    $("#description").summernote({
        dialogsInBody: true,
        minHeight: 250
    });
</script>
@endpush

@endsection

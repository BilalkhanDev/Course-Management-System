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
                            <h4>Edit lecture</h4>
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
                            
                            <form action="{{ route('lecture.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $lecture->id }}">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <select name="course" id="course" class="form-control">
                                            <option value="">Select Course</option>
                                            @foreach ($courses as $item)
                                                <option value="{{ $item->id }}" {{ $lecture->course_id==$item->id?"selected":"" }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="text" placeholder="Enter Lecture Title" value="{{ $lecture->title }}" name="title" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="file" name="video" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Description">{!! $lecture->description !!}</textarea>
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

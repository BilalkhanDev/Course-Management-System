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
                            <h4>New Trainer</h4>
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
                            
                            <form action="{{ route('trainer.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" placeholder="Enter Trainer Name" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="email" placeholder="Enter Trainer Email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="password" placeholder="Enter Trainer Password" name="password" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="text" placeholder="Enter Trainer Contact" name="contact" class="form-control">
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

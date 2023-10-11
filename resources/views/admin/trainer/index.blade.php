@extends('layout.admin.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">

                    <div class="card">
                        <div class="card-header">
                            <h4>All Trainer</h4>
                        </div>
                        <div class="card-body">

                            
                            @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="fa fa-check-circle"></i>  {{ session()->get('success') }}
                            </div>
                            @endif
                            @if(session()->has('danger'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="fa fa-check-circle"></i>  {{ session()->get('danger') }}
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
                            
                            <table class="table table-striped" id="trainer-table">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>CNIC</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trainers as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/trainer/'.$item->image) }}" width="150px" class="img-fluid" alt="">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->contact }}</td>
                                            <td>{{ $item->cnic }}</td>
                                            <td>
                                                <a href="{{ route('trainer.edit',$item->id) }}" class="btn btn-warning fa fa-edit"></a>
                                                <a href="{{ route('trainer.delete',$item->id) }}" class="btn btn-danger fa fa-trash-alt"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $("#trainer-table").DataTable();
</script>
@endpush

@endsection

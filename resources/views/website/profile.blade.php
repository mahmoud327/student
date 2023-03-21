@extends('website.layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="btn-close btn-close-white" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('status') }}
        </div>
    @elseif(session('failed'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="btn-close btn-close-white" aria-label="Close">×</button>
            {{ session('failed') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- row -->
    <div class="row row-sm">


        <!-- Col -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">Personal Information</div>
                    <form class="form-horizontal" action="{{ route('update.profile') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf



                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name"placeholder=" Name"
                                        value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" placeholder=" password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label"> password_confirmation</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder=" password_confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 main-content-label">Contact Info</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Email<i>(required)</i></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" placeholder="Email"
                                        value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="phone number"
                                        value="{{ auth()->user()->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">upload cv</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control " name="cv">
                                </div>
                            </div>
                        </div>




                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Col -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

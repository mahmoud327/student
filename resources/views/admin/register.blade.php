@extends('admin.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ asset('website/img/logo/logo.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">

                                <div class="card-sigin">
                                    <div class="card-sigin">

                                        <div class="main-signup-header">
                                            <h3>create and An Account</h3>
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-dismiss="alert" aria-label="Close">×</button>
                                                    {{ session('status') }}
                                                </div>
                                            @elseif(session('failed'))
                                                <div class="alert alert-danger" role="alert">
                                                    <button type="button" class="btn-close btn-close-white"
                                                        aria-label="Close">×</button>
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

                                            <form action="{{ route('doctor.register') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>name</label> <input class="form-control" name="name" required
                                                        placeholder="Enter your name" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label> <input class="form-control" name="email" required
                                                        placeholder="Enter your email" type="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label> <input class="form-control" name="password"
                                                        requiredplaceholder="Enter your password" type="password">
                                                </div>



                                                <div class="form-group">
                                                    <label>phone</label> <input class="form-control" name="phone" required
                                                        placeholder="phone" type="number">
                                                </div>

                                                <div class="form-group">
                                                    <label>specializations</label>

                                                    <select class="form-control" name="specialization_id">
                                                        @foreach ($specializations as $specialization)
                                                            <option value="{{ $specialization->id }}">
                                                                {{ $specialization->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <button class="btn btn-main-primary btn-block">Sign up</button>

                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p> have an account? <a href="{{ route('admin.login.page') }}">have an
                                                        Account</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection

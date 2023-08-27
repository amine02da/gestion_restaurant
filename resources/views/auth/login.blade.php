@extends("layouts.layout")
@push("styles")
<link rel="stylesheet" href="{{asset("css/login.css")}}">
@endpush
@section("title","Login")
@section("content")
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="row rounded p-3 bg-white shadow box-area">
        <div class="col-md-6 left-box rounded-4  ">
            <div class="image">
                <img  src="{{asset("imgs/loginleft.png")}}" class=" rounded img-fluid">
            </div>
        </div>
        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text">
                    <h2>Hello, Again</h2>
                    <p>We are happy to have you back.</p>
                </div>
                <form action="{{route("login")}}" method="post">
                    @csrf
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" >
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" >
                </div>
                <div class="input-group">
                    <button type="submit" class="btn btn-lg btn-primary w-50 fs-6">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
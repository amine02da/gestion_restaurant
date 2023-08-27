@extends("layouts.layout")
@section("title","Servers")
@section("content")
    <div class="row g-0 text-center mt-5">
        <div class="d-flex justify-content-around container">
        <div class="col-sm-6 col-md-4">
            <x-sidbar />
        </div>
        <div class="col-6 col-md-6 rounded shadow p-3">
            <div class="d-flex fs-3 justify-content-center">
                <i class="fa-solid fa-plus mt-1 m-2"></i><h3 class="text-secondary">Servers</h3>
            </div>
            <hr>
            <form action="{{route("server.store")}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="@error('name') is-invalid  @enderror form-control"
                    placeholder="Name"
                    name="name"
                    value="{{old("name")}}"
                    
                    >
                    @error("name")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="@error('address') is-invalid  @enderror form-control"
                    placeholder="Address"
                    name="address"
                    value="{{old("address")}}"
                    
                    >
                    @error("address")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="text" class="@error('phone') is-invalid  @enderror form-control"
                    placeholder="Phone"
                    name="phone"
                    value="{{old("phone")}}"
                    
                    >
                    @error("phone")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group  d-flex justify-content-start mt-1">
                    <button class="btn btn-primary w-25" type="submit">Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
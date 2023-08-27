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
                <i class="fa-solid fa-edit mt-1 m-2"></i><h3 class="text-secondary">{{$servant->name}}</h3>
            </div>
            <hr>
            <form action="{{route("server.update",$servant->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="form-group mt-2">
                    <input type="text"  class="@error('name') is-invalid  @enderror form-control"
                    placeholder="Name"
                    name="name"
                    value={{$servant->name}}
                    >
                    @error("name")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="text"  class="@error('address') is-invalid  @enderror form-control"
                    placeholder="Address"
                    name="address"
                    value={{$servant->address}}
                    >
                    @error("address")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="text"  class="@error('phone') is-invalid  @enderror form-control"
                    placeholder="Phone"
                    name="phone"
                    value={{$servant->phone}}
                    >
                    @error("phone")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-start mt-1">
                    <button class="btn btn-primary w-25" type="submit">Edit</button>
                </div>
                </form>
        </div>
        </div>
    </div>
@endsection
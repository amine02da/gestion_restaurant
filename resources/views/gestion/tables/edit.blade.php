@extends("layouts.layout")
@section("title","table")
@section("content")
    <div class="row g-0 text-center mt-5">
        <div class="d-flex justify-content-around container">
        <div class="col-sm-6 col-md-4">
            <x-sidbar />
        </div>
        <div class="col-6 col-md-6 rounded shadow p-3">
            <div class="d-flex fs-3 justify-content-center">
                <i class="fa-solid fa-edit mt-1 m-2"></i><h3 class="text-secondary">{{$table->title}}</h3>
            </div>
            <hr>
            <form action="{{route("table.update",$table->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <input type="text"  class="@error('name') is-invalid  @enderror form-control"
                    placeholder="Name"
                    name="name"
                    value={{$table->name}}
                    >
                    @error("name")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                    <div class="form-group d-flex mt-2 justify-content-evenly">
                        <div>
                            <input class="form-check-input" type="radio" name="status" id="active" value="1" @checked($table->status == 1)>
                            <label class="form-check-label" for="active">
                                Available
                            </label>
                        </div>
                        <div>
                        <input class="form-check-input" type="radio" name="status" id="inactive" value="0" @checked($table->status == 0)>
                            <label class="form-check-label" for="inactive">
                                Not Available
                            </label>
                        </div>
                    </div>
                <div class="form-group d-flex justify-content-start mt-1">
                    <button class="btn btn-primary w-25" type="submit">Edit</button>
                </div>
                </form>
        </div>
        </div>
    </div>
@endsection
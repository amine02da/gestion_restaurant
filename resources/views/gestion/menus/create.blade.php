@extends("layouts.layout")
@section("title","Menus")
@section("content")
    <div class="row g-0 text-center mt-5">
        <div class="d-flex justify-content-around container">
        <div class="col-sm-6 col-md-4">
            <x-sidbar />
        </div>
        <div class="col-6 col-md-6 rounded shadow p-3">
            <div class="d-flex fs-3 justify-content-center">
                <i class="fa-solid fa-plus mt-1 m-2"></i><h3 class="text-secondary">Menus</h3>
            </div>
            <hr>
            <form action="{{route("menu.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="@error('title') is-invalid  @enderror form-control"
                    placeholder="title"
                    name="title"
                    value="{{old("title")}}"
                    
                    >
                    @error("title")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="number" class="@error('price') is-invalid  @enderror form-control"
                    placeholder="price"
                    name="price"
                    value="{{old("price")}}"
                    >
                    @error("price")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                     <textarea class="@error('description') is-invalid  @enderror form-control" 
                    placeholder="description"
                    name="description">
                    {{old("description")}}
                    </textarea>
                    @error("description")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                    @error("description")
                        <p class="text-danger d-flex justify-content-start">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="file" class="@error('image') is-invalid  @enderror form-control"
                    placeholder="image"
                    name="image"
                    >
                    @error("image")
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
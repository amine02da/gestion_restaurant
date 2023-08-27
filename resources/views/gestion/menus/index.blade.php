@extends("layouts.layout")
@section("title","Menus")
@section("content")
    <div class="row g-0 text-center mt-5">
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session("success")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
        @endif
        <div class="d-flex justify-content-around container">
        <div class="col-sm-6 col-md-4">
            <x-sidbar />
        </div>
        <div class="col-6 col-md-6 rounded shadow p-3">
            <div class="d-flex justify-content-around">
                <h3>Menus</h3>
                <a href="{{route("menu.create")}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
            </div>
            <hr>
            <table class="table table-hover table-responsive-sm mt-2">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">price</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                    <tr>
                        <th scope="row">{{$menu->id}}</th>
                        <td><img src="{{asset("storage/".$menu->image)}}" class="rounded img-fluid shadow"  width="200px" ></td>
                        <td>{{$menu->title}}</td>
                        <td>{{$menu->Category->title}}</td>
                        <td>{{substr($menu->description,0,15)."..."}}</td>
                        <td>{{$menu->price}}</td>
                        <td>{{$menu->created_at}}</td>
                        <td class="d-flex justify-content-center">
                                <a href="{{route("menu.edit", $menu->id)}}" class="bg-warning text-white m-1 border-0 rounded p-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form id="form" action="{{route("menu.destroy",$menu->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button 
                                href="{{route("menu.edit", $menu->id)}}"
                                onclick="confirmation(event)"
                                class="bg-danger m-1 text-white border-0 rounded p-2" id="show_confirm"  type="submit"><i class="fa-solid fa-trash" ></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td>
                            <td colspan="7">no menu define</td>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{$menus->links()}}
        </div>
        </div>
    </div>
    @push("scripts")   
        <script>
                function confirmation(event)
                {
                    event.preventDefault();
                    var form = document.getElementById("form");
                    var urlToRedirect = event.currentTarget.getAttribute('href');  
                    swal({
                        title: "Are you sure to Delete this ",
                        text: "You will not be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {                 
                            form.submit();
                        }  
                    });
                }
        </script>
    @endpush
@endsection
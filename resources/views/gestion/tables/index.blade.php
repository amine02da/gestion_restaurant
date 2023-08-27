@extends("layouts.layout")
@section("title","Tables")
@section("content")
    <div class="row g-0 text-center mt-5">
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session("success")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
        @endif
        <div class="d-flex justify-content-around container">
        <div class="col-sm-6 col-md-4 ">
            <x-sidbar />
        </div>
        <div class="col-6 col-md-6 rounded p-3 shadow">
            <div class="d-flex justify-content-around">
                <h3>Tables</h3>
                <a href="{{route("table.create")}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
            </div>
            <hr>
            <table class="table table-hover table-responsive-sm mt-2">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">status</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tables as $table)
                    <tr>
                        <th scope="row">{{$table->id}}</th>
                        <td>{{$table->name}}</td>
                        <td>{{$table->status ? "Available" : "not Available"}}</td>
                        <td>{{$table->created_at}}</td>
                        <td class="d-flex justify-content-center">
                                <a href="{{route("table.edit", $table->id)}}" class="bg-warning text-white m-1 border-0 rounded p-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{route("table.destroy",$table->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="bg-danger m-1 text-white border-0 rounded p-2"   type="submit"  onclick="return confirm('are you sure to delete this table ?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <td>
                            <td colspan="4">no table define</td>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{$tables->links()}}
        </div>
        </div>
    </div>
    @push("scripts")
    @endpush
@endsection
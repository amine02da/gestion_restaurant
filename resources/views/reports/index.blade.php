@extends("layouts.layout")
@section("title","Reports")
@section("content")
    <div class="row g-0 text-center mt-5">
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session("success")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 

        @endif
                <div class="d-flex fs-3  shadow p-3 justify-content-between">
        <h3 class="text-secondary">Reports</h3>
        <a href="{{url()->previous()}}" class="nav-link">
            <i class="fa-solid fa-arrow-left btn btn-secondary text-center align-items-center d-flex"></i>
        </a>
        </div>
        <div class="d-flex justify-content-around container mt-5">

        <div class="col-12 col-md-12 rounded shadow p-3">
            <form action="{{route("reports.generate")}}" method="post">
                @csrf
                <div class="d-flex justify-content-around">
                <div class="mb-3">
                    <input type="date" class="form-control"  name="from">
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" name="to">
                </div>
                <button type="submit" class="btn btn-primary">Generate</button>
                </div>
            </form>
            <hr>
            <table class="table table-hover table-responsive-sm mt-2">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Servant</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Tables</th>
                    <th scope="col">Menus</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Total received</th>
                    <th scope="col">Remaining amount</th>
                    <th scope="col">Payment type</th>
                    <th scope="col">Payment status</th>
                </tr>
                </thead>
                <tbody>
                    @isset($total)
                    <div class="p-2">
                        <p>Date Between <span class="badge text-bg-info">{{$startdate}}</span> And <span class="badge text-bg-info">{{$enddate}}</span></p>
                    </div>
                    @foreach($sales as $sale)
                    <tr>
                        <th scope="row">{{$sale->id}}</th>
                        <td>
                                @foreach($servents as $servent)
                                    {{$servent->id == $sale->servents_id ? $servent->name : ""}}
                                @endforeach
                        </td>
                        <td>
                            {{$sale->quantity}}
                        </td>
                        <td>
                            @foreach($sale->tables as $table)
                                {{$table->name}} <br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($sale->menus as $menu)
                            <img src="{{asset("storage/".$menu->image)}}" class=" rounded-circle" width="70px" height="70px">
                                {{$menu->title}} <br>
                            @endforeach                        
                        </td>
                        <td>
                            {{$sale->total_price}}
                        </td>
                        <td>
                            {{$sale->total_received}}
                        </td>
                        <td>
                            {{$sale->remaining_amount}}
                        </td>
                        <td>
                            {{$sale->payment_type}}
                        </td>
                        <td>
                            {{$sale->payment_status}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div>
                <p class="badge text-bg-danger">Total: {{$total}} Dh</p>
            </div>
            <div>
                <form action="{{route("reports.export")}}" method="post">
                    @csrf
                    {{-- <div class="form-control"> --}}
                        <input type="hidden" name="from" value="{{$startdate}}">
                    {{-- </div> --}}
                    {{-- <div class="form-control"> --}}
                        <input type="hidden" name="to" value="{{$enddate}}">
                    {{-- </div> --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Generate report
                        </button>
                    </div>
                </form>
            </div>
                    @endisset
        </div>
        </div>
    </div>
@endsection
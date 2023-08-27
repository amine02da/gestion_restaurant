@extends("layouts.layout")
@section("title","Sales")
@section("content")
    <div class="row g-0 text-center mt-5">
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session("success")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
        @endif
        <div class="d-flex justify-content-around container">

        <div class="col-12 col-md-12 rounded shadow p-3">
            <div class="d-flex justify-content-around">
                <h3>Sale number : {{$sale->id}}</h3>
                <a href="{{route("payement.index")}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
            </div>
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
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <form action="{{route("add_payement.edit",1)}}" method="post">
                    <tr>
                        <th scope="row">{{$sale->id}}</th>
                        <td>
                            <select name="servents_id" class="form-select" style="width: 100px">
                                @foreach($servents as $servent)
                                <option value="{{$servent->id}}" @selected($servent->id == $sale->servents_id) class="form-select">{{$servent->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input name="total_received" class="form-control" type="number" value="{{$sale->quantity}}">
                        </td>
                        <td>
                            @foreach($sale->tables as $table)
                                <input name="total_received" class="form-control" type="text" value="{{$table->name}}">
                            @endforeach
                        </td>
                        <td>
                            @foreach($sale->menus as $menu)
                                <input name="total_received" class="form-control" type="text" value="{{$menu->title}}">
                            @endforeach                        </td>
                        <td>
                            <input name="total_received" class="form-control" type="number" value="{{$sale->total_price}}">
                        </td>
                        <td>
                            <input name="total_received" class="form-control" type="number" value="{{$sale->total_received}}">
                        </td>
                        <td>
                            <input name="remaining_amount" class="form-control" type="number" value="{{$sale->remaining_amount}}">
                        </td>
                        <td>
                            <select name="payment_type" class="form-select" style="width: 100px">
                                    <option value="cash" @selected($sale->payment_type == "cash") class="form-select">Cash</option>
                                    <option value="credit_card" @selected($sale->payment_type == "credit_card") class="form-select">Credit card</option>
                            </select>
                        </td>
                        <td>
                            <select name="payment_status" class="form-select" style="width: 100px">
                                <option value="pending" @selected($sale->payment_status == "pending") class="form-select">Pending</option>
                                <option value="paid" @selected($sale->payment_status == "paid") class="form-select">Paid</option>
                            </select>
                        </td>
                        <td class="d-flex">
                            <a href="" class="m-1">
                                <i class="fa-solid fa-file text-info fs-3"></i>
                            </a>
                            <a href="" class="m-1">
                                <i class="fa-solid fa-pen-to-square text-warning fs-3"></i>
                            </a>
                        </td>
                    </tr>
                    </form>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    @push("scripts")
    @endpush
@endsection
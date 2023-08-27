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

        <div class="col-4 col-md-4 rounded shadow p-3">
            <x-sidbar />
        </div>
        <div class="col-8 col-md-6 rounded shadow p-3">
            <div class="d-flex justify-content-around">
                <h3>Sales</h3>
                <a href="{{route("payement.index")}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
            </div>
            <hr>
            <table class="table table-hover table-responsive-sm mt-2">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Total received</th>
                    <th scope="col">Remaining amount</th>
                    <th scope="col">Payment type</th>
                    <th scope="col">Payment status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                    <tr>
                        <th scope="row">{{$sale->id}}</th>
                        <td>
                            {{$sale->quantity}}
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
                        <td class="d-flex">
                            <a href="{{route("ticket",$sale->id)}}" class="m-1">
                                <i class="fa-solid fa-file text-info fs-3"></i>
                            </a>
                            {{-- <a href="{{route("add_payement.edit", $sale->id)}}" class="m-1">
                                <i class="fa-solid fa-pen-to-square text-warning fs-3"></i>
                            </a> --}}
                        </td>
                    </tr>
                    </form>
                    @empty
                        <td>
                            <td colspan="11">no sale define</td>
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{-- {{$sales->links()}} --}}
        </div>
        </div>
    </div>
    @push("scripts")
    @endpush
@endsection
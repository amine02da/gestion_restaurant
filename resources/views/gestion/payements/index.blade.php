@extends("layouts.layout")
@section("title","payements")
@section("content")
<form method="post" action="{{route("add_payement.store")}}">
    @csrf
    <div class="container text-center">
        <div class="d-flex fs-3 mt-3 shadow p-3 justify-content-between">
        <h3 class="text-secondary">Add Sales</h3>
        <a href="{{url()->previous()}}" class="nav-link">
            <i class="fa-solid fa-arrow-left btn btn-secondary text-center align-items-center d-flex"></i>
        </a>
        </div>
        <div class="row g-0 mt-3">
            <div class="col-sm-6 col-md-4 justify-content-center align-items-center overflow-scroll"
                style="height: 540px">
                @foreach($menus as $menu)
                <div class="w-25">

                    <div class="card m-2 shadow " style="width: 18rem;" >
                        <img width="150px" height="150px" src="{{asset("storage/".$menu->image)}}" class="card-img-top"
                        alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$menu->title}}</h5>
                            <p class="card-text">{{$menu->description}}</p>
                            <span class="badge text-bg-dark">{{$menu->price}} dh</span>
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input  name="menu_id[]" value="{{$menu->id}}" type="checkbox" class="menu btn-check"
                            id="{{$menu->title}}" autocomplete="off">
                        <label class="btn btn-outline-primary menu" for="{{$menu->title}}">Choose</label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-sm-6 col-md-4 overflow-scroll" style="height: 540px">
                @foreach($tables as $table)
                <div class="p-4 rounded m-3">
                    <img src="{{asset("imgs/table.svg")}}" width="100px" height="100px">
                    <p class="fs-4">{{$table->name}}</p>
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" name="table_id[]" class="btn-check" id="{{$table->name}}"
                            value="{{$table->id}}" autocomplete="off">
                        <label class="btn btn-outline-primary" for="{{$table->name}}">Choose</label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="shadow p-4 rounded">
                    <div class="mb-3">
                        <select class="form-select" name="servents_id" aria-label="Default select example">
                            <option selected disabled>Servant</option>
                            @foreach($servants as $servant)
                                <option value="{{$servant->id}}">{{$servant->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Qte</span>
                        <input type="number" name="quantity" id="qte" class=" form-control" placeholder="Add Quantity"
                            aria-label="Quantity" aria-describedby="addon-wrapping">
                    </div>
                    <div class="mb-3 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input id="price" type="text" name="total_price" placeholder="Price" class="form-control"
                                value=""
                                aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" id="total" name="total_received" placeholder="Total" class="form-control"
                                aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" name="remaining_amount" placeholder="Remaining amount"
                                class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="payment_type" aria-label="Default select example">
                            <option selected disabled>Payment type</option>
                            <option value="1">credit_card</option>
                            <option value="2">cash</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="payment_status" aria-label="Default select example">
                            <option selected disabled>Payment status</option>
                            <option value="1">pending</option>
                            <option value="2">paid</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>


        </div>
    </div>
</form>
@push("scripts")
<!-- menu.blade.php (suite) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.menu').change(function () {
            var menuId = $(this).val();
            if (menuId) {
                $.ajax({
                    url: '/get-menu-price/' + menuId,
                    type: 'GET',
                    success: function (data) {
                        if (data.price) {
                            var pricevl = $("#price").val();
                            $('#price').val(+pricevl + +data.price);
                        } else {
                            $('#price').val('Prix non disponible');
                        }
                    },
                    error: function () {
                        $('#price').val('Une erreur s\'est produite lors de la récupération du prix.');
                    }
                });
            } else {
                $('#price').val('');
            }
        });
        $('#qte').on("input" , function () {
            var qte = $(this).val();    
            var pricevl = $("#price").val();
            $('#total').val(qte * pricevl);
        })
    });
</script>

@endpush
@endsection
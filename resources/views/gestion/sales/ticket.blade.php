@extends("layouts.layout")
@section("title","Ticket")
@section("content")
<div class="position-absolute top-50 start-50 translate-middle  p-4 rounded text-center">
    <div class="shadow p-4" id="{{$sale->id}}">
                <h3><i class="fa-solid fa-clipboard-list mt-1 m-2 text-primary"></i> Menus </h3>
        <div class="menu_area">
            @foreach($sale->menus as $menu)
                <p>{{$menu->title}}</p>
            @endforeach
        </div>
        <h3><i class="fa-solid fa-chair text-primary"></i> Tables </h3>
        <div class="table_area">
            @foreach($sale->tables as $table)
                <p>{{$table->name}}</p>
            @endforeach
        <h3> <i class="fa-solid fa-circle-info text-primary"></i> Details </h3>
        <div class="details">
            <p>Quantity: {{$sale->quantity}}</p>
            <p>Total: {{$sale->total_price}} dh</p>
            <p>Payement with: {{$sale->payment_type}}</p>
        </div>
        <hr>
        <div class="rest_name">
            <p>DaFood <br>
            Ouarzazate hey el massira <br>
            +212659540718</p>
        </div>
        </div>
    </div>
    <button class="btn btn-primary" onclick="print({{$sale->id}})"><i class="fas fa-print"></i> Print</button>
</div>
@endsection
@push("scripts")
    <script>
        function print(el){
            const page = document.body.innerHTML;
            const content = document.getElementById(el).innerHTML;
            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = page;
        }
    </script>
@endpush
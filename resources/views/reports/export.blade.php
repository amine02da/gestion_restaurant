            <table >
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Servant</th>
                    <th>Quantity</th>
                    <th>Tables</th>
                    <th>Menus</th>
                    <th>Total price</th>
                    <th>Total received</th>
                    <th>Remaining amount</th>
                    <th>Payment type</th>
                    <th>Payment status</th>
                </tr>
                </thead>
                <tbody>
                    @isset($total)
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
                    <tr>
                        <td>
                            Total : {{$total}} Dh
                        </td>
                    </tr>
                    @endisset
                </tbody>
            </table>
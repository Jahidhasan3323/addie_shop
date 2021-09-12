@extends('backend.master')

@section('mainContent')
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $totalDiscount = 0 @endphp
                @foreach(Cart::content() as $row)
                    <form method="post" action="{{url('shopping-cart/update')}}">
                        @csrf
                        <tr>
                            <td>
                                <p>{{$row->name}}</p>
                                <p><strong>Stock: </strong>{{$row->options->stock}}</p>
                            </td>
                            <td>${{$row->price}}</td>
                            <td>
                                <input type="number" value="{{$row->qty}}" name="qty">
                                <input type="hidden" value="{{$row->rowId}}" name="rowId">
                                <input type="hidden" value="{{$row->options->stock_id}}" name="stock_id">
                                <input type="hidden" value="{{$row->id}}" name="product_id">
                            </td>
                            <td>
                                @php
                                    $discount=$row->options->discount*$row->qty;
                                    $totalDiscount = $totalDiscount+$discount;
                                @endphp
                                {{$discount}}

                            </td>
                            <td>${{($row->price*$row->qty)-$discount}}</td>
                            <td>
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{url('shopping-cart/remove/'.$row->rowId)}}"
                                   class="btn btn-danger ">Remove</a>
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Subtotal: <span class="float-end">$ {{Cart::subtotal()}}</span>
                        </li>
                        <li class="list-group-item">
                            Discount: <span class="float-end">$ {{$totalDiscount}}</span>
                        </li>
                        <li class="list-group-item">
                            Total: <span class="float-end">$ {{Cart::total()-$totalDiscount}}</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
@endsection

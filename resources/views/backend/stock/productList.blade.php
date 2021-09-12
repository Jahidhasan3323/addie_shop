@extends('backend.master')

@section('mainContent')
    <div class="row py-5">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($products as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->product->title}}</td>
                        <td>{{$row->price}}</td>
                        <td><a class="btn btn-success" href="{{url('shopping-cart/add/'.$row->stock_id.'/'.$row->product_id)}}">Add to cart</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

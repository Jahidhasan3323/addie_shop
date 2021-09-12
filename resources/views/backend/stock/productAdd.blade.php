@extends('backend.master')

@section('mainContent')
    <div class="row py-5">
        <div class="col-md-12">
            <form method="post" action="{{url('stock/product/add')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <select class="form-control" name="stock_id">
                        <option value="">Select</option>
                        @foreach($stocks as $stock)
                            <option value="{{$stock->id}}">{{$stock->title}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('stock_id'))
                        <span class="help-block text-danger">
                            <strong>{{$errors->first('stock_id')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select class="form-control" name="product_id">
                        <option value="">Select</option>
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->title}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('product_id'))
                        <span class="help-block text-danger">
                            <strong>{{$errors->first('product_id')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" aria-describedby="emailHelp" name="quantity"
                           value="{{old('quantity')}}">
                    @if ($errors->has('quantity'))
                        <span class="help-block text-danger">
                            <strong>{{$errors->first('quantity')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" aria-describedby="emailHelp" name="price"
                           value="{{old('price')}}">
                    @if ($errors->has('price'))
                        <span class="help-block text-danger">
                            <strong>{{$errors->first('price')}}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

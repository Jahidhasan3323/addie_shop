@extends('backend.master')

@section('mainContent')
    <div class="row py-5">
        <div class="col-md-12">
            <form method="post" action="{{url('products')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title"
                           value="{{old('title')}}">
                    @if ($errors->has('title'))
                        <span class="help-block text-danger">
                            <strong>{{$errors->first('title')}}</strong>
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
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control" id="discount" aria-describedby="emailHelp" name="discount"
                           value="{{old('discount')}}">
                    @if ($errors->has('discount'))
                        <span class="help-block text-danger">
                            <strong>{{$errors->first('discount')}}</strong>
                        </span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Description</label>
                    <textarea class="form-control" name="description">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block text-danger">
                            <strong>{{$errors->first('description')}}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

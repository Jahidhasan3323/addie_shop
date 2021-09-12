@extends('backend.master')

@section('mainContent')
    <div class="row py-5">
        <div class="col-md-12">
            <form method="post" action="{{url('stock')}}" enctype="multipart/form-data">
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

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

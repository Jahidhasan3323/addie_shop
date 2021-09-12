@extends('backend.master')

@section('mainContent')
    <div class="row py-5">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($data as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->title}}</td>
                        <td><a href="{{url('stock/products',$row->id)}}" class="btn btn-info">Product</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

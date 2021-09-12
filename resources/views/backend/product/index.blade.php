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
                    <th>Discount</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($products as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->title}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->discount}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

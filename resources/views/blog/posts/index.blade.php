@extends('layouts.app')
@section('content')
<table class="table-hover">
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->created_at}}</td>
        </tr>
    @endforeach
</table>
@endsection

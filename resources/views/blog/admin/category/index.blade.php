@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{route('blog.admin.categories.create')}}">Добавить категорию</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php /** @var \App\Models\Blog\BlogCategory $item **/ @endphp
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>

                                    <a href="{{route('blog.admin.categories.edit', $item->id)}}">{{$item->title}}</a>
                                </td>
                                <td @if(in_array($item->parent_id,[0,1])) style="" @endif>
                                    {{$item->parent_id}}
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total()>$paginator->count())
            <br>
{{--        {{}}--}}
            @php /** @var Illuminate\Pagination\Paginator $paginator **/ @endphp
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{$paginator->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
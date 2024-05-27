@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    @if(!Auth::user())
        <h1>todo app</h1>
        <p>jelentkezzen be</p>
    @else
        <a href="{{route('todos.create')}}" class="btn btn-sm btn-primary">Új todo</a>
        <div class="d-flex">

            <div class="col-6">
                <h2>Teljesített</h2>

                <div class="d-flex flex-wrap">
                    @foreach($complete_todos as $todo)
                        <div class="card col-12">
                            <p>{{$todo->content}}</p>
                            <p>Userid {{$todo->user_id}}</p>
                            <p>completed {{$todo->is_completed}}</p>
                            <div class="d-flex">
                                <a href="{{route('todos.edit', [$todo])}}"
                                   class="btn btn-sm btn-warning">Szerkesztés</a>
                                <form action="{{route('todos.destroy', $todo->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <h2>Nem teljesített</h2>

                <div class="d-flex flex-wrap">
                    @foreach($incomplete_todos as $todo)
                        <div class="card col-12">
                            <p>{{$todo->content}}</p>
                            <p>Userid {{$todo->user_id}}</p>
                            <p>completed {{$todo->is_completed}}</p>
                            <div class="d-flex">
                                <a href="{{route('todos.complete', [$todo])}}"
                                   class="btn btn-sm btn-success">Teljesítés</a>
                                <a href="{{route('todos.edit', [$todo])}}"
                                   class="btn btn-sm btn-warning">Szerkesztés</a>
                                <form action="{{route('todos.destroy', $todo->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Törlés</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection

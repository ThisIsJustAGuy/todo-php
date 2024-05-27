@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <form action="{{isset($todo) ? route('todos.update', $todo->id) : route('todos.store')}}" method="post">
        @csrf
        @if(isset($todo))
            @method('PUT')
        @endif
        <label for="content">Tartalom:</label>
        <textarea name="content" id="content" cols="30" rows="3">{{isset($todo) ? $todo->content : ''}}</textarea>
        <br>

        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <button type="submit">Mentés</button>
    </form>
@endsection

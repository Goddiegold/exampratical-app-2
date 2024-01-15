@extends('layout')

@section('title', 'Login Page')

@section('content')
<div class="d-flex justify-content-between">
  <h1>All Todos</h1>
  <h4>Hi there, {{session('user-token')->name}} 👋</h4>
</div>

<div class="d-flex justify-content-between mb-3">
  <a class="btn btn-primary" href="/add-todo">Add</a>
    <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
</div>
  
      <ul class="list-group">
      @foreach ($todos as $todo)
      <li class="list-group-item d-flex justify-content-between">
        {{$todo->title}}
        <a class="text-warning" href="{{"edit-todo/".$todo->id}}">Edit</a>
        {{-- <td><a href="{{"delete/".$user->id}}">Delete</a></td> --}}
      </li>
      {{-- <a class="text-danger">Delete</a> --}}
      @endforeach
    </ul>

      @endsection
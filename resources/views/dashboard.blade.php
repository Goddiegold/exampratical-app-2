@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between">
  <h1>All Todos</h1>
  <h4>Hi there, {{session('user-token')->name}} 👋</h4>
</div>

<div class="d-flex justify-content-between mb-3">
  <a class="btn btn-primary" href="/add-todo">Add</a>
    <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
</div>
<form style="width:200px" class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Filter By Level</label>
    <div class="d-flex">
    <select class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="level" style="margin-right:20px">
        <option value="">All</option>
        <option value="Low"
         @if(strtolower(request('level')) == 'low') selected @endif>
         Low</option>
        <option value="Medium"
        @if(strtolower(request('level')) == 'medium') selected @endif 
        >Medium</option>
        <option value="High"
        @if(strtolower(request('level')) == 'high') selected @endif
        >High</option>
    </select>
    <button class="btn btn-secondary" type="submit">Filter</button>
  </div>
</form>
  
      {{-- <ul class="list-group">
      @foreach ($todos as $todo)
      <li class="list-group-item d-flex justify-content-between">
        {{$todo->title}}
        <a class="text-warning" href="{{"edit-todo/".$todo->id}}">Edit</a>
      </li>
      @endforeach
    </ul> --}}
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Todo Title</th>
          <th scope="col">Prority Level</th>
          <th scope="col">Due Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          
          @foreach ($todos as $todo)
          <tr>
              <th scope="row">{{$todo->id}}</th>
              <td>{{$todo->title}}</td>
              <td>{{$todo->level}}</td>
              <td>{{$todo->due_date}}</td>
              {{-- <td>{{date("M j, Y", strtotime($todo->due --}}
  <td>
    <a class="text-primary" href="{{"/view-todo/".$todo->id}}">View</a> |
    <a class="text-warning" href="{{"/edit-todo/".$todo->id}}">Edit</a>
    |
    <a class="text-danger" href="{{"/delete-todo/".$todo->id}}">Delete</a>
     </td>
              <td>
          </tr>
          @endforeach
  
      </tbody>
  </table>

      @endsection
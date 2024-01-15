@extends('layout')

@section('title', 'Edit Todo')

@section('content')
<form
style="width:400px; margin:0 auto;"
method="POST"
action="{{ url('/handle-edit-todo/' . $todo->id) }}">
<h1>Edit Todo - {{$todo->id}}</h1>
@method('PUT')
    @csrf()
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title',$todo->title)}}" name="title">
      @error('title') <span style="color:red;">{{$message}}</span>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <textarea type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('description', $todo->description)}}" name="description">{{ old('description', $todo->description) }}</textarea>
      @error('description') <span style="color:red;">{{$message}}</span>@enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Priority Level</label>
      <select class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="level">
          <option value="" @if(old('level', $todo->level) == '') selected @endif>Choose...</option>
          <option value="Low" @if(old('level', $todo->level) == 'Low') selected @endif>Low</option>
          <option value="Medium" @if(old('level', $todo->level) == 'Medium') selected @endif>Medium</option>
          <option value="High" @if(old('level', $todo->level) == 'High') selected @endif>High</option>
      </select>
      @error('level') <span style="color:red;">{{ $message }}</span> @enderror
  </div>
  

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Due Date</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('due_date',$todo->due_date )}}" name="due_date">
        @error('due_date') <span style="color:red;">{{$message}}</span>@enderror
      </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection
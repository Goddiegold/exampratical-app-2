@extends('layout')

@section('title', 'Add Todo')

@section('content')
<form
style="width:400px; margin:0 auto;"
method="POST"
action="handle-add-todo">
<a class="btn btn-dark" href="/dashboard">Go Back</a>
<h1>Add Todos</h1>
        @csrf()
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title')}}" name="title">
          @error('title') <span style="color:red;">{{$message}}</span>@enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Description</label>
          <textarea type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('description')}}" name="description"></textarea>
          @error('description') <span style="color:red;">{{$message}}</span>@enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Priority Level</label>
          <select class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="level">
              <option value="">Choose...</option>
              <option value="Low">Low</option>
              <option value="Medium">Medium</option>
              <option value="High">High</option>
          </select>
          @error('level') <span style="color:red;">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Due Date</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('due_date')}}" name="due_date">
        @error('due_date') <span style="color:red;">{{$message}}</span>@enderror
      </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      @endsection
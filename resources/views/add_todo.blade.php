@extends('layout')

@section('title', 'Add Todo')

@section('content')
<form
style="width:400px; margin:0 auto;"
method="POST"
action="handle-add-todo">
<h1>Add Todos</h1>
        @csrf()
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('title')}}" name="title">
          @error('title') <span style="color:red;">{{$message}}</span>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      @endsection
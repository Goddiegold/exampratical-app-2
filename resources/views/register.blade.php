@extends('layout')

@section('title', 'Register Page')

@section('content')
    <form style="width:300px; margin: 20px auto;"
     method="POST"
      action="handle-register">
      {{-- @method('PUT') --}}
      @csrf() 
        <h1>Register</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text"
            name="name"
             class="form-control"
             id="exampleInputEmail1" 
             aria-describedby="emailHelp" 
             value="{{old('name')}}">
             @error('name') <span style="color:red;">{{$message}}</span>@enderror
          </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email"
    name="email"
     class="form-control"
     id="exampleInputEmail1" 
     aria-describedby="emailHelp" 
     value="{{old('email')}}">
     @error('email') <span style="color:red;">{{$message}}</span>@enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input 
    name="password"
    type="password" class="form-control" id="exampleInputPassword1"
    value="{{old('password')}}">
     @error('password') <span style="color:red;">{{$message}}</span>@enderror
  </div>
  {{-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> --}}
  <button type="submit" class="btn btn-danger">Submit</button>
</form>
</body>
</html>
@endsection
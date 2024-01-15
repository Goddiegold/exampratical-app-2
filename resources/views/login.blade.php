@extends('layout')

@section('title', 'Login Page')

@section('content')
    <form style="width:300px; margin: 20px auto;"
     method="POST"
      action="handle-login">
      {{-- @method('PUT') --}}
      @csrf()
        <h4>Login to your account</h4>
  <div class="mb-3">
    <label for="exampleInputEmaail1" class="form-label">Email address</label>
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
  <button type="submit" class="btn btn-danger">Submit</button>
</form>
@endsection
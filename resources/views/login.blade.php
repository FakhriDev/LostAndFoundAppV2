@extends('layouts.main')

@section('content')
<div class="main"> 
  <div class="logins">
    <div class="login">
      <h1>Login</h1>
      <form action=" {{route('login')}}" method="post">
        {{csrf_field()}}
        <label for="fname">E-mail</label>
        <input type="text" id="fname" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your name.." autofocus required value="{{old ('email') }}">
        @error('email')
          {{$message}}
          @enderror
        <label for="lname">Password</label>
        <input type="password" id="lname" name="password" placeholder="Your last name..">
        <input type="submit" value="Submit">
      </form>
      
      </div>
    </div>
    </div>
@endsection
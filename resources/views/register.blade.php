@extends('layouts.main')

@section('content')
<div class="main"> 
  <div class="logins">
    <div class="login">
      <h1>Register</h1>
      
      <form action=" {{route('register')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
        <div class="register">
          <div class="group">
            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" placeholder="Your name..">
          </div>
          <div class="group">
            <label for="fname">Email</label>
            <input type="email" id="fname" name="email" placeholder="Your name..">
        </div>
      </div>
      <div class="register">
        <div class="group">
          <label for="fname">Phone number</label>
          <input type="number" id="fname" name="contact" placeholder="Your name..">
      </div>
      <div class="group">
        <label for="lname">Password</label>
        <input type="password" id="lname" name="password" placeholder="Your last name..">
      </div>
      </div>
      <div class="register">
        <div class="group">
          <label for="fname">Photos</label>
          <input type="file" id="fname" name="photo" placeholder="Your name..">
        </div>
    </div>
        <input type="submit" value="Submit">
      </form>
      
      </div>
    </div>
    </div>
    @endsection
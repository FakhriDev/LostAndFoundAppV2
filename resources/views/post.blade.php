@extends('layouts.main')

@section('content')
<div class="main"> 
  <div class="logins">
    <div class="login">
      <h1>Post</h1>
      <form method="post" action="/saveproduct" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="fname">Post ads</label>
          <select id="country" name="type">
            @foreach ($types as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
          </select>
          <label for="fname">Name ads</label>
        <input type="text" id="fname" name="product_name" placeholder="Your name..">
        <label for="fname">Description</label>
        <textarea name="product_description">Some text...</textarea>
        <label for="fname">Categories</label>
          <select id="country" name="category">
            @foreach ($categories as $category)
                  <option value="{{$category->id}}" placeholder="@error('category'){{$message}} @enderror">{{$category->category_name}}</option>
            @endforeach
          </select>
          <label for="fname">Question</label>
        <input type="text" id="fname" name="question" placeholder="Question for Ads">
          <div><label for="fname">Photos</label></div>
          <input type="file" id="fname" name="product_image" placeholder="Your name..">
        <input type="submit" value="Submit">
      </form>
      
      </div>
    </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
  <div class="banner">
    <img src="assets/gambar/herobg.png" alt="Avatar">
    <div class="hero">
      <h1>The world's top Lost & Found Website</h1>
      <p>Handshare is a place to report or retrieve a lost item. Everyone can find their lost item back.<p>
        <form method="get" action="/search">
        <div class="search">
          <input type="text" name="keyword"class="searchTerm" placeholder="What are you looking for?">
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
         </button>
        </div>
      </form>
    </div>
  </div>
  <div class="kategories">
    <div class="kategory">
      <a href="/index"><b>All</b></a>
    </div>
    @foreach ($categories as $category)
    <div class="kategory">
      <a href="Category{{$category['id']}}"><b>{{$category->category_name}}</b></a>
    </div>
    @endforeach
  </div>
<div class="main"> 
  <div class="cards">
    @foreach ($products as $product)
    <div class="card">
      <a href="details{{$product['id']}}">
        <img src="{{url('/files/product_images/') }}/{{$product->product_image}}" alt="Avatar" style="width:100%">
      </a>
      <div class="container">
          <div class="profile">
            <img src="{{url('/files/photos/') }}/{{$product->user->photo}}" alt="Avatar">
          </div>
          <a href="#">
            <h4><b>{{$product->User->name}} </b></h4>
            <h4><b>{{$product->User->email}} </b></h4>
          </a>
          <div>
          <a href="details{{$product['id']}}">
            <h4><b>{{$product->product_name}}</b></h4>  
          </a>
            <p>{{$product->created_at->format('d/m/Y')}}</p> 
        <p>{{$product->product_description}}</p>
      </div> 
      <label><b>{{$product->types->type}}</b></label>
      </div>
      
      <div class="choice-myads">
        <label></label>
      </div> 
    </div>
    @endforeach
    </div>
    
  </div>
</div>
@endsection
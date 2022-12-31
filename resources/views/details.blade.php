@extends('layouts.main')

@section('content')
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <b>Question</b>
    <p>{{$products->question}}</p>
    <b>Answer</b>
    <form method="post" action="/doclaim" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="product_image" value="{{$products->product_image}}">
      <input type="hidden" name="product_name" value="{{$products->product_name}}">
      <input type="hidden" name="product_description" value="{{$products->product_description}}">
      <input type="hidden" name="question" value="{{$products->question}}">
      <input type="hidden" name="product_id" value="{{$products->id}}">
      <input type="hidden" name="user_id" value="{{$products->user_id}}">
      <textarea id="answer" name="answer">
        </textarea>
        <input type="submit" class="button button1" value="Submit">
      </form>
  </div>

</div>

<div class="main"> 
  <div class="details">
    <div class="detail">
      <a href="#">
        <img src="{{url('/files/product_images/') }}/{{$products->product_image}}" alt="Avatar" >
      </a>
      <div class="desc">
          <div class="profile">
            <img src="{{url('/files/photos/') }}/{{$products->user->photo}}" alt="Avatar">
          </div>
          <a href="#">
            <h4><b>{{$products->User->name}}</b></h4>
          </a>
          <div>
          <a href="#">
            <h4><b>{{$products->product_name}}</b></h4>  
          </a>
        <p>{{$products->product_description}}</p>
        <div class="choice-myads">
          <a href="#" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
          <a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="#" target="_blank"><i class="	fa fa-whatsapp" aria-hidden="true"></i></a>
        </div> 
        @if(Auth::check() && $cek != ($products->user_id))
        <button id="myBtn" class="button button1">Claim</button>
        <a href="{{ URL::previous() }}" class="button button2">Back</a>

        @elseif(Auth::check() && $cek == ($products->user_id))
        <a href="{{ URL::previous() }}" class="button button2">Back</a>
        @elseif(Auth::check() && 1 == ($products->type))
        @else
        <a href="/login" class="button button1">Claim</a>
        @endif
      </div> 
      </div>
    </div>
    </div>
    </div>
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }
      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
      </script>
      
    @endsection
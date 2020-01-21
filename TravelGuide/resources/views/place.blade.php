<link rel="stylesheet" href="{{asset('map/css/style.css')}}">
@extends('header')
@section('content')
<div class="container">
<h3 class = "text-center">Images of Somapuri Vihara</h3>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" style = "width:140px;height:40%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCBfXwUDAMu8B0d_KQkslOuAK-Xxq_SBSKml6uzQ9qYaldOGdB2Q&s">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style = "width:140px;height:40%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgVm8W7Vj_0jpfqKaxgGhuOGJDqIqE9R-N58eXaqlJ59qc3GfCGQ&s" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style = "width:140px;height:40%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRf7paiXIMtqwWHEJDwHyRF-C0kULZkQEF9lCnzqTXCOynh583&s" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
       
      <br>
      <div class="card">
        <div class="card-header text-center">Transportation System</div>
        <div class="card-body">

          <div class="row">

            <div class="col-md-3">
            <div class="card" style="width: 13rem;">
            <img class="card-img-top" height = "140px" width="296px" src="/images/deshtravel.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Desh Travels</h5>
              <a href="http://www.deshtravelsbd.com/" class="btn btn-primary">View Details</a>
            </div>
           </div>
            </div>

            <div class="col-md-3">
               <div class="card" style="width: 13rem;">
            <img class="card-img-top" height = "140px" width="296px" src="/images/brtc.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">B.R.T.C</h5>
              <a href="http://www.brtc.gov.bd/" class="btn btn-primary">View Details</a>
            </div>
          </div>
            </div>

            <div class="col-md-3">
              <div class="card" style="width: 13rem;">
           <img class="card-img-top" height = "140px" width="296px" src="/images/grammentravel.jpg" alt="Card image cap">
           <div class="card-body">
             <h5 class="card-title">Grammen Travels</h5>
             <a href="http://www.grameentravelsbd.com/" class="btn btn-primary">View Details</a>
           </div>
         </div>
           </div>

           <div class="col-md-3">
            <div class="card" style="width: 13rem;">
         <img class="card-img-top" height = "140px" width="296px" src="/images/shyamolitravel.jpg" alt="Card image cap">
         <div class="card-body">
           <h5 class="card-title">Shyamoli Paribahan</h5>
           <a href="http://www.shyamoliparibahan-bd.com/" class="btn btn-primary">View Details</a>
         </div>
       </div>
         </div>
          </div>
             
        </div>
      </div>
      
      <br>
      <h3 class = "text-center">Current location</h3>
      <div class="place_location"></div>
    <br>
    <h3 class = "text-center">Nearest location</h3>
    <div class="nearest_places"></div>
    <br>
    <h3 class = "text-center">Nearest restaurant</h3>
    <div class="nearest_restaurant"></div>
    <br>
    
   <div class="card">
     <div class="card-header"><h4 class = "text-center">Review Videos</h4></div>
     <div class="card-body">
        <div class="row">
      <div class="col-md-6">
        <iframe width="500" height="315" src="https://www.youtube.com/embed/IFQKytzy1nY" frameborder="1" allow="accelerometer;encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="col-md-6">
         <iframe width="500" height="315" src="https://www.youtube.com/embed/ufgT3TLydGg" frameborder="1" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
     </div>
   </div>
   
    
   
</div>



<script src="{{asset('map/js/jquery-2.2.4.min.js')}}"></script>
<script src="http://maps.google.com/maps/api/js"></script>
<script src="{{asset('map/js/gmaps.js')}}"></script>
<script>
  $(function () {

  places = new GMaps({
     div: '.nearest_places',
     lat: {{ $nearest_places[0] -> latitude }},
     lng: {{ $nearest_places[0] -> longitude }}
   });

  restaurant = new GMaps({
       div : '.nearest_restaurant',
       lat : {{ $nearest_restaurants[0] -> latitude }},
       lng : {{ $nearest_restaurants[0] -> longitude }} 
  });

  place_location = new GMaps({

       div : '.place_location',
       lat : 25.0321976,
       lng : 88.9691304
  });

  place_location.addMarker({
     
    lat : 25.0321976,
    lng : 88.9691304,
    title : 'somapuri vihari'
  });

  @foreach($nearest_places as $nearest_place)
   places.addMarker({
     lat: {{ $nearest_place -> latitude }},
     lng: {{ $nearest_place -> longitude }},
     title: '{{ $nearest_places[0] -> place_name }}'
   });
   @endforeach

   @foreach($nearest_restaurants as $nearest_restaurant)
   restaurant.addMarker({
     lat: {{ $nearest_restaurant -> latitude }},
     lng: {{ $nearest_restaurant -> longitude }},
     title: '{{ $nearest_restaurant -> restaurant_name }}'
   });
  @endforeach

});
</script>

@endsection
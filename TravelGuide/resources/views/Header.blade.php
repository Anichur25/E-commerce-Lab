<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Map</title>
    <link rel="stylesheet" href="{{asset('map/css/style.css')}}">
    
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src = "{{ asset('aframe-js/aframe-master.js') }}"></script>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TravelGuide</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href = "./about">About</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Spot List
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                      $spots = DB :: table('spots_list') -> get()?>

                      @foreach($spots as $spot)
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ URL :: to('show-place/'.$spot -> spot_id) }}">{{ $spot -> spot_name }}</a>
                      @endforeach
            
                </div>
            </li>

            @if(Session :: get('virtual_tour'))
            <li class="nav-item active">
                <a class="nav-link" href = "{{URL :: to('/virtual-tour/'.$curr_place -> spot_id)}}">Virtual tour</a>
            </li>
            <?php Session :: put('virtual_tour',null) ?>
            @endif 
        </ul>
        
       
    </div>
     <ul class="navbar-nav navbar-right mr-auto">
            <li class = "nav-item active"><a class = "nav-link" href="#">Contact Us</a></li>
        </ul>

</nav>

@yield('content')
</body>
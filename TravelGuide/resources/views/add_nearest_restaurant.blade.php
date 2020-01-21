@extends('admin_panel')
@section('body-content')

<h3 class="text-center">Add nearest restaurant</h3>
<div class="row ">
  <div class="col-md-6 form-content">
    @if(Session :: get('message'))
    <div class="alert alert-success">
      <strong><?php echo(Session :: get('message')); Session :: put('message',null)?></strong>
    </div>
    
   @endif
     <form action = "{{ url('/save-nearest-restaurant') }}" method = "post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="Spot_name">Restaurant Name</label>
        <input type="text" class="form-control" name = "restaurant_name" aria-describedby="emailHelp" placeholder="Restaurant Name" required>
       
      </div>
      <div class="form-group">
        <label for="spot_latitude">Restaurant latitude</label>
        <input type="text" class="form-control" name = "restaurant_latitude" placeholder="Restaurant latitude"required>
      </div>
      <div class="form-group">
        <label for="spot_latitude">Restaurant longitude</label>
        <input type="text" class="form-control" name = "restaurant_longitude" placeholder="Restaurant longitude"required>
      </div>

      <div class="form-group">
        <label>Select reference spot</label>
        <select class="form-control" name = "ref_spot">
        @foreach($all_spots as $spot)
        <option value = "{{ $spot -> spot_id }}">{{ $spot -> spot_name }}</option>
        @endforeach
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">Add nearest restaurant</button>
    </form>

  </div>
</div>
@endsection
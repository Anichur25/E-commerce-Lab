@extends('admin_panel')
@section('body-content')

<h3 class="text-center">Add nearest spot</h3>
<div class="row ">
  <div class="col-md-6 form-content">
    @if(Session :: get('message'))
    <div class="alert alert-success">
      <strong><?php echo(Session :: get('message')); Session :: put('message',null)?></strong>
    </div>
    
   @endif
     <form action = "{{ url('/save-nearest-spot') }}" method = "post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="Spot_name">Spot Name</label>
        <input type="text" class="form-control" name = "spot_name" aria-describedby="emailHelp" placeholder="Spot Name"required>
       
      </div>
      <div class="form-group">
        <label for="spot_latitude">Spot latitude</label>
        <input type="text" class="form-control" name = "spot_latitude" placeholder="Spot latitude"required>
      </div>
      <div class="form-group">
        <label for="spot_latitude">Spot longitude</label>
        <input type="text" class="form-control" name = "spot_longitude" placeholder="Spot longitude" required>
      </div>

      <div class="form-group">
        <label>Select reference spot</label>
        <select class="form-control" name = "ref_spot">
        @foreach($all_spots as $spot)
        <option value = "{{ $spot -> spot_id }}">{{ $spot -> spot_name }}</option>
        @endforeach
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">Add nearest spot</button>
    </form>

  </div>
</div>
@endsection
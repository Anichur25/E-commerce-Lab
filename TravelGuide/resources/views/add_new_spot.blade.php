@extends('admin_panel')
@section('body-content')

<h3 class="text-center">Add new spot</h3>
<div class="row ">
  <div class="col-md-6 form-content">

    @if(Session :: get('message'))
    <div class="alert alert-success">
      <strong><?php echo(Session :: get('message')); Session :: put('message',null)?></strong>
    </div>
    
   @endif
  <form action = "{{ url('/save-new-spot') }}" method="post">
       {{ csrf_field() }}
      <div class="form-group">
        <label for="Spot_name">Spot Name</label>
        <input type="text" class="form-control" name ="spot_name" aria-describedby="emailHelp" placeholder="Spot Name">
       
      </div>
      <div class="form-group">
        <label for="spot_latitude">Spot latitude</label>
        <input type="text" class="form-control" name ="spot_latitude" placeholder="Spot latitude">
      </div>
      <div class="form-group">
        <label for="spot_latitude">Spot longitude</label>
        <input type="text" class="form-control" name = "spot_longitude" placeholder="Spot longitude">
      </div>
      
      <button type="submit" class="btn btn-primary">Add new spot</button>
    </form>

  </div>
</div>
@endsection
@extends('admin_panel')
@section('body-content')

<h3 class="text-center">Add new slider</h3>
<div class="row ">
  <div class="col-md-6 form-content">
    @if(Session :: get('message'))
    <div class="alert alert-success">
      <strong><?php echo(Session :: get('message')); Session :: put('message',null)?></strong>
    </div>
    
   @endif
     <form action = "{{ url('/save-slider-content') }}" method = "post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="Spot_name">Place Name</label>
        <input type="text" class="form-control" name = "place_name" aria-describedby="name" placeholder="Place Name" required>
      </div>

      <div class="form-group">
        <label>Select reference spot</label>
        <select class="form-control" name = "ref_spot">
        @foreach($all_spots as $spot)
        <option value = "{{ $spot -> spot_id }}">{{ $spot -> spot_name }}</option>
        @endforeach
        </select>
      </div>
      <div class="form-group">
        <label class="custom-file-label" for="customFile">Choose place image</label>
        <input type="file" class="custom-file-input" name = "spot_image" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Add slider</button>
    </form>

  </div>
</div>
@endsection
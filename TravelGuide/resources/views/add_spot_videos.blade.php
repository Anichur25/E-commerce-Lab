@extends('admin_panel')
@section('body-content')

<h3 class="text-center">Add new video</h3>
<div class="row ">
  <div class="col-md-6 form-content">
    @if(Session :: get('message'))
    <div class="alert alert-success">
      <strong><?php echo(Session :: get('message')); Session :: put('message',null)?></strong>
    </div>
    
   @endif
     <form action = "{{ url('/save-spot-video') }}" method = "post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="Spot_name">Video link</label>
        <input type="text" class="form-control" name = "video_link" aria-describedby="name" placeholder="Video Link" required>
      </div>

      <div class="form-group">
        <label>Select reference spot</label>
        <select class="form-control" name = "ref_spot">
        @foreach($all_spots as $spot)
        <option value = "{{ $spot -> spot_id }}">{{ $spot -> spot_name }}</option>
        @endforeach
        </select>
      </div>
    
      <button type="submit" class="btn btn-primary">Add Video</button>
    </form>

  </div>
</div>
@endsection
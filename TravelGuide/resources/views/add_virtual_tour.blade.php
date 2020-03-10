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
     <form action = "{{ url('/save-virtual-tour') }}" method = "post" enctype="multipart/form-data">
      {{ csrf_field() }}
     
     <?php $all_spots = DB :: table('spots_list') -> get() ?>
      <div class="form-group">
        <label>Select reference spot</label>
        <select class="form-control" name = "ref_spot">
        @foreach($all_spots as $spot)
        <option value = "{{ $spot -> spot_id }}">{{ $spot -> spot_name }}</option>
        @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Choose place virtual tour link</label>
        <input type="text" class="form-control" name = "spot_virtual_tour_link" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Add virtual tour</button>
    </form>

  </div>
</div>
@endsection
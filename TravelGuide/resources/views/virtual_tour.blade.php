@extends('header');
@section('content')
<div class="container">
<a-scene>
      <a-sky src="{{URL :: to($tour_content -> tour_image)}}" rotation="0 -130 0"></a-sky>

      <a-text font="kelsonsans" value="Somapuri vihara" width="6" position="-2.5 0.25 -1.5"
              rotation="0 15 0"></a-text>
</a-scene>
</div>

@endsection
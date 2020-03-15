@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-10" style = "padding-left : 20%">
                  @if(Session :: get('invalid_token'))
                  <p class = "alert alert-danger"> {{ Session :: get('invalid_token') }}</p>
                  <?php Session :: put('invalid_token',NULL); ?>
                  @endif
					<div class="signup-form">
                    <h2>User SignUp</h2>
						<form action="{{ url('/user-registration') }}" method = "post">
                            {{ csrf_field() }}
							<input type="text" placeholder="User Name" name = "user_name"required>
							<input type="email" placeholder="Email Address" name = "email"required>
                            <input type="password" placeholder="Password" name = "password"required>
                            <input type="text" placeholder="Mobile Number" name = "mobile_number"required>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
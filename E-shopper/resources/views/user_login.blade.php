@extends('layout')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-10" style="padding-left : 20%">

                <div class="signup-form">
                    <h2>User Login </h2>
                    @if(Session :: get('invalid_password'))
                    <p class="alert alert-danger"> {{ Session :: get('invalid_password') }}</p>
                    <?php Session :: put('invalid_password',NULL); ?>
                    @endif
                    <form action="{{ url('/check-user-auth') }}" method="post">
                        {{ csrf_field() }}
                        <input type="email" placeholder="Email Address" name="email" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
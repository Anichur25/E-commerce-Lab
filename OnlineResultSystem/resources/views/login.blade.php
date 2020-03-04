
<div class="box-login">
    <div class="login-form">
        <form action = "{{ url('check-auth') }}" method = "post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class = "text-dark"><strong>User ID</strong></label>
                <input type="text" class="login-element" name = "user_id">
            </div>
            <div class="form-group">
            <label class = "text-dark"><strong>Password</strong></label>
                <input type="password" class="login-element" name = "user_password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

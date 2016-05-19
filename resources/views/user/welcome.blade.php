@extends('layouts.master')


@section('content')
<div class="modal-dialog">
							<div class="loginmodal-container">
								<h1>Login to Your Account</h1><br>
								@if(isset($msg))
								<h6>Wrong email or password</h6>
							  @endif
							  <form action="{{url('/login')}}" method="post">
								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								<input type="text" name="email" placeholder="Email">
								<input type="password" name="password" placeholder="Password">
								<input type="submit" name="login" class="login loginmodal-submit" value="Login">
							  </form>
							  <div class="login-help" style="text-align:center; margin-top:15px;font-size:1em; font-family:'BrandonText';">
								<a href="#">General Affairs Information System</a>
								<br>
								<a href="{{url('/dologin')}}">
									<input type="submit" name="loginGoogleAccount" style="padding-left:15px;padding-right:15px" class="login loginmodal-submit2" value="Login Via Google Account">
								</a>
							  </div>
							</div>
				</div>
@endsection

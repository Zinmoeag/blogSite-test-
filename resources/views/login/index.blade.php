
<x-layout>



	<div class=" col-5 mx-auto my-5">

		<h3 class="text-center text-primary mb-3">Login</h3>


		<div class="card d-flex	py-3">
			<form action="/login" method="POST">
				@csrf

				<input type="hidden" name="previousUrl" value={{URL::previous()}}>

				<div class="form-group py-2 d-grid mx-4">
					<label for="email"  class="form-label" value="">Email</label>
					<input type="email" name="email" id="email" placeholder="Enter your email .." class="form-check" autocomplete="off" value="{{old('email')}}">
				</div>
				<x-errorMessage name="email" />

				<div class="form-group py-2 d-grid mx-4">
					<label for="password"  class="form-label">password</label>
					<input type="password" name="password" id="password" placeholder="Enter your password .." class="form-check" autocomplete="off">
				</div>
				<x-errorMessage name="password" />


				<a href="/password">Forgot password?</a>
				<br>


			

				<button type="submit" class="btn btn-primary btn-sm mx-4 my-2">Submit</button>
			</form>
		</div>
	
	</div>
	
	



</x-layout>
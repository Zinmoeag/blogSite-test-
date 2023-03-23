<x-adminLayout>

	<form action="/profile/password" method="POST">
		@csrf

		@method("put")
		<x-formInput name="Old-password" type="password" />

		<x-formInput name="New-password" type="password" />

		<a href="/password">Forgot password?</a>
		<br>

		<button type="submit" class="btn-sm btn btn-primary mt-3">Change</button>
	</form>
	



</x-adminLayout> 

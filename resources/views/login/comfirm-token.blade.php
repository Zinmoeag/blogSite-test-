<x-adminLayout>

	<form action="/password/reset" method="POST">
		@csrf

		@method("put")

		<input type="hidden" name="reset-token" value="{{request()->token}}">

		<input type="hidden" name="email" value="{{request('email')}}">
		<x-formInput name="password_confirmation" type="password" />

		<x-formInput name="password" type="password" />

		<button type="submit" class="btn-sm btn btn-primary mt-3">Update</button>
	</form>


</x-adminLayout>
<x-adminLayout>

	<form action="/password" method="POST">
		@csrf

		<x-formInput name="email" type="text" />

		<div class="d-flex justify-content-center">	
				<button type="submit" class="btn-sm btn btn-primary mt-3">Next</button>
		</div>
		
	</form>


</x-adminLayout> 
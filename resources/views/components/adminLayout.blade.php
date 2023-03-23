<x-layout>

	<div class="row">
		<div class="col-md-5 my-5 px-5">


			@can("admin")

			<div class="mt-3">
				<x-user-info />
			</div>

			@endcan


			@if(auth()->check())
			
			<button type="button" class="btn btn-sm rounded-0 col-md-12 btn-primary my-1">Profile</button>

			@endif

			<button type="button" class="btn btn-sm rounded-0 col-md-12 btn-warning my-1">
				<a href="/profile/password" class="text-dark">Change Password</a>
			</button>





			@can("admin")

			<button type="button" class="btn btn-sm rounded-0 col-md-12 btn-outline-success my-1"><a href="/admin/create" class="text-dark">Create</a></button>
			<button type="button" class="btn btn-sm rounded-0 col-md-12 btn-outline-warning my-1"><a href="/admin/blogs" class="text-dark">Blogs</a></button>

			@endcan
		</div>

		<section class="form-container col-md-7 my-5 px-2">

			{{$slot}}

		</section>
	</div>
	
	
</x-layout>
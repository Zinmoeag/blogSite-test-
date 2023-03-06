<x-layout>


	<div class="row">
		<div class="col-md-5 my-4 px-5">
			<x-user-info />
			<button type="button" class="btn btn-sm rounded-0 col-md-12 btn-outline-primary my-1"><a href="/admin" class="text-dark">Admin</a></button>
			<button type="button" class="btn btn-sm rounded-0 col-md-12 btn-outline-secondary my-1"><a href="/admin/create" class="text-dark">Create</a></button>
			<button type="button" class="btn btn-sm rounded-0 col-md-12 btn-outline-warning my-1"><a href="/admin/blogs" class="text-dark">Blogs</a></button>
		</div>

		<section class="form-container col-md-7 my-5 px-2">

			{{$slot}}

		</section>
	</div>
	
	
</x-layout>
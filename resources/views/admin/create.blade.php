
<x-adminLayout>
	<section class="form">

		<form method="POST" action="/admin/create">

			
			<h3 class="text-center">Create Blogs</h3>

			@csrf

			<div class="form-group my-2">
				<label for="title" class="mb-1">Title</label>
				<input type="text" class="form-control" name="title" id="title">
			</div>
			<x-errorMessage name="title" />

			<div class="form-group my-2">
				<label for="slug" class="mb-1">Slug</label>
				<input type="text" class="form-control" name="slug" id="slug">
			</div>
			<x-errorMessage name="slug" />


			<div class="form-group my-2">
				<label for="category" class="mb-1">Category</label>
				<select class="form-select" name="category">
				  <option selected disabled>Select category</option>

				  @foreach($categories as $category)

				  <option value="{{$category->id}}">{{$category->name}}</option>

				  @endforeach

			
				</select>
			</div>

			<x-errorMessage name="category" />

			<div class="form-group">
				<label for="title" class="mb-1">Content</label>
				<textarea cols="40" rows="6" class="form-control" placeholder="Enter Content" name="body"></textarea>
			</div>
			<x-errorMessage name="body" />

			<button class="btn btn-primary" type="submit">Submit</button>

		</form>
	</section>
</x-adminLayout>


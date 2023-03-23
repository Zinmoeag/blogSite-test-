
<x-adminLayout>
	<section class="form">

		<form method="POST" action="/admin/create" enctype="multipart/form-data">

			
			<h3 class="text-center">Create Blogs</h3>

			@csrf


			<x-formInput name="title" type="text" />

			<x-formInput name="slug" type="text" />

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

			<x-formInput name="photo" type="file" />	

			<div class="form-group">
				<label for="body" class="mb-1">Content</label>

				<x-editor />


			</div>
			<x-errorMessage name="body" />

			<button class="btn btn-primary" type="submit">Submit</button>

		</form>
	</section>
</x-adminLayout>


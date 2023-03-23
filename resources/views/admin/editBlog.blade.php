<x-layout> 

	<div class="mt-4">
		<form action="/admin/blogs/up/{{$blog->id}}" method="POST" enctype="multipart/form-data" class="col-md-7 mx-auto my-4">

			@csrf
			@method("put")

			<x-drag-drop :blog="$blog" />

			<input type="file" name="photo" id="photo" hidden>


			<x-formInput type="text" name="title" value="{{$blog->title}}" />

			<x-formInput type="text" name="slug" value="{{$blog->slug}}" />

			<div class="form-group my-2">
				<label for="category" class="mb-1">Category</label>
				<select class="form-select" name="category">

				  @foreach($categories as $category)

				  @if($category->id === $blog->category_id)

				  	<option value="{{$category->id}}" selected>{{$category->name}}</option>

				  @else
				  	<option value="{{$category->id}}">{{$category->name}}</option>

				  @endif

				  @endforeach

				</select>
			</div>
			<x-errorMessage name="category" />

			<div class="form-group">
				<label for="body" class="mb-1">Content</label>
				
				<textarea cols="40" rows="6" class="form-control" id="summernote" placeholder="Enter Content" name="body">{{old('body') ? old('body') : $blog->body }}</textarea>
			</div>
			<x-errorMessage name="body" />

			<button class="btn btn-primary" type="submit">Submit</button>


		</form>	
	</div>

	<script src="/assets/js/drag_drop.js"></script>
	
</x-layout>


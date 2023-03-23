<x-adminLayout>
	<form action="/profile" method="POST" enctype="multipart/form-data">
		@csrf
		<section class="profile-info">
			<div class="user-img">
				<img src="{{$user->image}}" id="user-photo-preview"alt="">

						<label for="edit-photo">
							<div class="edit-user-img bg-primary">
									<i class="bi bi-pencil-square text-light"></i>
							</div>
						</label>
						
						<input type="file" name="edit-photo" id="edit-photo" class="form-control" hidden>

			</div>

			<x-errorMessage name="edit-photo" />

			<div class="d-flex d-grid position-relative">
			
				<button class="btn btn-outline-dark btn-sm my-3 justify-content-md-end"   type="button" onclick="copyLinkFeature(this)">Copy Link <i class="bi bi-link-45deg"></i></button>

	

			</div>

			<div class="bg-dark user-name ">
				<h5 class="text-center text-light" ><span id="name-display">{{$user->name}}</span> <button type="button" class="btn btn-outline-primary  btn-sm ms-2" id="name-edit-btn"><i class="bi bi-pencil-square"></i></button></h5>
				
			</div>
			<x-errorMessage name="name" />
		</section>

		<div class="hide" id="name-update-form">
			<section class="profile-info my-3 py-2 bg-dark">

				<div class="input-group col-md-12 px-3">
					<input type="text" class="name-edit-input form-control" name="name" id="name" value="{{$user->name}}">
					<button type="button" class="btn-primary btn rounded-0" id="update-name-btn">Update</button>
				</div>
				
			</section>
		</div>

		
		<section class="profile-info mt-4">
			<div class="Description col-md-11 my-2">

				<h5 class="my-2">Description</h5>

				<textarea cols="40" rows="5" class="form-control" name="description">{{$user->description ? $user->description : old('description') }}</textarea>
			</div>

			<x-errorMessage name="description" />
		</section>

		<button class="submit btn btn-primary btn-sm rounded-0 mt-4">Apply</button>
	</form>

	<hr>


	@can("admin")

	<section class="my-4">

		<h3 class="text-center mb-3">Your Blogs</h3>
		<x-blogs-table :blogs="$blogs" />
	</section>

	@endcan

	<script src="/assets/js/edit-photo.js"></script>
</x-adminLayout>


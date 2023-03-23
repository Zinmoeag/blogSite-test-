<x-layout>

	<section class="col-md-10 mx-auto mt-4">
		

		<section class="profile-info">
			<div class="user-img img-size">
				<img src="{{$user->image}}" id="user-photo-preview"alt="">
			</div>


			<div class="bg-dark user-name ">
				<h5 class="text-center text-light" ><span id="name-display">{{$user->name}}</span></h5>	
			</div>
		</section>

		@if($user->description)

		<section class="profile-info p-4 my-3 rounded-0">
			<h5 class="mb-4">DESCRIPTION</h5>

			<p>
				{{$user->description}}
			</p>
		</section>

		@endif

	</section>

	<hr>

	<section class="mt-3">
		<x-blogContainer :blogs='$blogs' action="profile/{{$user->id}}" />
	</section>



</x-layout>
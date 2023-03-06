@props(["name"])

@error($name)
	<p class="text-danger mx-4">{{$message}}</p>
@enderror

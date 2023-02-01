<x-layout>

	<section class="artist-container">
		<div class="artist-info">
			<img src="{{$artist->img_url}}">
			<h4>{{$artist->name}}</h4>
			<p>{{$artist->info}}</p>
		</div>
		
		<hr>

		@foreach($blogs as $blog)

		<div class="blog">
			<h2 class="blog-name">{{$blog->title}}</h2>
			<p>By - {{$blog->artist->name}}</p>
			<div class="tag"><a href="/category/{{$blog->category->slug}}">{{$blog->category->name}}</a></div>
			<p>{{$blog->body}}</p>
			<a href="/blogs/{{$blog->slug}}"><button>Read More</button></a>
			<hr>
		</div>

		@endforeach
	</section>
</x-layout>
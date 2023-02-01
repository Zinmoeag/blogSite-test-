<x-layout>

	@foreach($blogs as $blog)
	<section>
		<h2 class="blog-name">{{$blog->title}}</h2>
		<a href="/artist/{{$blog->artist->slug}}" class="art-name"><p>By - {{$blog->artist->name}}</p></a>	
		<div class="tag"><a href="/category/{{$blog->category->slug}}">{{$blog->category->name}}</a></div>
		<p>{{$blog->body}}</p>
		<a href="/blogs/{{$blog->slug}}"><button>Read More</button></a>
		
	</section>
	<hr>
	@endforeach


</x-layout>
<x-layout>

	<h2 class="blog-name">{{$blog->title}}</h2>
	<p>By - {{$blog->artist->name}}</p>
	<div class="tag"><a href="/category/{{$blog->category->slug}}">{{$blog->category->name}}</a></div>
	<p>{{$blog->body}}</p>
	<a href="/"><button>Menu</button></a>

</x-layout>
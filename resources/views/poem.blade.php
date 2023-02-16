<x-layout>

	<x-blogDisplayContent :blog="$blog" />

    <x-comments-secton />
    
    <x-subcribe />

    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />
</x-layout>
    
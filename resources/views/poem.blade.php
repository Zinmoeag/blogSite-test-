<x-layout>

	<x-blogDisplayContent :blog="$blog" />

    <x-comments-secton :comments="$comments" :blog="$blog" />

    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />
</x-layout>
    
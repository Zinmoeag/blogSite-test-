@props(['blog'])
<div class="upload_img col-md-10 drop-zone">

	<img src="/assets/default_pic/upload.png" class="icon" alt="">

	<img 
		src="{{$blog->photo !== 'https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg'? $blog->photo : null}}" 
		alt="" 
		class="prev-url">
</div>
<h5 class="mt-2">Update Photo</h5>
<hr>

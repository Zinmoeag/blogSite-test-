<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<div>
		<h1>Hello {{$user->name}},</h1>
		<p>You received new message form this "{{$blog->title}}".</p>
		<p>Here it is .....</p>
		<p><b>{{$comment}}</b></p>

	</div>
	
</body>
</html>
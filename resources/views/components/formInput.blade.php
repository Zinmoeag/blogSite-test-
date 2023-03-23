@props(["name","type","value"=>null])

<div class="form-group my-2">
				<label for="{{$name}}" class="mb-1">{{$name}}</label>
				<input type="{{$type}}" class="form-control" name="{{$name}}" id="{{$name}}" value="{{old($name)? old($name) : $value}}">
</div>
<x-errorMessage name="{{$name}}" />
 @props(["blog"])

<section class="col-md-11 mx-auto">

    <hr>
    <form action="/blogs/{{$blog->slug}}/comment" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" placeholder="Let's us know your opinion."  name = "comment" rows="4" cols="30"></textarea>

            <x-errorMessage name="comment" />

        </div>

        <div class="d-flex justify-content-end my-3">
            <button class="btn btn-primary btn-sm rounded-0" type="submit">Submit</button>
        </div>
        
    </form>
</section>
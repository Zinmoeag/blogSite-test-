  @props(["blog"])

 <div class="card">
            <div class="img-container">
                <img
                  src="{{$blog->photo}}"
                  class="card-img-top"
                  alt="..."
                />
            </div>
            
            <div class="card-body">
              <h3 class="card-title">{{substr($blog->title,0,35)}} ...</h3>
              <p class="fs-6 text-secondary">
                <a href="/profile/{{$blog->artist->id}}">{{$blog->artist->name }}</a>
                <span> - {{$blog->created_at->diffForHumans()}}</span>
              </p>
              <div class="tags my-3">
                <span class="badge bg-primary"><a class="text-light" href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></span>
              </div>
              <p class="card-text blog-title">
                 {!!substr((strip_tags($blog->body)),0,150)!!} ...
              </p>
              <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
            </div>
</div>
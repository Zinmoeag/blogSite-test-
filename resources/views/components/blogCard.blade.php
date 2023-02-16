  @props(["blog"])

 <div class="card">
            <img
              src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h3 class="card-title">{{substr($blog->title,0,35)}} ...</h3>
              <p class="fs-6 text-secondary">
                <a href="/artist?artist-Blog={{$blog->artist->slug}}{{request('category')? '&category='.request('category') : ''}}">{{$blog->artist->name}}</a>
                <span> - {{$blog->created_at->diffForHumans()}}</span>
              </p>
              <div class="tags my-3">
                <span class="badge bg-primary"><a class="text-light" href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></span>
              </div>
              <p class="card-text">
                  {{substr($blog->body,0,100)}} ...
              </p>
              <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
            </div>
</div>
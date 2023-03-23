@props(["blog"])



    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
           <img
              src="{{$blog->photo}}"
              class="card-img-top"
              alt="..."
            />
          <h3 class="my-3">{{$blog->title}}</h3>

          @if(auth()->check())

            <div class='subscribe'>

              <form action="/blogs/{{$blog->slug}}/subscribe" method="POST">
                  @csrf
                  @if(auth()->user()->isSubscribed($blog))
                    
                    <button class="btn btn-danger btn-sm" type="submit">UnSubscribe</button>
                  @else
                    <button class="btn btn-primary btn-sm" type="submit">Subscribe</button>
                  @endif
              </form>
              
            </div>
          @endif
          
          <div class="tags my-3">
          	<span class="badge bg-warning text-dark">
          		{{$blog->category->name}}
          	</span>
          </div>
          <p>By - {{$blog->artist->name}}</p>
          <p class="lh-md">
           {!!$blog->body!!}
          </p>
        </div>
      </div>
    </div>
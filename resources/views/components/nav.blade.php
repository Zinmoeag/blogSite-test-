  <!--navbar -->
    <nav class="navbar navbar-dark bg-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">


         


          <a href="/" class="nav-link">Home</a>
          <a href="/#blogs" class="nav-link">Blogs</a>

          @if(auth()->check())

          
          <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-link nav-link">
                  Logout
              </button>
          </form>


          @else
          <!-- login -->

          <a href="/register" class="nav-link">Register</a>
          <a href="/login" class="nav-link">Login</a>


          @endif


          @if(auth()->check())

            <a href="/profile/{{auth()->id()}}" class="nav-link text-light">
              <img src="{{auth()->user()->image}}" alt="" class="user-pic-icon">
            </a>

          @endif

        </div>
      </div>
    </nav>
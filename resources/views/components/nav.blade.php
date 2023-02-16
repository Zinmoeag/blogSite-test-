  <!--navbar -->
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">

          <a href="" class="nav-link text-light">{{auth()->user()?->name}}</a>
          <a href="/" class="nav-link">Home</a>
          <a href="/#blogs" class="nav-link">Blogs</a>
          <a href="#subscribe" class="nav-link">Subscribe</a>

          <!-- login -->

          <a href="/register" class="nav-link">Register</a>
          <a href="/login" class="nav-link">Login</a>


          <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-link nav-link">
                  Logout
              </button>
          </form>

        </div>
      </div>
    </nav>
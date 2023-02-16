<div class="dropdown">
          <button class="dropdown-toggle btn btn-outline-primary btn-sm" data-bs-toggle="dropdown"> 
              {{$categoryDisplay ? $categoryDisplay->name : "filter By category"}}
          </button>
          <ul class="dropdown-menu">

            @foreach($categories as $category)
            <li>
              <a 
              href="/?category={{$category->slug}}{{request('search')? '&search='.request('search') : ''}}" 
              class="dropdown-item">
              {{$category->name}}
              </a></li>
            @endforeach
          </ul>
</div>
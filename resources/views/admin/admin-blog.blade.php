<x-adminLayout>

    <div class="row">

        <div class="col-md-10">
          <x-blogSeacher action="admin/blogs" />
        </div>


        <div class="col-md-2 my-3">
           <form action="/admin/blogs" method="GET">

            @if(request("sort")==="asc")
             <button type="submit" class="btn btn-primary" name="sort" value="desc">Sort <i class="bi bi-arrow-down-up"></i></button>

            @else
             <button type="submit" class="btn btn-outline-primary" name="sort" value="asc">Sort <i class="bi bi-arrow-down-up"></i></button>
            @endif


            @if(request("search"))
              <input type="hidden" value="{{request('search')}}" name="search">
            @endif
           </form>
        </div>

    </div>

    <x-blogs-table :blogs="$blogs" />

</x-adminLayout>




 <!-- blogs section -->
   @props(["blogs","action"=>""])
    <section class="container text-center" id="blogs">
      <h1 class="display-5 fw-bold mb-4">

       Blogs

      </h1>
      <div class="">

        <!-- blogDropdown  -->
        <x-category-dropdown action="{{$action}}" />

         <x-blogSeacher action="{{$action}}" />
      </div> 

   

      <div class="row">
        @forelse($blogs as $blog)
          <div class="col-md-4 mb-4">
           	<x-blogCard :blog="$blog"/>
          </div>

        @empty
          <p class="text-secondary">There is no Blog</p>
          <hr>
        @endforelse

        {{$blogs->links()}}

      </div>
    </section>
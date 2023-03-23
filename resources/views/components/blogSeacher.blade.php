  @props(["action"])
  <form 
  action="/{{$action}}"
  method="GET" 
  class="my-3">
        <div class="input-group mb-3">
          <input
            name="search"
            value = "{{Request(['search'])['search'] ?? null}}"
            type="text"
            autocomplete="false"
            class="form-control"
            placeholder="Search Blogs..."
          />

          @if(request('category'))
             <input type="hidden" name="category" value="{{request('category')}}">
          @endif

          @if(request('sort'))
              <input type="hidden" name="sort" value="{{request('sort')}}">
          @endif

         
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
          Search        
          </button>
        </div>
      </form>

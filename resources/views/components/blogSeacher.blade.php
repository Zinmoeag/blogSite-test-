
  <form 
  action="/"
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
          <button
            class="input-group-text bg-primary text-light"
            id="basic-addon2"
            type="submit"
          >
          Search        
          </button>
        </div>
      </form>

  <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col" width="40px">Id</th>
          <th scope="col" width="250px">Blog Title</th>
          <th scope="col">Category</th>
          <th scope="col">Artist</th>
          <th scope="col" width="150px">controlls</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">



        @forelse($blogs as $blog)
        <tr>
          <th scope="row">{{$blog->id}}</th>
          <td>{{$blog->title}}</td>
          <td>{{$blog->category->name}}</td>
          <td>{{$blog->artist->name === auth()->user()->name ? "You" : $blog->artist->name }}</td>
          <td class="d-flex">

            <form action="/admin/blogs/up/{{$blog->id}}" method="GET" class="mx-1">
                <button type="submit" class="btn btn-sm btn-outline-dark"><i class="bi bi-pen"></i></button>
            </form>
           
             

            <form action="/admin/blogs/{{$blog->id}}" method="POST" class="mx-1">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
            </form>
            

            <a href="/blogs/{{$blog->slug}}" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></a>
            
          </td>
        </tr>

        @empty
          <td  colspan ="5" class="alert alert-danger text-danger alert-sm text-center">There is no Blogs</td>
        @endforelse

      </tbody>
    </table>
    
    {{$blogs->links()}}
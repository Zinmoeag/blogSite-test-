<x-adminLayout>
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col" width="40px">Id</th>
          <th scope="col" width="250px">Blog Title</th>
          <th scope="col">Category</th>
          <th scope="col">Artist</th>
          <th scope="col" width="100px">Controlls</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">

        @foreach($blogs as $blog)
        <tr>
          <th scope="row">{{$blog->id}}</th>
          <td>{{$blog->title}}</td>
          <td>{{$blog->category->name}}</td>
          <td>{{$blog->artist->name}}</td>
          <td>
            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
            <button type="submit" class="btn btn-sm btn-outline-dark"><i class="bi bi-pen"></i></button>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

    {{$blogs->links()}}
</x-adminLayout>



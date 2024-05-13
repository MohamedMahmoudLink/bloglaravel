@extends("layout.layout")

@section("title")

info
@endsection

@section("titlesite")

Category Of Posts
<hr>
    
@endsection



@section("content")


<div class="container">
    <div class="row">
        <div class="col-12">

            @can("admin_create")
                <div class="d-flex">

                    <a href="{{route("Category.create") }}" class="btn btn-dark">Create!</a>
                </div>
          
            @endcan
        
            <div class="card mt-5">
                @if ($category->count() > 0)
                <table class="table">
                    <thead>
                      <tr>
                     
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                 @foreach ($category as $cate )
                 <tr>
                    <th scope="row">{{ $cate->id }}</th>
                    <td>{{ $cate->name }}</td>
                    <td>{{ $cate->Description}}</td>
                    <td>     
                        <a href="{{ route('Category.show', $cate->id) }}" class="btn btn-warning">View</a>
                  
                    </td>
                </td>

@can("admin_edit",$cate)
<td>     
    <a href="{{ route('Category.edit', $cate->id) }}" class="btn btn-primary">Edit</a>

</td> 
@endcan
            @can("admin_delete",$cate)
            <td>   
                    
                  
                <form class="delete-btn" action="{{ route('Category.destroy', $cate->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                </form>
                                      </td>
            @endcan




                  </tr>
                 @endforeach
                   
                    </tbody>
                  </table>
                  @else
                  <p class="text-center mt-4 fs-5  w75 alert alert-warning">No Category available. !</p>
                 
              @endif
                </div>
              </div>
  
        </div>
    

    

    </div>
</div>
@endsection
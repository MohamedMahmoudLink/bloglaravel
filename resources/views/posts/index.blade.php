@extends("layout.layout")

@section("title")

Laravel Test
@endsection

@section("titlesite")

Blog Title
    
@endsection



@section("content")
<div class="container">
    <div class="row">
        <div class="col-4"></div>
   
      
        @if (  $posts->count() > 0)
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">view</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                        
                 
                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $posts as $post )

                    <tr>
                        <th scope="row">{{ $post->id }}
                        </th>
                        <td>{{ $post->title }}
                        </td>
                        <td>{{ $post->body }}
                        </td>
                        @if (isset($post->category->name))
                        <td> <a class=" fs-5 text-dark fw-medium " href="{{ route("Category.show",$post->category->id) }}">{{ $post->category->name}}</a>
                        </td> 
                        @else
                        <td> <p class="text-danger fw-bold">Not Found 404</p> 
                        </td>   
                        @endif
                        @if (isset($post->user) )
                        <td> <p class="fw-bold"> <a href="{{route("user",$post->user->id) }}">{{  $post->user->name }}</a> </p>
                        </td>  
                        @else
                        <td> <p class="fw-bold text-danger">No Author</p>
                        </td>
                        @endif
                      
                      
                            <td>     
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-warning ">View</a>
                          
                            </td>
                        </td>
                        @can("post_update",$post)
                        <td>     
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                      
                        </td>
                        @endcan
                    
                            
                            @can("post_delete",$post)
                            <td> 
                               
                            <form class="delete-btn" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                            </form>         
                                     
            
                                          </td>
                            @endcan
            
                      
                    
                    
                      </tr>
                    @endforeach ()
                        
                    @else
                    <p class="text-center mt-4 fs-5  w75 alert alert-warning">No posts available. !</p>
                   
                @endif
               
              
            
                </tbody>
              </table>
            


            
        </div>
    


    </div>
</div>
<style>
    .page-item.active .page-link{

        background-color: rgb(0, 0, 0);
        border: none;
        color: white;
        font-weight: bold
    }

    .page-link{

        color: rgb(82, 82, 82)
    }
</style>

<div class="d-flex justify-content-center mt-4">
 
    {{ $posts->links()  }} 
</div>






<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
  
        const deleteForm = document.querySelectorAll('.delete-btn');

        // Add event listener for form submission
        deleteForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    deleteForm.submit();
                }
            });
        });
    });
</script>

@endsection


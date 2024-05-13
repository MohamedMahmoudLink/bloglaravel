@extends("layout.layout")

@section("title")

info
@endsection

@section("titlesite")

User Profile
    
@endsection



@section("content")

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5">
                <h5 class="card-header">Info</h5>
                <div class="card-body">
                  <h5 class="card-title">{{ $user->name }}</h5>
                  <p class="card-text">{{ $user->email}}</p>
                  <p class="card-text text-success fw-bold fs-5">Role  :
     
                    
                    
                    {{ $user->role}} 
                    @if ( $user->role != "admin")
                    <i class="fa-solid fa-user"></i>

                    @else
                    <i class="fa-solid fa-crown"></i>
                    @endif
                  
                  
                  </p>
                  @can('update-user', $user)
                  <a href="{{ route("user.edit",$user->id) }}" class="btn btn-info">Edit</a>

                  @endcan
                  <a href="{{ route("posts.index") }}" class="btn btn-dark">Back</a>
                </div>
              </div>
  
        </div>
       

  
        <div class="col-3  border border-1 mt-5 border-secondary">

          <p class="mt-5 text-primary fs-4 fw-bold m-2">My Post</p>

      
           
          <ol>

           
       
              
         


            @forelse ( $userPosts as $posts )
            <li style="color: rgb(12, 129, 238) !important;">
            
              <a style="color: rgba(191, 49, 113, 0.878) !important;" href="{{ route('posts.show', $posts->id) }}" class="text-decoration-none text-dark fs-6 fw-bold">
                
                
                
                
                {{ $posts->title }}</a>

            
            
            
            </li>

            @empty
<p class="text-center fw-bold mt-4">No Post Found :(</p>

            @endforelse
          </ol> 

      
       
          
        </div>
      </div>



 
</div>
@endsection
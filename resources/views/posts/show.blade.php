@extends("layout.layout")

@section("title")

info
@endsection

@section("titlesite")

Post Deatils
    
@endsection



@section("content")

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5">
                <h5 class="card-header">Info</h5>
                <div class="card-body">
                  <h5 class="card-title"> Title : {{ $post->title }}</h5>
                  <p class="card-text">Body : {{ $post->body}}</p>

                  <a href="{{ route("posts.index") }}" class="btn btn-dark">Back</a>
                </div>
              </div>
  
        </div>

    

    </div>
</div>

<div>

  <div class="row d-flex justify-content-center mt-100 mb-100 mt-2">
    <div class="col-lg-6">
      <div>
        <form action="{{ route('comments.store') }}" method="POST">
@csrf
        <p class="text-center mt-2 fw-bold fs-4">Add Comment</p>
        <div class="d-flex justify-content-center">
          <input type="hidden" name="post_id" value="{{ $post->id }}"> <!-- Assuming you have $post available in your view -->

          <input type="text" name="content" placeholder="Add Your Comment" class="form-control">
          <input type="submit"  value="comment" class="btn btn-success m-1 mt-2" name="" id="">

        </div>
        </form>
      </div>
        <div class="card mt-2">
            <div class="card-body text-center">
                <h4 class="card-title">Latest Comments</h4>
            </div>
            @foreach ( $commentsz as  $comment)
            <div class="comment-widgets">
           
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="comment-text w-100 m-3">
                    
                    
                  
                        <h6 class="font-medium">Name  :<span class="fw-bold">  {{ $comment->user->name }}</span> </h6> 
                        <hr><span class="m-b-15 d-block">  {{ $comment->content}} </span>
                        <div class="comment-footer"> <span class="text-muted float-right">{{ $comment->created_at }}</span> 
              
                           
                           <button type="button" class="btn btn-danger btn-sm">Delete</button> </div>
                    </div>
                </div> 
                <hr>
            </div> 
            @endforeach
     
        </div>

        <div class="d-flex justify-content-center mt-4">
 
          {{ $commentsz->links()  }} 
      </div>
    </div>
</div>
</div>
@endsection
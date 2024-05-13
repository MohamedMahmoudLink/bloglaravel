@extends("layout.layout")

@section("title")

Laravel Test
@endsection

@section("titlesite")

Edit
    
@endsection



@section("content")



  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-6">


       <form action="{{ route("posts.update",$post->id)}}" method="POST">

@csrf
@method("PUT")

        <div class="mb-3">
            <p  class="form-label text-center fw-bold">Title</p>
            <input name="title" value="{{ $post->title }}" type="text" class="form-control ">
          </div>
      
          <div class="mb-3">
            <p  class="form-label text-center fw-bold">Body</p>
              <input name="body" value="{{ $post->body }}"   type="text" class="form-control" >
            </div>
 <div class="d-flex justify-content-center">

  <button type="submit" style="background-color: rgba(91, 91, 234, 0.956)" class="btn btn-primary border-none fw-bold shadow-sm">Submit</button>



 </div>
       </form>
       </div>
    </div>
  </div>
    
@endsection


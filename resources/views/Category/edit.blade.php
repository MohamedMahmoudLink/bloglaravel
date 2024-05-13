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


       <form action="{{ route("Category.update",$Category->id)}}" method="POST">

@csrf
@method("PUT")

        <div class="mb-3">
            <p  class="form-label text-center fw-bold">Name</p>
            <input name="name" value="{{ $Category->name }}" type="text" class="form-control ">
          </div>
      
          <div class="mb-3">
            <p  class="form-label text-center fw-bold">Description</p>
              <input name="Description" value="{{ $Category->Description }}"   type="text" class="form-control" >
            </div>
 <div class="d-flex justify-content-center">

  <button type="submit" style="background-color: rgba(91, 91, 234, 0.956)" class="btn btn-primary border-none fw-bold shadow-sm">Submit</button>



 </div>
       </form>
       </div>
    </div>
  </div>
    
@endsection


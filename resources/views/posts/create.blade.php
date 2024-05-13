@extends("layout.layout")

@section("title")

Laravel Test
@endsection

@section("titlesite")

Welcome Test App
    
@endsection



@section("content")



  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-6">

     
       <form id="postForm" action="{{ route("posts.store")}}" method="POST">

@csrf

        <div class="mb-3">
            <p  class="form-label text-center fw-bold">Title</p>
            <input name="title" value="{{ old("title") }}" type="text" class="form-control ">
            @error("title")
            <p class="alert alert-danger mt-1">{{ $message }}</p>
              
            @enderror
          </div>

            
      
          <div class="mb-3">
            <p  class="form-label text-center fw-bold">Body</p>
              <input name="body" value="{{ old("body") }}"  type="text" class="form-control" >
              @error("body")
              <p class="alert alert-danger mt-1">{{ $message }}</p>
                
              @enderror
            </div>
@if (isset($cate))
<div class="mb-3">
  <p  class="form-label text-center fw-bold">Category</p>
    <select name="category_id" class="form-select" id="">
     
      @foreach ($cate as $cates )
    
      <option value="{{ $cates->id }}">{{ $cates->name }}</option> 
      @endforeach
     
  
    </select>
  </div>

@endif
          

 <div class="d-flex justify-content-center">



  <button id="submitBtn" type="submit" style="backgr
  ound-color: rgba(91, 91, 234, 0.956)" class="btn btn-primary border-none fw-bold shadow-sm">Submit</button>




 </div>
       </form>

 
       </div>
    </div>
  </div>
    
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const postForm = document.getElementById('postForm');
      const submitBtn = document.getElementById('submitBtn');

      submitBtn.addEventListener('click', function (event) {
          event.preventDefault(); // Prevent default form submission

          Swal.fire({
              title: 'Confirm Submission',
              text: 'Are you sure you want to submit this form?',
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, submit!'
          }).then((result) => {
              if (result.isConfirmed) {
               
                  postForm.submit();
              }
          });
      });
  });
</script>
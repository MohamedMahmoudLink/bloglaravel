@extends("layout.layout")

@section("title")

Laravel Test
@endsection

@section("titlesite")

Add New Category
    
@endsection



@section("content")



  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-6">


       <form id="postForm" action="{{ route("Category.store")}}" method="POST">

@csrf

        <div class="mb-3">
            <p  class="form-label text-center fw-bold">Name</p>
            <input name="name" type="text" class="form-control ">
          </div>
      
          <div class="mb-3">
            <p  class="form-label text-center fw-bold">Description </p>
              <input name="Description"  type="text" class="form-control" >
            </div>
 <div class="d-flex justify-content-center">



  <button id="submitBtn" type="submit" style="backgr
  ound-color: rgba(91, 91, 234, 0.956)" class="btn btn-primary border-none fw-bold shadow-sm">Submit</button>




 </div>
       </form>

       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
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
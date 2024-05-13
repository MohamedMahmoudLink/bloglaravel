@extends("layout.layout")

@section("title")

info
@endsection

@section("titlesite")

Category details
    
@endsection



@section("content")

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5">
                <h5 class="card-header">Deatils</h5>
                <div class="card-body">
                  <h5 class="card-title">{{ $Category->name }}</h5>
                  <p class="card-text">{{ $Category->Description}}</p>
    <p class="fw-bold">Posts :</p>             
<ul>
  @foreach ($Category->posts  as $post )
  <li> <a href="{{ route("posts.show", $post->id) }}">{{ $post->title}}</a></li>
  @endforeach


</ul>
<p class="fw-bold">Count : <span class="text-primary fs-4">{{ $count }}</span> </p>
                  <a href="{{ route("Category.index") }}" class="btn btn-dark">Back</a>
                </div>
              </div>
  
        </div>
        <div class="col-6">

     
        </div>
    

    </div>
</div>
@endsection
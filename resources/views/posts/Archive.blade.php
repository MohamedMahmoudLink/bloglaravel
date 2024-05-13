@extends("layout.layout")
@section("title")

Laravel Archive
@endsection

@section("titlesite")

Archive
    
@endsection
@section("content")
@can("view")
<a href="{{ route("Archivecate")}}" class="btn btn-danger">ArchiveCategory</a>

@endcan
@if (isset($softs) && $softs->count() > 0)

       

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">body</th>
        <th scope="col">Restore</th>
        <th scope="col">Danger</th>
      </tr>
    </thead>
    <tbody>
        
        @foreach ($softs as $soft )
      <tr>

        @can("restoree",$soft)
        <th scope="row">{{ $soft->id }}</th>
        <td>{{ $soft->title }}</td>
        <td>{{ $soft->body }}</td>


        <td>     
          <a href="{{ route('posts.restore', $soft->id) }}" class="btn btn-primary">Restore</a>
    
      </td>
      
      <td>     
        <form method="POST" action="{{ route('PostForceDelete', $soft->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Force Delete</button>
        </form>
    </td>
      
 
        @endcan
       
      </tr>
      @endforeach  
    </tbody>
  </table>

@else
    <p class="text-center mt-4 fs-4 text-success">No Posts Deleted !</p>


@endif
@endsection

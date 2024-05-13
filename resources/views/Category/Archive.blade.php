@extends("layout.layout")
@section("title")

Laravel Archive
@endsection

@section("titlesite")

Archive
    
@endsection
@section("content")

@if (isset($softscat) && $softscat->count() > 0)

       

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Restore</th>
        <th scope="col">Danger</th>
      </tr>
    </thead>
    <tbody>
    
        
        @foreach ($softscat as $cate )
      <tr>
        <th scope="row">{{ $cate->id }}</th>
        <td>{{ $cate->name }}</td>
        <td>{{ $cate->Description }}</td>
        <td>     
            <a href="{{ route('category.restore', $cate->id) }}" class="btn btn-primary">Restore</a>
      
        </td>
        <td>     
            <form method="POST" action="{{ route('ForceDelete', $cate->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Force Delete</button>
            </form>
        </td>
      </tr>
      @endforeach  
    </tbody>
  </table>

@else
    <p class="text-center mt-4 fs-4 text-success">No Category Deleted !</p>


@endif
@endsection

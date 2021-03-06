@extends('layouts.admin')
    
  @section('content')
    <div class="row">
        <h1 >List of Category</h1>     
    </div>
    @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
      @endif
    <div class="row">
    <div>
        <a style="margin: 19px;" href="{{ route('categories.create')}}" class="btn btn-primary">New category</a>
        </div> 
      <table style="text-align: center" class="table table-bordered tbClone" cellspacing="0" cellpadding="0">     
            <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Category Slug</th>
              <th>Category Parent Id</th>
              <th>Action</th>             
            </tr>
            @foreach($cates as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->cate_name }}</td>
                <td>{{ $item->cate_slug }}</td>
                <td>{{ $item->cate_parent }}</td>
                <td style="text-align: center">
                    <a href="{{ route('categories.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', $item->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @if(count($item->childs))
              @include('admin.categories.index_child', ['childs' => $item->childs])
            @endif
            @endforeach            
      </table>
    </div>
  @endsection
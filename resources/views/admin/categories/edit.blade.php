
    @extends('layouts.admin')
    
    @section('content')
    <div class="row">
     <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edit  Category</h1>
      <div>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
          <br/>
        @endif
        <form method="post" action="{{ route('categories.update', $category->id) }}" class="form-horizontal clearfix f" files="true">
              @csrf
              @method('PATCH')
              @include ('admin.categories.form', ['formMode' => 'edit'])  
          </form>                                  
      </div>
    </div>
    </div>
    @endsection
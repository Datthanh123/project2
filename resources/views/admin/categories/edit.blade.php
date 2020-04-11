
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
        <!-- {!! Form::open(['url' => "{{ route('categories.store') }}",'method' => 'post' , 'class' => 'form-horizontal clearfix f','files' => true]) !!}
          @include ('admin.categories.form', ['formMode' => 'create']) 
          {!! Form::close() !!}  -->
          <form method="put" action="{{ route('categories.update', $category->id) }}" class="form-horizontal clearfix f" files="true">
              @csrf
              @include ('admin.categories.form', ['formMode' => 'edit'])  
          </form>                                    
      </div>
    </div>
    </div>
    @endsection
@extends('layouts.admin')
    
    @section('content')
    <div class="row">
     <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add  Category</h1>
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
 
          <form method="post" action="{{ route('newscategories.store') }}" class="form-horizontal clearfix f" files="true">
              @csrf
              @include ('admin.newscategories.form', ['formMode' => 'create'])  
          </form>                                    
      </div>
    </div>
    </div>
    @endsection
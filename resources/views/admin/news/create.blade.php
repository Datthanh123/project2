@extends('layouts.admin')
    
    @section('content')
      <ol class="breadcrumb">
        <li>
          <a href="/admin/news"><i class="fa fa-cube"> Danh sach tin</i></a>
        </li>
        &nbsp;&nbsp;
        <li class="active">
        <i class="fa fa-plus">Them Tin</i>
        </li>
      </ol>
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
          <form method="post" action="{{ route('news.store') }}" class="form-horizontal clearfix f" files="true">
              @csrf
              @include ('admin.news.form', ['formMode' => 'create'])  
          </form> 
             
                                            
    @endsection
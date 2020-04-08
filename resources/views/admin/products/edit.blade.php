@extends('layouts.admin')
    
    @section('content')
      <ol class="breadcrumb">
        <li>
          <a href="/admin/products"><i class="fa fa-cube"> Danh sach san pham</i></a>
        </li>&nbsp;&nbsp;
        <li class="active"><i class="fa fa-plus">Them San pham</i></li>
      </ol>
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
          {!! Form::model($product,[
          'method' => 'PATCH',
          'url' => ['/admin/products',$product->id],
          'class' => 'f',
          'files' => true
          ]) !!}
          @include('admin.products.form', ['formMode' => 'edit']) 
    @endsection
@extends('layouts.admin')
    
    @section('content')
    <div class="row">
		<div class="col-sm-12">
			<h1 class="display-3">List of Product</h1>
			<div>
				<a href="{{ url('/admin/products/create') }}" class="btn btn-success btn-sm" title=" Add New Page" >
					<i class="fa fa-plus" aria-hidden="true"></i>Add New Product
				</a>

					{!! Form::open (['method' => 'GET', 'url' => '/admin/products', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' =>'search']) !!}
					<div class="input-group">
						<input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search...">
						<span class="input-group-append">
							<button class="btn btn-secondary" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
    {!! Form::close() !!}
    <br/>
    <br/>
    <div class="table-responsive">
    	<table class="table table-borderless">
    		<thead>
    			<tr>
    				<th>ID</th><th>Product Code</th><th>Product Name</th><th>Price</th><th>Image</th><th>Category</th><th>Actions</th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach($products as $item)
    			<tr>
    			<td>{{$item->id}}</td>
    			<td>{{$item->product_code}}</td>
    			<td>{{$item->product_name}}</td>
    			<td>{{$item->product_price}}</td>
    			<td><img src="{{ asset('Upload/Products/'.$item->product_image) }}" width="100"/></td>
    			<td>{{ $item->categories->cate_name }}</td>
    			<td><a href="{{ url('/admin/products/'. $item->id . '/edit') }}" title="Edit Page">
    				<button class="btn btn-info btn-sm" >Edit</button></a>
                  

				

				<form action="{{ route('products.destroy', $item->id)}}" method="post" style="display:inline;"  >
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
    			</td>
    		</tr>
    			@endforeach
    		</tbody>
    	</table>
    	<div class="pagination-wrapper">
			{!! $products->appends(['search' => Request::get('search')])->render() !!}
    	
        </div>
		</div>
		</div>		
	</div>
    @endsection
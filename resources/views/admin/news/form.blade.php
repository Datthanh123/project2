<style>
.f{width: 50%;padding: 5px;}
li{list-style-type: none}
label{width: 20%}
.tb{width: 50%;padding: 5px;}
</style>
<div>
	<ul>
		<li>
			<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('news_cate', 'Danh muc tin', ['class' => 'required']) !!}
				{{ Form::select('news_cate', $cates, null,['placeholder' => ' - Danh muc san pham -', 'class' => 'f tb']) }}
				{!! $errors->first('name', '<p class="help-block">:message</p> ') !!}
			</div>
		</li>
		<li>
			<div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('news_title', 'Tieu De', ['class' => 'required']) !!}
				{!! Form::text('news_title', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
				{!! $errors->first('name','<p class="help-block">:message</p>') !!}
			</div>
		</li>
		<li>
			<div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('news_tease', 'Mo ta ngan gon', ['class' => 'required']) !!}
				{!! Form::textarea('news_tease', null, ['class' => 'form-control description']) !!}
				{!! $errors->first('name','<p class="help-block">:message</p>') !!}
			</div>
		</li>
		<li>
			<div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('news_content', 'Noi Dung', ['class' => 'required']) !!}
				{!! Form::textarea('news_content', null,['id' => 'editor1'], ('required' == 'required') ? ['class' =>'form-control description'] : ['class' => 'form-control']) !!}
				{!! $errors->first('name','<p class="help-block">:message</p>') !!}
			</div>
		</li>
       
		<li>
			<div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('news_author','Tac gia',['class' => 'required']) !!}
				{!! Form::text('news_author', null,('required' == 'required') ? ['class' =>'f', 'required' => 'required'] : ['class' => 'f']) !!}
				{!! $errors->first('name','<p class="help-block">:message</p>') !!}
			</div>
		</li>	
		<li>
			<div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('news_views','So luot xem',['class' => 'required']) !!}
				{!! Form::text('news_views', null,('required' == 'required') ? ['class' =>'f', 'required' => 'required'] : ['class' => 'f']) !!}
				{!! $errors->first('name','<p class="help-block">:message</p>') !!}
			</div>
		</li>

		<li>
	    	{!! Form::submit($formMode === 'edit' ? 'update' : 'create', ['class' => 'btn btn-primary']) !!}
	    </li>
	</ul>
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
tinymce.init({
	selector: 'textarea.description',
	width: 1000,
	height: 300,
});
</script>
<div class="wrapper container-fluid">
	  {!! Form::open(['url'=>route('pagesAdd'), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data'])  !!}

	
	<!-- sarum enq formaner HTML&FORM collerctiv ov -->
	<div class="form-group">
	  	{!! Form::label('name','название',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			<!-- Form::text() = <input type="text"> -->
			{!! Form::text('name', old('name'),['class' => 'form-control', 'placeholder'=>'Введите название страницы']) !!}
		</div>
	</div>

	<div class="form-group">
	  	{!! Form::label('alias','Псевдоним:',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			<!-- Form::text() = <input type="text"> -->
			{!! Form::text('alias', old('alias'),['class' => 'form-control', 'placeholder'=>'Введите название страницы']) !!}
		</div>
	</div>

     <div class="form-group">
	  	{!! Form::label('text','Текст',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			<!-- Form::textarea() = <textarea >  
			petqa id-n tanq editor  'id' => 'editor' vor
			 karoxanank ashxatel CKEDITORI het -->
			{!! Form::textarea('text', old('text'),['id' => 'editor', 'placeholder'=>'Введите text']) !!}
		</div>
	</div>                  


	<div class="form-group">
	  	{!! Form::label('images','Изображение',['class' => 'col-xs-2 control-label']) !!}
		<div class="col-xs-8">
			<!-- Form::file() grum enk fail kcelu hamar  -->
			{!! Form::file('images',['class' => 'filestyle', 'data-buttonText'=>'Выберите изображение', 'data-buttonName'=>"btn-primary", 'data-placeholder'=>"Файла нет"]) !!}
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10">
			<!-- Form::button() = <button type="submit"> -->
			{!! Form::button('Соxранить',['class' => 'btn btn-primary', 'type'=>'submit']) !!}
		</div>
	</div>


      {!! Form::close()  !!}



      <script>
      	// grumenk vor ashxati CKEDITOR@
      	 CKEDITOR.replace('editor');
      </script>

</div>
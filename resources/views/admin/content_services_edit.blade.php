<div class="wrapper container-fluid">
	{!! Form::open(['url'=>route('serviceEdit',array('service'=>$service['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
	     {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::text('name', $service['name'], ['class' => 'form-control','placeholder'=>'Введите название сервиса']) !!}
		 </div>
    </div>
   
    
    <div class="form-group">
	     {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::textarea('text', $service['text'], ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст сервиса']) !!}
		 </div>
    </div>
    
    <div class="form-group">
    	{!! Form::label('old_icon', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
    	<div class="col-xs-offset-2 col-xs-10">
			{!! Html::image('assets/img/'.$service['icon'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
			{!! Form::hidden('old_icon', $service['icon']) !!}
    	</div>
    </div>
    
    <div class="form-group">
	     {!! Form::label('icon', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::file('icon', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
		 </div>
    </div>
    

    
      <div class="form-group">
	    <div class="col-xs-offset-2 col-xs-10">
	      {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
	    </div>
	  </div>
    
{!! Form::close() !!}

 <script>
	// CKEDITOR.replace( 'editor' );
</script>
</div>

</div>
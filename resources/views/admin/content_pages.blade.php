<div style="margin:0px 50px 0px 50px;">   
 
@if($pages)

	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th>Текст</th>
                <th>Дата создания</th>
                
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pages as $k=>$page)

            <tr>

                <td>{{ $page->id }}</td>
                <!--   nuyn banna
                 <a href="{{route('pagesEdit',array('page'=>$page->id))}}">$page->name</a> 
                 <a href="land.loc/admin/pages/edit/1">home</a>
                 sarquma patrasti hxum routov
                  -->
                <td>{!! Html::link(route('pagesEdit',['page'=>$page->id]),$page->name) !!}</td>
                <td>{{ $page->alias }}</td>
                <td>{{ $page->text }}</td>
                <td>{{ $page->created_at }}</td>
                <td>
                    {!! Form::open(['url'=>route('pagesEdit', ['page'=>$page->id]), 'class' => 'form-horizontal', 'method' => 'POST'])  !!}
                    
                    <!-- ete grum enq  {{ method_field('DELETE') }} inq! xrguma delete zapros
                    <input type="hidden" name="_method" value="DELETE">
                    -->
                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                    {!! Form::close()  !!}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
{!! Html::link(route('pagesAdd'),'Новая страница') !!}
@endif
</div>
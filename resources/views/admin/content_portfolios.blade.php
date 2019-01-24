<div style="margin:0px 50px 0px 50px;">   
 
@if($portfolios)

	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Фильтер</th>
                <th>images</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        @foreach($portfolios as $portfolio)

            <tr>

                <td>{{ $portfolio->id }}</td>
                <td>{!! Html::link(route('portfolioEdit',['portfolio'=>$portfolio->id]),$portfolio->name) !!}</td>
                <td>{{ $portfolio->filter }}</td>
                 <td>{!! Html::image('assets/img/'.$portfolio->images) !!}</td>
                <td>
                    {!! Form::open(['url'=>route('portfolioEdit', ['portfolio'=>$portfolio->id]), 'class' => 'form-horizontal', 'method' => 'POST'])  !!}

                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                    {!! Form::close()  !!}
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
{!! Html::link(route('portfolioAdd'),'Новый Сервис') !!}
@endif
</div>
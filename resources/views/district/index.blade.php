@extends('layout.app')

@section('content')
    <h2>
        <a href="/" class='btn' style="color: #b10753; font-size: 30px" title='Домой'>
            <i class="fas fa-home"></i></a>
        <a href="#" class='btn' onclick="history.back();"><i class="fas fa-arrow-alt-circle-left" style="color: #0471d0; font-size: 30px" title="Назад"></i></a>
    Микрорайоны
        <a href="{{ route('locality.district.create', $locality) }}" class='btn btn-ghost-info' style="color: #2d995b; font-size: 30px" title='Добавить'>
            <i class="fas fa-plus-square"></i></a>
    </h2>
    <div class="panel-body">
        <table class="table">
            <thead>
            <th>Имя</th>
            <th>Имя на транслите</th>
            <th>Действия</th>
            </thead>
            <tbody>
            @foreach($districts as $district)

                <tr>
                    <td>{{$district->name}}
                    <td>{{$district->translit}} </td>
                    <td>
                        {!! Form::open(['route' => ['locality.district.destroy',$locality, $district->id], 'method' => 'delete']) !!}

                        <a href="{{ route('locality.district.edit',[$locality, $district->id] ) }}" class='btn' style="color: #0585e0; padding: 0; font-size: 20px" title='Изменить'>
                        <i class="far fa-edit"></i></a> &nbsp

                        {!! Form::button('<i class="far fa-times-circle"></i>', [
                              'type' => 'submit',
                              'class' => 'btn btn-ghost-danger',
                              'style' => 'color: #c51f1a; padding: 0;font-size: 20px',
                              'title' => 'Удалить'
                         ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$districts->render()}}
    </div>
@endsection


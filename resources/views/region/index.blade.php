@extends('layout.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="head">Регионы &nbsp&nbsp
                <a href="{{route('region.create')}}" class='btn btn-ghost-info' style="color: #2d995b; font-size: 30px" title='Добавить'>
                <i class="fas fa-plus-square"></i>
                </a>
            </h1>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>Имя</th>
                    <th>Имя на транслите</th>
                    <th>Действия</th>
                    </thead>
                    <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{$region->name}}
                            <td>{{$region->translit}} </td>
                            <td>
                                {!! Form::open(['route' => ['region.destroy', $region->id], 'method' => 'delete']) !!}
                                <a href="{{ route('region.locality.index', $region->id) }}" class='btn' style="color: #9305e0; padding: 0;font-size: 20px" title='К списку населённых пунктов'>
                                    <i class="fas fa-arrow-alt-circle-right"></i></a> &nbsp

                                <a href="{{ route('region.edit', $region->id) }}" class='btn' style="color: #0585e0; padding: 0;font-size: 20px" title='Изменить'>
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
                {{$regions->render()}}
            </div>
        </div>
@endsection

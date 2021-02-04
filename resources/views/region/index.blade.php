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
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Действия
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('region.locality.index',$region->id) }}">К списку населённых пунктов</a>
                                            <a class="dropdown-item" href="{{ route('region.edit',$region->id) }}">Изменить</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['region.destroy', $region->id],'style'=>'display:inline']) !!}
                                            {!! Form::button('Удалить', ['class' => 'dropdown-item', 'type' => 'submit']) !!}
                                            {!! Form::close() !!}
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$regions->render()}}
            </div>
        </div>
@endsection

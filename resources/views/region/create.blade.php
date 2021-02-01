@extends('layout.app')

@section('content')
    <h2>Добавление региона</h2>
    {!! Form::open(['action' =>'RegionController@store', 'method' => 'POST','files'=>true])!!}

    <div class="col-md-6">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group required">
            {!! Form::label("Наименование региона") !!}
            {!! Form::text("name", null ,["class"=>"form-control","required"=>"required"]) !!}
        </div>
        <div class="form-group required">
            {!! Form::label("Транслит региона") !!}
            {!! Form::text("translit", null ,["class"=>"form-control","required"=>"required"]) !!}
        </div>
    </div>
    <div class="well well-sm clearfix">
        <button class="btn btn-success pull-right" type="submit">Создать</button>
        <a href="#" class='btn' onclick="history.back();"><i class="fas fa-arrow-alt-circle-left" style="color: #0471d0; font-size: 30px" title="Назад"></i></a>
    </div>



    {!! Form::close() !!}
@endsection

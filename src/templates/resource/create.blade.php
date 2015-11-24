@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> [Model] / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('[model].store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{content_fields}}

                [repeat]
                <div class="form-group">
                    {{ Form::label('[property]', '[Property]') }}
                    {{ Form::text('[property]', Input::old('[property]'), array('class' => 'form-control')) }}
                </div>
                [/repeat]

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('[model].index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
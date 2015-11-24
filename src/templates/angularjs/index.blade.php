@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> [Model]
            <a class="btn btn-success pull-right" href="{{ route('[model].create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($[models]->count())
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        {{header_fields}}
                        [repeat]<th>[Property]</th>[/repeat]
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($[models] as $[model])
                        <tr>
                            <td>{{$[model]->id}}</td>
                            {{content_fields}}
                            [repeat]
                            <td>
                                <a href="{{ url('[model]/'.$[model]->id) }}">{{ $[model]->[property] }}</a>
                            </td>
                            [/repeat]

                            <td class="text-right">
                                <a class="btn btn-xs btn-primary" href="{{ route('[model].show', $[model]->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning" href="{{ route('[model].edit', $[model]->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('[model].destroy', $[model]->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $[model]->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
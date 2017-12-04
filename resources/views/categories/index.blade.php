@extends('layout.applayout')
@section('title')
    <title>All categories</title>
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->name}}</th>
                        <td>
                            {!! Form::open(['action' =>['CategoryController@destroy',$item->id],'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                         </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'categories.store']) !!}
                <h2>New Category</h2>
                <div class="form-group">
                {{Form::label('name','Cat Name: ')}}
                {{Form::text('name','',['class'=>'form-control'])}}
                </div>
                {{Form::submit('Create new category',['class'=>'btn btn-success btn-block'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    @endsection
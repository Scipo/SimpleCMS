@extends('layout.applayout')
@section('title')
    <title>{!! $post->headline !!}</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
        <h1>{!! $post->headline !!}</h1>
        <p>{!! $post->description!!}</p>
        </div>

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>URL Slug: </dt>
                <a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a>
            </dl>
            <dl class="dl-horizontal">
                <dt>Category: </dt>
                @if($post->category==null)
                     <p>No category</p>
                @else
                <p>{{$post->category->name}}</p>
            @endif
            </dl>
            <dl class="dl-horizontal">
                <dt>Create At: </dt>
                <dd>{{ date('j M, Y, G:i', strtotime($post->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated: </dt>
                <dd>{{ date('j M, Y, G:i', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                 <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary btn-block">Edit</a>
                </div>
                <div class="col-sm-6">
                 {!! Form::open(['action' =>['PostController@destroy',$post->id],'method' => 'POST']) !!}
                     {{Form::hidden('_method', 'DELETE')}}
                     {{Form::submit('Delete',['class' => 'btn btn-danger btn-block'])}}
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
 </div>
    @endsection


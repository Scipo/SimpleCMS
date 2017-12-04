@extends('layout.applayout')
@section('title')
    <title>Edit</title>
@endsection
@section('content')
    <div class="row">
        <h1>Edit</h1>
        {!! Form::open(['action' => ['PostController@update', $post->id],'method' => 'POST', 'files' => true]) !!}
        <div class="form-group col-md-8">
            {{Form::label('headline','Headline: ')}}
            {{Form::text('headline',$post->headline,['class' => 'form-control','placeholder' => 'Headline'])}}
        </div>
        <div class="form-group col-md-8">
            {{Form::label('slug','Slug: ')}}
            {{Form::text('slug',$post->slug,['class' => 'form-control','placeholder' => 'Slug'])}}
        </div>
        <div class="form-group col-md-8">
            {{Form::label('keywords','Keywords: ')}}
            {{Form::text('keywords',$post->keywords,['class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-8">
            {{Form::label('narration','Narration: ')}}
            {{Form::textarea('narration',$post->narration,['class' => 'form-control', 'cols' =>'2' , 'rows' =>'2'])}}
        </div>
        <div class="form-group col-md-8">
            {{Form::label('category_id','Category: ')}}
            {{Form::select('category_id',$categories, ['class' => 'form-control'])}}
        </div>
        <div class="form-group col-md-8">
            {{Form::label('image','Image Edit: ')}}
            {{Form::file('image')}}
        </div>
        <div class="form-group col-md-8">
            {{Form::label('description','Description: ')}}
            {{Form::textarea('description',$post->description,['id' => 'article-ckeditor', 'class' => 'form-control','placeholder' => 'description'])}}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{ date('j M, Y, G:i', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('j M, Y, G:i', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('post.index',$post->id)}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Update',['class' => 'btn btn-success btn-block'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('script')
    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
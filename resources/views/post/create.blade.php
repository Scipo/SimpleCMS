@extends('layout.applayout')
@section('title')
    <title>Create</title>
@endsection
@section('content')
    <h1>Create</h1>
    {!! Form::open(['action' => 'PostController@store','method' => 'POST', 'files' => true ]) !!}
    <div class="form-group">
        {{Form::label('headline','Headline: ')}}
        {{Form::text('headline','',['class' => 'form-control','placeholder' => 'Headline'])}}
    </div>
    <div class="form-group">
        {{Form::label('slug','Slug: ')}}
        {{Form::text('slug','',['class' => 'form-control','placeholder' => 'Slug'])}}
    </div>
    <div class="form-group">
        {{Form::label('keywords','Keywords: ')}}
        {{Form::text('keywords','',['class' => 'form-control','placeholder' => 'Keywords'])}}
    </div>
    <div class="form-group">
        {{Form::label('narration','Narration: ')}}
        {{Form::textarea('narration','',['class' => 'form-control','placeholder' => 'Narration','cols' =>'2' , 'rows' =>'2'])}}
    </div>
    <div class="form-group">
        {{Form::label('category_id','Category: ')}}
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
        </select>
    </div>
    <div class="form-group">
        {{Form::label('image','Image upload: ')}}
        {{Form::file('image')}}
    </div>
    <div class="form-group">
        {{Form::label('description',"Description: ")}}
        {{Form::textarea('description','',['class' => 'form-control','placeholder' => 'Description','id' => 'article-ckeditor'])}}
    </div>
    {{Form::submit('Submit',['class' => 'btn btn-success btn-lg btn-block'])}}
    {!! Form::close() !!}
    @endsection
@section('script')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
    @endsection

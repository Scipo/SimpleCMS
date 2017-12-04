@extends('layout.applayout')
@section('title')
<title>{!! $post->headline !!}</title>
    @endsection
@section('meta')
<meta name="keywords" content="{{$post->keywords}}">
<meta name="description" content="{{$post->narration}}">
    @endsection
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{asset('images/' . $post->image)}}" style="width: 100%" alt="">
            <h1>{{$post->headline}}</h1>
            <p class="text-justify">
                {{$post->description}}
                <br>
            </p>
            <hr>
            @if($post->category==null)
                <p>Posted in: No category</p>
            @else
                <p>Posted in: {{$post->category->name}}</p>
                @endif

        </div>
    </div>

    @endsection
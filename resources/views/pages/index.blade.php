@extends('layout.applayout')
@section('title')
    <title>Home</title>
@endsection
    @section('content')
        <div class="row">
             <div class="col-md-8">
              @foreach($post as $item)
                <div class="post">
                    <a href="{{route('blog.single',$item->slug)}}"><h3>{{$item->headline}}</h3></a>
                    <article>{!! substr($item->description, 0, 150) !!}{!!strlen($item->description) > 300 ? "..." : " " !!} </article>
                </div>
                @endforeach
                  <div class="text-center">{!! $post->links() !!}</div>
             </div>
        </div>
        @endsection
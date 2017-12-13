@extends('layout.applayout')
@section('title')
<title>{!! $post->headline !!}</title>
    @endsection
@section('meta')
<meta name="keywords" content="{{$post->keywords}}">
<meta name="description" content="{{$post->narration}}">
    @endsection
@section('meta-json')
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "mainEntityOfPage": [
        {
          "@type": "Website",
		  "id": "http:technonews.uchenici.bg/{{$post->slug}}",
		  "@type":"ImageObject",
		  "url":"http:technonews.uchenici.bg/{{asset('images/' . $post->image)}}",
		  "height":800,"width":400
        },
		"headline":"{{$post->headline}}",
		"description":"{{$post->narration}}"
      ],
      "name":"{{$post->headline}}",
      "datePublished":"{{$post->created_at}}","dateModified":"{{$post->updated_at}}",
    }
    </script>
    /script>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{asset('images/' . $post->image)}}" style="width: 100%" alt="">
            <h1>{{$post->headline}}</h1>
            <p class="text-justify">
                {!!$post->description!!}
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
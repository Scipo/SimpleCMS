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
"name":"{{$post->headline}}",
"description":"{{$post->narration}}",
"author":null,
"@type":"WebSite",
"url":"http://technonews.uchenici.bg/{{$post->slug}}",
"image":"{{asset('images/' . $post->image)}}",
"publisher":null,
"headline":"{{$post->headline}}",
"dateModified":"{{$post->created_at}}",
"datePublished":"{{$post->created_at}}",
"sameAs":null,
"mainEntityOfPage":null,
"@context":"http://schema.org"
}
</script>
@endsection
@section('meta-fb-og')
    <meta property="og:title"         content="{!! $post->headline !!}" />
    <meta property="og:type"          content="website" />
    <meta property="og:url"           content="http://technonews.uchenici.bg/{{$post->slug}}" />
    <meta property="og:description"   content="{{$post->narration}}" />
    <meta property="og:image"         content="{{asset('images/' . $post->image)}}" />
    <meta property="og:site_name"     content="TechnoNews"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{asset('images/' . $post->image)}}" style="width: 100%" alt="">
            <h1>{{$post->headline}}</h1>
            {!!$post->description!!}
            <br>
            <hr>
            @if($post->category==null)
                <p>Posted in: No category</p>
            @else
                <p>Posted in: {{$post->category->name}}</p>
            @endif
        </div>
    </div>
@endsection

@section('script')

@endsection
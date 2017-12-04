@extends('layout.applayout')
@section('title')
    <title>All Blog Posts</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h3> All Blog Posts</h3>
        </div>
        <div class="col-md-2">
            <a href="{{route('post.create')}}" class="btn btn-primary btn-block">Create New Post</a>
       </div>
        <div class="col-md-offset-10">
            {!! Form::open(['method'=>'GET','url'=>'post','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default-sm" type="submit">Search</button>
                </span>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-12"><hr></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Headline</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($post as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <td><img src="{{asset('images/' . $item->image)}}" style="width: 120px" height="70px" alt=""></td>
                            <td><a href="post/{{$item->id}}">{{$item->headline}}</a></td>
                            <td>{!!substr($item->description, 0, 25)!!}{!!strlen($item->description) > 25 ? "..." : ""!!}</td>
                            <td>{{ date('M j, Y', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ route('post.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('post.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('post.destroy', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">{!! $post->links() !!}</div>
        </div>
    </div>
@stop


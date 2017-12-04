<div class="col-md-3">
    {!! Form::open(['method'=>'GET','url'=>'/','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
    <div class="input-group custom-search-form">
        <input type="text" class="form-control" name="search" placeholder="Search...">
        <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">Search</button>
    </span>
    </div>
    {!! Form::close() !!}
</div>
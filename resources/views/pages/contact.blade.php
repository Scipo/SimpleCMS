@extends('layout.applayout')
<title>{{$title}}</title>
<link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
@section('content')
    <div class=row>
        <div class="col-md-6">
            <h1>Contact</h1>
            <hr>
            <form data-parsley-validate>
            <div class="form-group">
                <label for="e-mail" >E-mail: </label>
                <input type="email" name="mail" id="e-mail" class="form-control" placeholder="E-mail" required >
            </div>
            <div class="form-group">
                <label for="subject" >Subject: </label>
                <input type="text"  id="subject" class="form-control" placeholder="Subject" required>
            </div>
                <div class="form-group">
                    <label for="message" >Message: </label>
                    <textarea  id="message" class="form-control" placeholder="Type your message" cols="25" rows="10" required ></textarea>
                </div>
                <input type="submit" value="Send" class="btn btn-info">
            </form>

        </div>
    </div>
   @endsection
@section('script')
<script src="{{asset('js/parsley.min.js')}}"></script>
    @endsection

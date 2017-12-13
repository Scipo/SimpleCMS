@extends('layout.applayout')
@section('title')
<title>{{$title}}</title>
@endsection
@section('css')
<link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
<style>
    #map {
        width: 100%; /* Span the entire width of the screen */
        height: 400px; /* Set the height to 400 pixels */
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
        top: 145px;
    } /* Change the color of the map to black and white * /
}
</style>
    @endsection
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
        <div class="col-md-6">
           <div id="map"></div>
        </div>
    </div>

   @endsection
@section('script')
<script src="{{asset('js/parsley.min.js')}}"></script>
<!-- Add Google Maps -->
<script>
    function initMap() {
        var uluru = {lat: 42.6743553, lng: 23.2587917};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMzNwnvmel7QiJV0jMlIu4eCZOBklHm84&callback=initMap"
        type="text/javascript"></script>
@endsection

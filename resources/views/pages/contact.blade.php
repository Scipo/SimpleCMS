@extends('layout.applayout')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('css')
    <style>
        #googleMap
        {
            width: 100%; /* Span the entire width of the screen */
            height: 400px; /* Set the height to 400 pixels */
            top: 145px;
        }
    </style>
@endsection
@section('content')
    <div class=row>
        <div class="col-md-6">
            <h1>Contact</h1>
            <hr>
            <form action="{{url('contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">E-mail:</label>
                    <input id="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Type your message" cols="25" rows="10"></textarea>
                </div>
                <input type="submit" value="Send" class="btn btn-success">
            </form>
        </div>
        <div class="col-md-6">
            <div id="googleMap"></div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Add Google Maps -->
    <script>
        function myMap() {
            var myCenter = new google.maps.LatLng(42.677864, 23.2526939);
            var mapProp = {center:myCenter, zoom:15, scrollwheel:true, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            var marker = new google.maps.Marker({position:myCenter});
            marker.setMap(map);
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1xC0-10sMzg90VsQVoBn1S43devPtVTA&callback=myMap"   type="text/javascript"></script>
@endsection

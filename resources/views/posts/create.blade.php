@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create Post</div>
				<div class="panel-body">

					@include('errors.list')

					<form class="form-horizontal" role="form" method="POST" action="/posts" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Text</label>
							<div class="col-md-6">
								<textarea rows="4" class="form-control" name="text">{{ old('text') }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Image Upload</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="image">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Latitude</label>
							<div class="col-md-6">
								<input id="latitude" type="text" class="form-control" name="latitude">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Longitude</label>
							<div class="col-md-6">
								<input id="longitude" type="text" class="form-control" name="longitude">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Create
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        console.log('Position not available');
    }
}

function showPosition(position) {
    latitude.value = position.coords.latitude; 
    longitude.value = position.coords.longitude; 
}

$('document').ready(function() {
	getLocation();
});
</script>
@endsection
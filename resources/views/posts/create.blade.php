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
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Facebook Copy</label>
							<div class="col-md-6">
								<textarea rows="4" class="form-control" name="facebook_copy">{{ old('facebook_copy') }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Twitter Copy</label>
							<div class="col-md-6">
								<textarea rows="2" class="form-control" name="twitter_copy">{{ old('twitter_copy') }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Image Upload</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="image">
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
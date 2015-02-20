@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<a href="posts/create" class="btn btn-default" role="button">Create Post</a>
		</div>
	</div>
	<div class="row">
		@foreach($posts as $post)
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $post->name }}</div>
				<div class="panel-body">
					<img src="{{ $post->image->fullPath() }}">
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						{{ $post->facebook_copy }}
					</li>
					<li class="list-group-item">
						{{ $post->twitter_copy }}
					</li>
				</ul>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-5">
		<h4><a href="/discuss">Forum</a> &nbsp/ &nbspEverything
	</div>
</div>

<div class="row">
<div class="col-md-3">
	




	General <div class="outer1">
				<div class="inner1" id="inner1"></div>
			</div>
			<div class="outer2">
				<div class="inner2" id="inner2"></div>
			</div>
			<div class="outer3">
				<div class="inner3" id="inner3"></div>
			</div>

		

<script>

var foo1 = $('.outer1');
	var bar1 = $('#inner1');

	var foo2 = $('.outer2');
	var bar2 = $('#inner2');

	var foo3 = $('.outer3');
	var bar3 = $('#inner3');


	foo1.on('mouseenter', function () {
		bar1.stop().animate({
		  "margin-right": '30px'
		}, 130 );
	});

	foo1.on('mouseleave', function () {
		bar1.stop().animate({
		  "margin-right": '0'
		}, 130 );
	});
	
	foo2.on('mouseenter', function () {
		bar2.stop().animate({
		  "margin-right": '30px'
		}, 130 );
	});

	foo2.on('mouseleave', function () {
		bar2.stop().animate({
		  "margin-right": '0'
		}, 130 );
	});
	foo3.on('mouseenter', function () {
		bar3.stop().animate({
		  "margin-right": '30px'
		}, 130 );
	});

	foo3.on('mouseleave', function () {
		bar3.stop().animate({
		  "margin-right": '0'
		}, 130 );
	});

</script>



</div>
	<div class="col-md-9 discuss-wrapper">
			@foreach ($postsForPagination as $post)

			<div class="individual-post-wrapper">
			<div class="row">
				<div class="col-md-1">
					<img src="images/avatar.png" class="individual-post-avatar">
				</div>
				<div class="col-md-9">
					<div class="individual-post-title">
						<a href="/discuss/channels/{{ $post->post_channel }}/{{ $post->id }}/{{ $post->slug }}">{{ $post->post_title }}</a>
					</div>

					@if ( count($post->comments) > 0 )
						<div class="individual-post-created-at">
							Updated {{ $post->comments->last()->created_at->diffForHumans() }}
						</div>
					@endif

					@if ( count($post->comments) == 0 )
						<div class="individual-post-created-at">
							Created {{ $post->created_at->diffForHumans() }}
						</div>
					@endif

					<div class="individual-post-username">
						 &nbspby <a href="#">{{ $post->user->userName }}</a>
					</div>
				</div>

				<div class="col-md-1">
					<div class="individual-post-channel">
						{{ $post->post_channel }}
					</div>
				</div>

				<div class="col-md-1">
					<div class="individual-post-comment-count">
						{{ count($post->comments()->get()) }}
					</div>
				</div>
				</div>
			</div>
			@endforeach

		</div>

<div class="col-md-3"></div>
</div></div>
<div class="row">
	<div class="col-md-4">k</div>
		<div class="col-md-6 text-center">
			{{ $postsForPagination->links() }}
		</div>
</div>
</div>
@stop
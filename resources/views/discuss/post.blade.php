@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-11">
		<h4>
			<a href="/discuss">Forum</a>
			&nbsp/ &nbsp
			<a href="/discuss/{{ $post->post_channel }}">{{ $post->post_channel }}</a>
			&nbsp/ &nbsp{{ $post->post_title }}
		</h4>
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 post-main-wrapper">

		<div class="post-wrapper">
			<div class="">

				<div class="post-title">{{ $post->post_title }}</div>

				<div class="col-md-1">
					<div class="">
						<img src="/images/avatar.png" class="post-avatar"></div>
				</div>

				<div class="col-md-10">
					<div class="post-who-updated">
						(broken link)
						<a href="#">{{ $post->user->userName }}</a>
						&nbsp&nbsp&nbsp&nbsp&nbsp( {{ $post->user->city }}, {{ $post->user->state }} )&nbsp&nbsp-&nbsp{{ $post->created_at->diffForHumans() }}
					</div>

					<div class="post-body">{{ $post->post_body }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- Posts Comments --}}
@if (count($comments) >= 0)
	@foreach ($comments as $comment)
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 comment-main-wrapper">
		<div class="col-md-1">
			<img src="/images/avatar.png" class="post-avatar">
		</div>
		<div class="col-md-10 comment-padding">
			<div class="comment-heading">
				(broken link)
				<a href="#">{{ $comment->user->userName }}</a>
				@if (! ($comment->user->city == 'Not Specified' || $comment->state == 'Not Specified') )
					&nbsp&nbsp&nbsp&nbsp&nbsp( {{ $comment->user->city }}, {{ $comment->user->state }} )
					&nbsp&nbsp&nbsp{{ $comment->created_at->diffForHumans() }}
				@endif
			</div>
			<div class="comment-comment">{{ $comment->comment }}</div>
				<div class="comment-likes">
					@if ($hasLikedComment)
						<span class="glyphicon glyphicon-thumbs-up post-like-icon" id="thumbsUpIconNotClickable" aria-hidden="true"></span>
						{{ count($likes->where('comment_id', $comment->id)) }}


					@else
						<a href="" onclick="">
							<span class="glyphicon glyphicon-thumbs-up post-like-icon" id="thumbsUpIconClickable" aria-hidden="true"></span>
						</a>

						
						
						@if ( count($likes->where('comment_id', $comment->id)) == 0 )
							
						@else
							j{{ count($likes->where('comment_id', $comment->id)) }}
						@endif
							<script>
								var $thumbsUpIcon = $('#thumbsUpIconClickable');
								var $user = '{{ Auth::user()->userName }}';

						        $thumbsUpIcon.on('click', function () {
						        	$.ajax({
						        		type: 'GET',
						        		url: "/home/" +  $user + "/" + {{ $post->id }} + "/" + {{ $comment->id }} + "/like",
						        	});

						        	location.reload(true);
						        });
							</script>
					@endif

					@foreach ($likes as $like)
						@if ($comment->id == $like->comment_id)
							<span class="comment-like-username">
							{{ $like->user->userName }}
						</span>&nbsp
						@endif
					@endforeach

			</div>
		</div>
	</div>
</div>
	@endforeach
@endif



@if (Auth::user())
	<form method="POST" action="/discuss/channels/{{ $post->
		post_channel }}/{{ $post->id }}/{{ $post->slug }}">
	{{ csrf_field() }}
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10 comment-text-wrapper">
				<div class="form-group comment-hide-show" id="commentHideShow">
					<textarea name="comment" id="commentBody" class="form-control comment-textarea" placeholder="What you got to say?" rows=12></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-9">
				<button type="submit" class="btn btn-lg btn-primary" id="postCommentBtn">Post Your Reply</a>
			</div>
		</div>
	</form>
	@endif
	<script>
	$("#postCommentBtn").click(function () {
		$("#commentHideShow").toggle(300);
		$('html, body').animate({
        scrollTop: $(document).height()
    	}, 'slow');
	});

</script>
	@stop
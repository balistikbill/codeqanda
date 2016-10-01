@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-11">
		<h4><a href="/discuss">Forum</a> &nbsp/ &nbsp<a href="/discuss/{{ $post->post_channel }}">{{ $post->post_channel }}</a> &nbsp/ &nbsp{{ $post->post_title }}</h4>
	</div>
</div>
<div class="row">
<div class="col-md-1"></div>
	<div class="col-md-10 post-main-wrapper">
			
		<div class="post-wrapper">
			<div class="">

				<div class="post-title">
					{{ $post->post_title }}
				</div>

				<div class="col-md-1">
					<div class="">
						<img src="/images/avatar.png" class="post-avatar">
					</div>
				</div>

				<div class="col-md-10">
					<div class="post-who-updated">
						(broken link) <a href="#">{{ $post->user->userName }}</a>&nbsp&nbsp&nbsp&nbsp&nbsp( {{ $post->user->city }}, {{ $post->user->state }} )&nbsp&nbsp-&nbsp{{ $post->created_at->diffForHumans() }}
					</div>

					<div class="post-body">
						{{ $post->post_body }}
					</div>				
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
				(broken link) <a href="#">{{ $comment->user->userName }}</a>
				@if (! ($comment->user->city == 'Not Specified' || $comment->state == 'Not Specified') )
					&nbsp&nbsp&nbsp&nbsp&nbsp( {{ $comment->user->city }}, {{ $comment->user->state }} )
					&nbsp&nbsp&nbsp{{ $comment->created_at->diffForHumans() }}
				@endif
			</div>
			<div class="comment-comment">
				{{ $comment->comment }}
			</div>	

{{-- 
				<div class="comment-likes-show">
				@if (! count($likes))
					<a href="" onclick="document.reload()"><span class="glyphicon glyphicon-thumbs-up" id="thumbsUpIcon" aria-hidden="true"></span></a>
					<span class="comment-likes-users">Be the First to Like</span>
				@else
				<button class="btn btn-sm btn-primary" id="btnShowLikes">Show Likes</button>
				<script>


				$('#btnShowLikes').click(function () {
					$('#commentLikesUsers').toggle();
				})

				

				</script>
				
				<ul>
					@foreach ($likes as $like)
						@if (! (Auth::user()->id == $like->user->id))
						<div>
							
							<span class="comment-likes-users">Be the First to Like</span>
						@endif
						<div class="comment-likes-users" id="commentLikesUsers">
							<li>{{ $like->user->userName }}</li>
						</div>

						@if (Auth::user()->id == $like->user->id)
		      				<script>
								$('#thumbsUpIcon').addClass('comment-liked');
								// $('#thumbsUpIcon').append('You Liked');
		      				</script>
						@endif
					@endforeach
				</ul>
				@endif
				</div> 
 --}}

@if ($hasLiked)
	hello
@else
sdklfj
@endif

			<div class="comment-like">

			
				<a href="" onclick="location.reload()"><span class="glyphicon glyphicon-thumbs-up" id="thumbsUpIcon" aria-hidden="true"></span></a>



				<script>
					var $thumbsUpIcon = $('#thumbsUpIcon');
					var $user = '{{ Auth::user()->userName }}';

			        $thumbsUpIcon.on('click', function () {
			        	$.ajax({
			        		type: 'GET',
			        		url: "/home/" +  $user + "/" + {{ $post->id }} + "/" + {{ $comment->id }} + "/like",
			        	});
			        });
				</script>


			</div>
		</div>
	    </div>
	</div>

	@endforeach
@endif



@if (Auth::user())
	<form method="POST" action="/discuss/channels/{{ $post->post_channel }}/{{ $post->id }}/{{ $post->slug }}">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-1"></div>
			<div class="col-md-10 comment-text-wrapper">
				<div class="form-group comment-hide-show" id="commentHideShow">
		            <textarea name="comment" id="commentBody" class="form-control comment-textarea" placeholder="Got the Answer???" rows=12></textarea>
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
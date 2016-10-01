@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1 discuss-create-wrapper">
		<div class="">
			Write something interesting please!
			<p></p>
		</div>
		<form method="POST" action="/discuss">
			{{ csrf_field() }}
            <div class="form-group">
                <label for="postTitle" class="discuss-create-label">Title of Post</label>
                <input type="text" name="post_title" id="postTitle" class="form-control discuss-create-title-text" placeholder="Click Here to Create Title">
            </div>

            <div class="form-group">
				<label for="channel" class="discuss-create-label">Channel</label>
				<select name="post_channel" id="channel" class="channel all discuss-create-channel-select" placeholder="Select a channel">
			    {{-- <option value="General"></option> If the check is not required, submit a default value empty --}}
			        <option value="general">General</option>
			        <option value="laravel">Laravel</option>
			        <option value="php">PHP</option>                      
				</select>          
            </div>

			<div class="form-group">
                <label for="postBody" class="discuss-create-label">Your Valuable Question</label>
                <textarea name="post_body" id="postBody" class="form-control discuss-create-body-text" placeholder="Click Here to Create Title" rows=12></textarea>
            </div>

            <div class="form-group discuss-create-submit">
            	<button type="submit" class="btn btn-primary discuss-create-submit">Post this Bitch</button>
            </div>
        </form>
        </div>
    </div>
</div>
        	






<script src="/js/pickout.js"></script>
<script>
// javaScript
pickout.to({
	'el': '.channel',
	'theme': 'cricket'
});

</script>
@stop
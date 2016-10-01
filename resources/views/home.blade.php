@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1 col-md-offset-1">
            <a href="/discuss/create" class="btn btn-lg btn-primary btn-profile">New Discussion</a>
            <a href="/discuss" class="btn btn-lg btn-primary btn-profile">View Discussions</a>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="profile-welcome">Dashboard - Welcome, {{ Auth::user()->name }}</div>
                <div class="profile-active-since text-danger">Member Since: {{ Auth::user()->created_at->diffForHumans() }}</div>
                <div class="panel-body">
                    <div class="profile-title">
                        <h3>Your Profile Information</h3>
                    </div>
                    
                <form method="POST" action="/home/update/{{ $user->userName }}">
                {{ csrf_field() }}

                 <div class="profile-information">
                        <div class="form-group">
                            <label for="userName profile-field-label">{{ Auth::user()->userName }}</label>
                            <a href="#" id="editUserNameBtn" class="btn btn-small btn-primary profile-edit-btn">edit</a><br>
                            <input type="text" userName="userName" id="userName" class="form-control profile-field-text" value="{{ Auth::user()->userName }}">
                        </div>
                    </div>

                    <div class="profile-information">
                        <div class="form-group">
                            <label for="name profile-field-label">{{ Auth::user()->name }}</label>
                            <a href="#" id="editNameBtn" class="btn btn-small btn-primary profile-edit-btn">edit</a><br>
                            <input type="text" name="name" id="name" class="form-control profile-field-text" value="{{ Auth::user()->name }}">
                        </div>
                    </div>

                    <div class="profile-information">
                        <div class="form-group">
                            <label for="email profile-field-label">{{ Auth::user()->email }}</label>
                            <a href="#" id="editEmailBtn" class="btn btn-small btn-primary profile-edit-btn">edit</a><br>
                            <input type="text" name="email" id="email" class="form-control profile-field-text" value="{{ Auth::user()->email }}">
                        </div>
                    </div>

                    <div class="profile-information">
                        <div class="form-group">
                            <label for="city profile-field-label">City - {{ Auth::user()->city }}</label>
                            <a href="#" id="editCityBtn" class="btn btn-small btn-primary profile-edit-btn">edit</a><br>
                            <input type="text" name="city" id="city" class="form-control profile-field-text" value="{{ Auth::user()->city }}">
                        </div>
                    </div>

                    <div class="profile-information">
                        <div class="form-group">
                            <label for="state profile-field-label">State - {{ Auth::user()->state }}</label>
                            <a href="#" id="editStateBtn" class="btn btn-small btn-primary profile-edit-btn">edit</a><br>
                            <input type="text" name="state" id="state" class="form-control profile-field-text" value="{{ Auth::user()->state }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default profile-edit-btn btn-primary">update</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

// Show/Hide Name Field
    var editUserNameBtn = $('#editUserNameBtn');
    var editUserNameField = $('#userName');
    editUserNameBtn.click(function() {
            editUserNameField.toggle();
        });

// Show/Hide Name Field
    var editNameBtn = $('#editNameBtn');
    var editNameField = $('#name');
    editNameBtn.click(function() {
            editNameField.toggle();
        });
// Show/Hide Email Field
    var editEmailBtn = $('#editEmailBtn');
    var editEmailField = $('#email');
    editEmailBtn.click(function() {
            editEmailField.toggle();
        });
// Show/Hide City Field
    var editCityBtn = $('#editCityBtn');
    var editCityField = $('#city');
    editCityBtn.click(function() {
            editCityField.toggle();
        });
// Show/Hide State Field
    var editStateBtn = $('#editStateBtn');
    var editStateField = $('#state');
    editStateBtn.click(function() {
            editStateField.toggle();
        });
</script>
@endsection

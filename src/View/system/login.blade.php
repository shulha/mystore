@extends('layout.main')

@section('content')

<div class="container">
    <form method="POST" action="<?php echo route('auth'); ?>" class="form-signin" >
        <h2 class="form-signin-heading">Please sign in</h2>
        <input class="form-control" type="text" name="login" placeholder="E-mail" />
        <input class="form-control" type="password" name="password" placeholder="Password" />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>

@stop

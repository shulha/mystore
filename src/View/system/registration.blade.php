@extends('layout.main')

@section('content')

    <div class="container">
        <form method="POST" action="<?php echo route('save_user'); ?>" class="form-signin" >
            <h2 class="form-signin-heading">Registration</h2>
            <div class="input-group">
                <input type="text" class="form-control" name="login" placeholder="E-mail">
                <input type="password" class="form-control" name="password" placeholder="Password">
{{--                <input type="text" class="form-control" name="name" placeholder="Name">
                <input type="text" class="form-control" name="name" placeholder="Phone">
                <textarea type="text" class="form-control" name="name" placeholder="Address"></textarea>--}}
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        </form>
    </div>

@stop

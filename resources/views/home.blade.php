@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <todo-component :user_id="{{ auth()->user()->id }}"></todo-component>
        </div>
    </div>
</div>
@endsection

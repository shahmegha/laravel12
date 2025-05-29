@extends('layouts.app')
 
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Edit User ({{$user->name}})
                <a class="link" href="{{ route('users.index') }}">Manage User</a>
            </div>
            <div class="card-body">
                @include('common.message')
                @include('users.form')
            </div>
        </div>
    </div>
@endsection
 
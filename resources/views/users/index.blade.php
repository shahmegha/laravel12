@extends('layouts.app')
 
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Manage Users
                <a class="link" href="{{ route('users.add') }}">Add User</a>
            </div>
            <div class="card-body">
                @include('common.message')
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    
<!-- Modal structure -->
@include('common.delete_modal')
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
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

<!-- Delete confirmation Modal structure -->
<div class="modal fade" id="confirm_delete_modal" tabindex="-1" aria-labelledby="confirm_delete_modal_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirm_delete_modal_label">Confirm Action</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmBtn">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Sucess message Modal structure -->
<div class="modal fade" id="sucess_message_modal" tabindex="-1" aria-labelledby="sucess_message_modal_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title color-green" id="sucess_message_modal_label">Sucess</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
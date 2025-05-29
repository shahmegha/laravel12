<a href="{{route('users.edit',[$id])}}">Edit</a>
@if($id != Auth::user()->id)
| <button type="button" data-custom-action="{{ route('users.destroy',$id) }}" data-custom-referece-table="users-table"  class="btn btn-link show-delete-modal">Delete</button>
@endif
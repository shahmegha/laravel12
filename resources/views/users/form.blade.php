<form action="{{route('users.store')}}" method="POST">
    @csrf
    <input type="hidden" name="mode" id="mode" value="{{$mode}}">
    @if(!empty($user))
    <input type="hidden" name="id" id="id" value="{{$user->id}}">
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" placeholder="Joy bidden" value="{{ old('name',!empty($user)?$user->name:'') }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email',!empty($user)?$user->email:'') }}">
    </div>
    @if(!empty($user) && Auth::user()->id == $user->id)
    <div class="mb-3">
        <label for="current_password" class="form-label">Current Password</label>
        <input type="password" id="current_password" class="form-control form-control-lg @error('current_password') is-invalid @enderror" name="current_password" >
    </div>
    @endif
    @if(empty($user) || (!empty($user) && Auth::user()->id == $user->id))
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" aria-describedby="password_help">
        <div id="password_help" class="form-text">
            Your password must be 8-20 characters long, contain letters,special characters and numbers, and must not contain spaces, dots, or emoji.
        </div>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" >
    </div>
    @endif
    <div class="mb-3">
        <label for="role" class="form-label form-label-lg">Role</label>
        <select id="role" name="role" class="form-select form-select-lg @error('role') is-invalid @enderror" aria-label="User Role" @if(!empty($user)) disabled @endif >
            <option value="">Select user role</option>
            <option value="{{config('constant.ADMIN_ROLE_NAME')}}"  {{ old('role',!empty($user)?$user->myRole:'')==config('constant.ADMIN_ROLE_NAME') ? 'selected="selected"' : '' }} >{{config('constant.ADMIN_ROLE_NAME')}}</option>
            <option value="{{config('constant.USER_ROLE_NAME')}}"  {{ old('role',!empty($user)?$user->myRole:'')==config('constant.USER_ROLE_NAME') ? 'selected="selected"' : '' }} >{{config('constant.USER_ROLE_NAME')}}</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
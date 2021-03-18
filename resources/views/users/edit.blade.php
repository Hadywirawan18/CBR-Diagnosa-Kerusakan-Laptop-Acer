@extends('layouts.admin')

@section('users.index')
    active
@endsection

@section('content')
   <form action="{{route("users.update", [$user->id])}}" method="post">
@csrf
@method("PUT")
<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" placeholder="Masukkan nama" class="form-control @error('name')
        is-invalid
    @enderror" value="{{$user->name}}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="Buat Username" class="form-control @error('username')
    is-invalid
@enderror" value="{{$user->username}}">
    @error('username')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Nomor HP</label>
    <input type="number" name="phone" id="phone" placeholder="Masukkan nomor hp" class="form-control @error('phone')
    is-invalid
@enderror" value="{{$user->phone}}">
    @error('phone')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="address">Alamat</label>
    <textarea name="address" id="address" rows="3" class="form-control @error('address')
    is-invalid
@enderror" placeholder="Alamat">{{$user->address}}</textarea>
    @error('address')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="role">Hak Akses</label>
    <select name="role" id="role" class="form-control">
        <option value="admin" {{$user->role == "admin" ? "selected" : ""}}>Admin</option>
        <option value="user" {{$user->role == "user" ? "selected" : ""}}>User</option>
    </select>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Masukkan password" class="form-control">
</div>
<div class="form-group">
    <label for="password_confirmation">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" class="form-control">
</div>
<div class="form-action">
    <button type="submit" class="btn btn-primary">Update User</button>
    <button type="reset" class="btn btn-warning">Reset Form</button>
</div>
</form>
@endsection
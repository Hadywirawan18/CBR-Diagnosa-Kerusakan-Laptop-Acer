@extends('layouts.admin')

@section('users.index')
    active
@endsection

@section('content')
   <form action="{{route("users.store")}}" method="post">
@csrf
<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" placeholder="Masukkan nama" class="form-control @error('name')
        is-invalid
    @enderror" autocomplete="false">
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
@enderror" autocomplete="false">
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
@enderror" autocomplete="off">
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
@enderror" placeholder="Alamat"></textarea>
    @error('address')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="role">Hak Akses</label>
    <select name="role" id="role" class="form-control">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Masukkan password" class="form-control @error('password')
    is-invalid
@enderror">
    @error('password')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password_confirmation">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" class="form-control @error('password_confirmation')
    is-invalid
@enderror">
    @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
    @enderror
</div>
<div class="form-action">
    <button type="submit" class="btn btn-primary">Tambah User</button>
    <button type="reset" class="btn btn-warning">Reset Form</button>
</div>
</form>
@endsection
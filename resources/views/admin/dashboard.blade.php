@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2>Admin Dashboard 👑</h2>
    <ul>
        <li><a href="/admin/verification">Verifikasi Toko</a></li>
        <li><a href="/admin/users">Management User & Store</a></li>
    </ul>
</div>
@endsection

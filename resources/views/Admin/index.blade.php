@extends('auth.layouts')

@section('content')

@foreach ($users as $user)
    <p>{{ $user->name }} - {{ $user->email }}</p>
    <a href="{{ route('admin.users.edit', $user) }}">Edit</a>
@endforeach
@endsectio
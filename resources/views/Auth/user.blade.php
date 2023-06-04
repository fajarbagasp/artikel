
@extends('auth.layouts')

@section('content')
<ul class="list-group">
    <li class="list-group-item">
        <a href="{{ route('articles.index') }}" class="text-decoration-none">List Articles</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('articles.create') }}" class="text-decoration-none">Create Article</a>
    </li>
</ul>


@endsection
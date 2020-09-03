@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.article') }}">Публикации</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.user') }}">Пользователи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.rating') }}">Оценки</a>
        </li>
    </ul>
    @include('include.admin-panel.user')
@endsection
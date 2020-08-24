@extends('layouts.app')

@section('content')
<div class="row article_additionals">
    <div class="col">
        <div class="preview"><img src="{{ asset($user->avatar)}}" alt="Автор статьи" style="width: 100%"></div>
        <h3>{{$user->name}}</h3>
        <span>Количество статей: {{$user->count_articles()}}<br /></span>
        <span>Рейтинг: {{$user->my_rating()}} / 100<br /></span>
        <span>Карма: {{$user->my_karma()}} / 100</span>
    </div>
</div>
<hr />
@endsection
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
@if(isset($articles))
<div class="row justify-content-left mt-1">
    <?php $counforeach=0; ?>
    @foreach($articles as $article)
        @if($counforeach%3==0)
            </div>
            <div class="row justify-content-left">                                
        @endif
        @include('include.article_user')
        <?php $counforeach++; ?>
    @endforeach
</div>
<div class="row justify-content-center mt-1">
    <tr class="endtable">
        <th scope="col" colspan="5">{{ $articles->links() }}
    </tr>
</div>
@endif
@endsection
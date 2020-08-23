@section('post')
<div class="row justify-content-center mb-2 articles" id="{{$article->id}}" >
    <div class="col col-lg-3 px-0">
        <div class="d-flex flex-column align-items-center">
            {{-- {{$article->user()->pluck('avatar')->first()}} --}}
            {{-- {{$article->user()->pluck('avatar')}} --}}
            <img src="{{ asset($article->preview)}}" alt="avatar" style="width: 100%">
            {{-- <span>{{$article->user()->pluck('name')->first()}}</span> --}}
        </div>
    </div>
    <div class="col">
        <div class="rating">
            <div class="bar-rating jstars" data-value="{{$article->my_ratings()/2}}" data-total-stars="5" data-color="#DCDCAA" data-empty-color="#1E1D2B" data-size="30px"></div>
            <div class="total-rating">{{round($article->my_ratings()/2,2)}}</div>
        {{-- <label class="rating">rating..</label> --}}
        </div>

        <h2>{{ $article->title }}</h2>
        <div class="discription">
            <span>{{$article->discription}}</span>
        </div>
        <div class="author"><span>Автор: <a class="author" href="{{ route('user', $article->my_user()) }}" title="Автор статьи">{{ $article->my_user() }}</a></span></div>
        <div class="date"><span>Опубликовано: {{ $article->created_at }}</span></div>

        <div class="article_detail">
            <a href="{{ route('article', $article->id) }}" class="btn btn-outline-secondary btn-block">Подробнее..</a>
        </div>
    </div>
    <!-- <td class="px-5">
        <button class="articleDelete btn btn-danger btn-block" type="submit" data-href="{{ route('article-destroy')}}">Удалить</button>
    </td>
    <td class="px-5">
        <a href="{{ route('article-update-page', $article->id) }}"><button class="articleUpdate btn btn-primary btn-block" type="submit" >Обновить</button></a>
    </td> -->
</div>


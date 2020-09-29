<div class="col-4 articles-mini" id="{{$article->id}}">
    <div class="preview">
        <img src="{{ asset($article->preview)}}" alt="avatar" style="width: 100%">
    </div>
    <div class="rating">
        <div class="bar-rating jstars" data-value="{{$article->my_ratings()/2}}" data-total-stars="5" data-color="#DCDCAA" data-empty-color="#1E1D2B" data-size="15px"></div>
        <div class="total-rating">{{round($article->my_ratings()/2,2)}}</div>
    </div>

    <h3>{{ $article->title }}</h2>
    <div class="discription">
        <span>{{$article->discription}}</span>
    </div>
    <div class="date"><span>Опубликовано: {{ $article->created_at }}</span></div>

    <div class="article_detail">
        @auth
            @if(Auth::user()->id==$article->user_id)
                <div class="article-tool">
                    <div class="dropdown">
                        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenu{{$article->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$article->id}}">
                            {{-- <a class="dropdown-item" href="{{ route('article-destroy')}}">Удалить</a> --}}
                            <a class="dropdown-item" data="{{$article->id}}" href="{{ route('article.destroy', ['user_id' => $article->user_id, 'id' => $article->id])}}">Удалить</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('article.update', $article->id) }}">Редактировать</a>
                        </div>
                      </div>
                </div>
            @endif
        @endauth
        <a href="{{ route('article', $article->id) }}" class="btn btn-outline-secondary btn-block">Подробнее..</a>
    </div>
    @if($article->status_id!=3)
        <div class="status-article status{{$article->status_id}}">
            {{$article->my_status()}}
        </div>
    @endif
</div>

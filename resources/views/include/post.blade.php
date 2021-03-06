<div class="row justify-content-center mb-2 articles" id="{{$article->id}}">
    <div class="col col-lg-3 px-0">
        <div class="d-flex flex-column align-items-center art-image">
            <img src="{{ asset($article->preview)}}" alt="avatar" style="height: 100%">
        </div>
    </div>
    <div class="col p-2">
        <div class="rating">
            <div class="bar-rating jstars" data-value="{{$article->my_ratings()/2}}" data-total-stars="5" data-color="#DCDCAA" data-empty-color="#1E1D2B" data-size="30px"></div>
            <div class="total-rating">{{round($article->my_ratings()/2,2)}}</div>
        </div>
        <div class="author"><img src="{{ asset($article->user->avatar)}}" style="height: 20px; width: 20px;"><span class="badge badge-light"><a class="author" href="{{ route('viewuser', $article->user_id) }}" title="Автор статьи">{{ $article->my_user() }}</a></span></div>
        <a href="{{ route('article', $article->id) }}" class="none-a">
            <h2>{{ $article->title }}</h2>
            <div class="date">Опубликовано: {{ $article->created_at }}</div>

            <div class="discription">
                {{$article->discription}}<i class="fa fa-arrow-right" aria-hidden="true"></i>
            </div>
        </a>

        {{-- <div class="article_detail"> --}}
            {{-- @auth
                @if(Auth::user()->id==$article->user_id)
                    <div class="article-tool">
                        <div class="dropdown">
                            <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenu{{$article->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$article->id}}">
                                <a class="dropdown-item" href="#">Удалить</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Редактировать</a>
                            </div>
                          </div>
                    </div>
                @endif
            @endauth --}}
            {{-- <a href="{{ route('article', $article->id) }}" class="btn btn-outline-secondary btn-block">Подробнее..</a> --}}
        {{-- </div> --}}

    </div>
</div>


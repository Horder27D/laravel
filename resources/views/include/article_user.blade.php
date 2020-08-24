@section('article_user')
<div class="col-4 articles-mini" id="{{$achivment->id}}">
    <div class="preview">
        <img src="{{ asset($achivment->preview)}}" alt="avatar" style="width: 100%">
    </div>
    <div class="rating">
        <div class="bar-rating jstars" data-value="{{$achivment->my_ratings()/2}}" data-total-stars="5" data-color="#DCDCAA" data-empty-color="#1E1D2B" data-size="15px"></div>
        <div class="total-rating">{{round($achivment->my_ratings()/2,2)}}</div>
    </div>

    <h3>{{ $achivment->title }}</h2>
    <div class="discription">
        <span>{{$achivment->discription}}</span>
    </div>
    <div class="date"><span>Опубликовано: {{ $achivment->created_at }}</span></div>

    <div class="article_detail">
        @auth
            @if(Auth::user()->id==$achivment->user_id)
                <div class="article-tool">
                    <div class="dropdown">
                        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenu{{$achivment->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$achivment->id}}">
                            {{-- <a class="dropdown-item" href="{{ route('article-destroy')}}">Удалить</a> --}}
                            <a class="dropdown-item" data="{{$achivment->id}}" href="{{ route('article.destroy', ['user_id' => $achivment->user_id, 'id' => $achivment->id])}}">Удалить</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Редактировать</a>
                        </div>
                      </div>
                </div>
            @endif
        @endauth
        <a href="{{ route('article', $achivment->id) }}" class="btn btn-outline-secondary btn-block">Подробнее..</a>
    </div>
    @if($achivment->status_id!=3)
        <div class="status-article status{{$achivment->status_id}}">
            {{$achivment->my_status()}}
        </div>
    @endif
</div>

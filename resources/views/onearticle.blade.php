@extends('layouts.app')

@section('content')
    <div class="articles" style="box-shadow: 0 0 5px slategray;">
        <div class="article_time">{{$article->updated_at}}</div>
        <div class="preview">
            <img src="{{ asset($article->preview)}}" alt="preview" style="width: 100%">
        </div>
        <div style="min-height: 300px;">
            <h2>{{$article->title}}</h2>
            <hr />
            <p>{{$article->discription}}</p>
        </div>
        <hr />
        <div class="row article_additionals">
            <div class="col">
                <a class="author" href="{{ route('viewuser', $article->user_id) }}" title="Автор статьи">
                    <div class="preview"><img src="{{ asset($article->user()->pluck('avatar')->first())}}" alt="Автор статьи" style="width: 100%"></div>
                    <h3>{{$article->my_user()}}</h3>
                    <span>Количество статей: {{$article->attach_author()}}<br /></span>
                    <span>Рейтинг: {{$article->rating_author()}} / 100<br /></span>
                    <span>Карма: {{$article->karma_author()}} / 100</span>
                </a>
            </div>
            <div class="col">
                <div>
                    <span class="my-rating" id="rat1" data-rating="{{round($article->my_ratings(),2)}}"></span>
                    <span class="live-rating" id="rat11">{{round($article->my_ratings(),2)}}</span>
                </div>
                @auth
                <div>
                    <span class="my-rating" id="rat2" data-rating="0"></span>
                    <span class="live-rating" id="rat22">0</span>
                </div>
                @endauth
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $("#rat1").starRating({
    totalStars: 10,
    readOnly: true,
    useFullStars: true,
    disableAfterRate: false,
  });
  $("#rat2").starRating({
    totalStars: 10,
    starSize: 30,
    useFullStars: true,
    disableAfterRate: false,
    onHover: function(currentIndex, currentRating, $el){
      $('#rat22').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      $('#rat22').text(currentRating);
    },
    callback: function(currentRating, $el){
      alert('Вы хотите поставить оценку ', currentRating);
      console.log('DOM element ', $el);
  }
  });
</script>
@endsection
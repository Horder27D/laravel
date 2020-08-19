@section('post')
<div class="row justify-content-center mb-2 articles" id="{{$article->id}}" >
    <div class="col col-lg-2 px-0">
        <div class="d-flex flex-column align-items-center">
            {{-- {{$article->user()->pluck('avatar')->first()}} --}}
            {{-- {{$article->user()->pluck('avatar')}} --}}
            <img src="{{ $article->user()->pluck('avatar')->first()}}" alt="avatar" style="width: 100%">
            <span>{{$article->user()->pluck('name')->first()}}</span>
        </div>
    </div>
    <div class="col card">
        <div class="row card-header d-flex justify-content-between">
            <span>{{ $article->title }}</span>
            <div class="justify-content row align-items-center align-middle">
            <span class="col">опубликовано: {{ $article->created_at }}</span>

        </div>
    </div>
        <div class="row card-body">
            {{$article->discription}}
            {{$article->user_name}}
        </div>
    </div>
    <!-- <td class="px-5">
        <button class="articleDelete btn btn-danger btn-block" type="submit" data-href="{{ route('article-destroy')}}">Удалить</button>
    </td>
    <td class="px-5">
        <a href="{{ route('article-update-page', $article->id) }}"><button class="articleUpdate btn btn-primary btn-block" type="submit" >Обновить</button></a>
    </td> -->
</div>
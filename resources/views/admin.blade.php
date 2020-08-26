@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" role="tablist" id="admin-panel">
            <li class="nav-item">
                <a class="nav-link" id="article-tab" data-toggle="tab" href="#article" role="tab" aria-controls="article" aria-selected="false">Публикации</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">Пользователи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="rating-tab" data-toggle="tab" href="#rating" role="tab" aria-controls="rating" aria-selected="false">Оценки</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane" id="article" role="tabpanel" aria-labelledby="article-tab">
                Здесь публикации <br />
                @include('include.admin-panel.article')
            </div>
            <div class="tab-pane" id="user" role="tabpanel" aria-labelledby="user-tab">
                Здесь пользователи <br />
                @include('include.admin-panel.user')
            </div>
            <div class="tab-pane" id="rating" role="tabpanel" aria-labelledby="rating-tab">
                Здесь рейтинг <br />
                @include('include.admin-panel.rating')
            </div>
          </div>
        <h5 class="card-title">Сюда выводим</h5>
        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        $('#admin-panel li:first-child a').tab('show')
    })
</script>
@endsection
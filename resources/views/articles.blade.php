@extends('layouts.app')

@section('content')
<h2>Мои мубликации:
<a class="btn btn-outline-success add-article" href="{{ route('article.create', Auth::user()->id) }}">Добавить <strong>+</strong></a>

<hr />
</h2>
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

@section('after_content')

@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>   
<body>
    <span id="main_preload"></span>
    <table class="mainTable table">
        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <caption>Таблица Articles</caption>
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Текст</th>
                <th scope="col" colspan="2">Редактирование</th>
            </tr>
        </thead>
            <form class="formCreateArticle" action="{{ route('article-create')}}">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"><input type="text" class="form-control" placeholder="Введите заголовок.." id="title" name="title"></th>
                    <th scope="col"><input type="text" class="form-control" placeholder="Введите текст.." id="discription" name="discription"></th>
                    <th colspan="2" class="px-5"><button class="articleCreate btn btn-success btn-block" type="submit" data-href="{{ route('article-create')}}">Добавить</button></th>
                </tr>
            </form>
            @foreach($articles as $article)
                @include('include.rowtable')
            @endforeach
            <tr class="endtable">
                <th scope="col" colspan="5">{{ $articles->links() }}
            </tr>
    </table>
</body>
<script>
$(document).ready(function () {
    $('.articleDelete').on('click', function (e) {
        
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).data('href'),
            data: {
                id: $(this).closest('.trArticle').attr('id')
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $("#" + data).fadeOut(200);
            },
            error: function () {
                alert('Ошибка');
            }
        });
    });
    $('.articleCreate').on('click', function (e) {
        
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).data('href'),
            data: $('.formCreateArticle').serializeArray(),
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $( ".endtable" ).before(data);
            },
            error: function () {
                alert('Ошибка');
            }
        });
    });
});
</script>
</html> --}}
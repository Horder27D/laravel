@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Упс!</strong> Возникли некоторые проблемы с вашим изображением.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="card" action="{{ route('article.update.submite', $article->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputTitle">Заголовок</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Введите заголовок.." value="{{$article->title}}">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-2">
                    <label for="inputPreview">Заставка</label>
                    <input id="inputPreview" type="file" name="preview" class="form-control-file">
                    <hr />
                </div>
                <div class="form-group col">
                <textarea type="text" name="discription" id="inputDiscription" name="discription" class="form-control" rows="15" maxlength="65534" placeholder="Введите текст..">{{$article->discription}}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; justify-content: space-between;">
            <a href="{{ url()->previous() }}" class="btn btn-light">Назад</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deletModal{{$article->id}}">Подтвердить</button>
                
            @php
                $modalid='deletModal'.$article->id;
                $modaltitle='Редактирование '.$article->title;
                $modalbody='Вы уверены что хотите изменить данную публикацию?'.PHP_EOL.PHP_EOL.'Если вы подтвердите изменения данный пост будет отправлен на проверку.';
            @endphp
            @include('include.modal.submit')
        </div>
    </form>
@endsection
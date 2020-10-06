@extends('layouts.app')

@section('content')
    <h2>Создаём статью<hr /></h2>
    <form action="{{ route('article.create.submite', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <span>Заголовок:</span><br>
        <input type="text" id="title" name="title" class="form-control" placeholder="Введите наименование.."><br>
        <span>Заголовок:</span><br>
        <textarea type="text" id="discription" name="discription" class="form-control" maxlength="65534" placeholder="Введите текст.."></textarea><br>
        <span>Картинка (необязательно):</span><br>
        <input type="file" id="preview" name="preview" class="form-control-file" placeholder="Введите наименование.."><br>
        <button type="submit" class="btn btn-success btn-block" id="name-submit">Подтвердить</button>
    </form>
@endsection

@section('after_content')

@endsection
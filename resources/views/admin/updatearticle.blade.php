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
    <form class="card" action="{{ route('admin.article.update.submite', $article->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputTitle">Заголовок</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Введите заголовок.." value="{{$article->title}}">
                </div>
                <div class="form-group col-2">
                    <label for="inputStatus">Статус</label>
                    <select name="status" id="inputStatus" class="form-control">
                        @foreach ($status as $state)
                            @if($article->status_id==$state->id)
                                <option value="{{$state->id}}" selected>{{$state->name}}</option>
                            @else
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-2">
                    <label for="inputPreview">Заставка</label>
                    <input id="inputPreview" type="file" name="preview" class="form-control-file">
                    <hr />
                    <label for="inputDate">Изменить дату</label>
                    <input type="date" name="created_at" id="inputDate" value="{{$article->date()}}" min="1970-01-01">
                    <hr />
                    {{-- $article->created_at --}}
                    <label for="inputUser">Изменить<br /> пользователя</label>
                    <select name="user_id" id="inputUser" class="form-control">
                        @foreach ($users as $user)
                            @if($article->user_id==$user->id)
                                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                            @else
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                <textarea type="text" name="discription" id="inputDiscription" name="discription" class="form-control" rows="15" placeholder="Введите текст..">{{$article->discription}}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; justify-content: space-between;">
            <a href="{{ url()->previous() }}" class="btn btn-light">Назад</a>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </div>
    </form>
@endsection
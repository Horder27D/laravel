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
    <form class="card" action="{{ route('admin.user.update.submite', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputName">Имя</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Введите имя.." value="{{$user->name}}">
                </div>
                <div class="form-group col-2">
                    <label for="inputRoles">Права</label>
                    <select name="roles_id" id="inputRoles" class="form-control">
                        @foreach ($roles as $role)
                            @if($user->roles_id==$role->id)
                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputAvatar">Аватарка</label>
                    <input id="inputAvatar" type="file" name="avatar" class="form-control-file">
                    <hr />
                    <label for="inputDate">Изменить дату регистрации</label>
                    <input type="date" name="created_at" id="inputDate" value="{{$user->date()}}" min="1970-01-01">
                    <hr />
                    <label for="inputPassword">Изменить пароль</label>
                    <input type="text" name="password" class="form-control" id="inputPassword" placeholder="Введите пароль..">
                    <hr />
                    <label for="inputEmail">Изменить почту</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Введите почту.." value="{{$user->email}}">

                </div>
            </div>
        </div>
        <div class="card-footer" style="display: flex; justify-content: space-between;">
            <a href="{{ url()->previous() }}" class="btn btn-light">Назад</a>
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </div>
    </form>
@endsection
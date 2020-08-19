@extends('layouts.app')


@section('content')
<div class="panel panel-primary">
    <div class="panel-body">
        <span>Моё изображение:</span><br>
        <img src="{{ asset(Auth::user()->avatar) }}" style="width: 150px;">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif
        
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

        <form action="{{ route('image.upload.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" class="form-control-file">
            <span>Имя:</span><br>
            <input type="text" name="name" class="form-control" value='{{Auth::user()->name}}' placeholder="Введите новое имя.."><br>
            <button type="submit" class="btn btn-success btn-block" >Подтвердить</button>
        </form>
    </div>
</div>
{{ asset(Auth::user()->avatar) }}

@endsection
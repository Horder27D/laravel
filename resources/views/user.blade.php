@extends('layouts.app')


@section('content')
<div class="panel panel-primary">
    <div class="panel-body">
    
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
            <div class="file-container">
                <span>Моё изображение:<br /></span>
                <div class="beatiful-img">
                    <img id ="img" src="{{ asset(Auth::user()->avatar) }}" >
                    <label class="custom-file-upload">
                        <input id="imgInput" type="file" name="avatar" {{--class="form-control-file"--}}>
                    </label>
                </div>
                <button type="submit" class="btn btn-success btn-block" id="img-submit" disabled>Подтвердить</button>
            </div>
        </form>
        <form action="{{ route('update.user.name') }}" method="post" enctype="multipart/form-data">
            @csrf
            <span>Имя:</span><br>
            <input type="text" id="name" name="name" class="form-control" value='{{Auth::user()->name}}' placeholder="Введите новое имя.."><br>
            <button type="submit" class="btn btn-success btn-block" id="name-submit" disabled>Подтвердить</button>
        </form>
    </div>
</div>
<hr />



@endsection

@section('script')
<script>
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    }
    $("#imgInput").change(function(){
    $('#img-submit').prop('disabled', false);;
    readURL(this);
    });
    
    $("#name").change(function(){
    $('#name-submit').prop('disabled', false);;
    });
</script>
@endsection
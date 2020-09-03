@extends('layouts.app')

@section('content')
    @if (session('success'))
    <div class="alert alert-success my-popup" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.article') }}">Публикации</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}">Пользователи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.rating') }}">Оценки</a>
        </li>
    </ul>
    <nav class="nav" style="border-left: 1px solid #dee2e6; border-right: 1px solid #dee2e6; padding: 5px;">
        <label for="inpitSrot" style="margin-top: auto; margin-bottom: auto; margin-right: 5px;">Сортировка публикаций</label>
        <form class="form-inline" action="{{ route('admin.article') }}"{{--"#"--}} style="overflow: hidden">
            <select name="sort" id="inputSort" class="form-control">
                    <option value="1">По возрастанию даты</option>
                    <option value="2">По убыванию даты</option>
                    <option value="3">По наименованию</option>
                    <option value="4">По автору</option>
            </select>
            <div class="search" style="position: relative; display: flex;">
                <div class="search-item" style="display: none; position: relative; overflow: hidden; width: 0%;">
                    <input class="form-control" type="search" name="sortname" placeholder="Поиск.." aria-label="Search">
                </div>
                <button class="btn btn-outline-dark" type="submit" style="">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </nav>
    @include('include.admin-panel.article')
@endsection

@section('script')
<script>
    $(".alert").animate({right: "0"}, 1000);
    setTimeout(() => $(".alert").animate({right: "-25%"}, 2000), 3000);
    $("#inputSort").change(function(){
        console.log(this.value)
        if(this.value>2)
        {
            $('.search-item').show();
            $('.search-item').animate({width: "100%"}, 1000);
        }
        else
        {
            setTimeout(() => $(".search-item").hide(), 1000);
            $('.search-item').animate({width: "0%"}, 1000);
        }
    });
</script>
@endsection
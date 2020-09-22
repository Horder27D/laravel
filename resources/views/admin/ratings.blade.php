@extends('layouts.app')

@section('content')
    @include('include.alert.alert')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.article') }}">Публикации</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}">Пользователи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.rating') }}">Оценки</a>
        </li>
    </ul>
    @php
        $search=collect(['label' => 'Сортировка ', 
        'route' => '', 'option' => collect([
            ['id' => '1', 'text' => 'По возрастанию даты'],
            ['id' => '2', 'text' => 'По убыванию даты'],
            ['id' => '3', 'text' => 'Оценки статье'],
            ['id' => '4', 'text' => 'Оценки от пользователя'],
            ['id' => '5', 'text' => 'Оценки автору статьи']
        ])]);
    @endphp
    @include('include.admin-panel.search')
    @include('include.admin-panel.rating')
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
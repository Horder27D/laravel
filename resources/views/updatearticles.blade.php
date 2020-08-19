<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<style>
    body{
        background: whitesmoke;
    }
    .p-20{
        padding: 20px;
    }
    .m--20{
        margin-top: -20px;
        margin-left: -20px;
        margin-bottom: 1px;
    }
    .table{
        background: white;
    }
</style>
<div class="p-20">
    <a class="btn btn-info m--20" href="{{route('articles')}}">Вернуться назад</a>
    <table class="table">
        <caption>Изменение записи</caption>
                <tr>
                    <th scope="col">Заголовок</th>
                    <th scope="col" colspan="2">Текст</th>
                </tr>
        <form action="{{ route('article-update', $article->id) }}">
            <tr>
                <td><input type="text" class="form-control" name="title" value="{{$article->title}}" placeholder="Введите заголовок.."></td>
                <td><input type="text" class="form-control" name="discription" value="{{$article->discription}}" placeholder="Введите текст.."></td>
                <td class="px-5"><button type="submit" class="btn btn-success btn-block">Подтвердить</button></td>
            </tr>
        </form>
    </table>
</div>

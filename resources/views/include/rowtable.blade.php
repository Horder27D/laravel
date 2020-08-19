@section('row')
<tr class="trArticle" id="{{$article->id}}" >
    <td>{{$article->id}}</td>
    <td>{{$article->title}}</td>
    <td>{{$article->discription}}</td>
    <td class="px-5">
        <button class="articleDelete btn btn-danger btn-block" type="submit" data-href="{{ route('article-destroy')}}">Удалить</button>
    </td>
    <td class="px-5">
        <a href="{{ route('article-update-page', $article->id) }}"><button class="articleUpdate btn btn-primary btn-block" type="submit" >Обновить</button></a>
    </td>
</tr>
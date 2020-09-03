<div class="tab-article">
    @foreach ($articles as $article)
        <div class="art-item">
            <div class="art-item-content">
                <div class="art-item-preview">
                    <img src="{{ asset($article->preview)}}" alt="preview">
                    <span>{{$article->my_user()}}</span>
                </div>
                <h4>{{$article->title}}</h4>
                <p>{{$article->cut_discription(150)->discription}}</p>
                <span>Дата создания: {{$article->created_at}}</span>
                <p>Статус:
                    @if($article->status_id==1)
                        <strong style="color: orange;">
                    @elseif($article->status_id==2)
                        <strong style="color: red;">
                        @else
                        <strong style="color: limegreen;">
                    @endif
                    {{$article->my_status()}}</strong>
                </p>

            </div>
            <div class="tools">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#deletModal{{$article->id}}">Удалить</button>
                
                @php
                    $modalid='deletModal'.$article->id;
                    $modaltitle='Удаление '.$article->title;
                    $modalbody='Вы уверены что хотите удалить данный пост?';
                    $modalsuccess=route('admin.article.delete', $article->id);
                @endphp
                @include('include.modal.confirm')

                <a href="{{route('admin.article.update', $article->id)}}" class="btn btn-info" role="button">Редактировать</a>
            </div>
        </div>
    @endforeach
</div>
<tr class="endtable">
    <th scope="col" colspan="5">{{ $articles->links() }}
    {{-- <th scope="col" colspan="5">{{ $articles->appends(['art_page' => $articles->currentPage(), 'user_page' => $users->currentPage(), 'rat_page' => $ratings->currentPage(), 'sort' => $sort])->links() }} --}}
</tr>


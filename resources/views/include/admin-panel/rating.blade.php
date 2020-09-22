<div class="tab-rating">
    <div class="rating-item">
        <div class="rat-item-1"><label>Статья</label></div>
        <div class="rat-item-2"><label>Автор статьи</label></div>
        <div class="rat-item-3"><label>Оценщик</label></div>
        <div class="rat-item-4"><label>Дата оценки</label></div>
        <div class="rat-item-5"><label>Балл</label></div>
        <div class="rat-item-6"><label>Редактирование</label></div>
    </div>
    @if($ratings->isEmpty())
        <label>По данному запросу ничего не найдено</label>
    @endif
    @foreach ($ratings as $rating)
    <form class="rating-item" action="{{ route('admin.rating.update', $rating->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <form action="{{ route('admin.ratings.update', $rating->id) }}" method="post" enctype="multipart/form-data"> --}}
            <div class="rat-item-1">{{$rating->my_article()}}</div>
            <div class="rat-item-2">{{$rating->article_user()}}</div>
            <div class="rat-item-3">{{$rating->my_user()}}</div>
            <div class="rat-item-4">{{$rating->created_at}}</div>
            <div class="rat-item-5">
                <select name="total" id="{{$rating->id}}inputTotal" class="form-control">
                    @for($option=1; $option<=10; $option++)
                        @if($option==$rating->total)
                            <option value="{{$option}}" selected>{{$option}}</option>
                        @else
                            <option value="{{$option}}" >{{$option}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="rat-item-6">
                <button type="submit" class="btn btn-info">Изменить</button>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#deletModal{{$rating->id}}">Удалить</button>
                
                @php
                    $modalid='deletModal'.$rating->id;
                    $modaltitle='Удаление оценки статье '.$rating->articles->name;
                    $modalbody='Вы уверены что хотите удалить данную оценку?';
                    $modalsuccess=route('admin.rating.delete', $rating->id);
                @endphp
                @include('include.modal.confirm')

            </div>
    </form>
    @endforeach
</div>
<tr class="endtable">
    <th scope="col" colspan="5">{{ $ratings->links() }}
</tr>
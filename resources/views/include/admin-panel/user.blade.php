<div class="tab-user">
    @if($users->isEmpty())
        <label>По данному запросу ничего не найдено</label>
    @endif
    @foreach ($users as $user)
        {{-- <div class="user-item">{{$user->id}}</div> --}}
        <div class="user-item">
            <div class="user-item-content">
                <div class="user-item-preview">
                    <img src="{{ asset($user->avatar)}}" alt="avatar">
                </div>
                <h4>{{$user->name}}</h4>
                {{-- <p>{{$user->cut_discription(150)->discription}}</p> --}}
                <span>Количество статей: {{$user->count_articles()}}<br /></span>
                <span>Одобренных статей: {{$user->count_approved_articles()}}<br /></span>
                <span>Количество оценок: {{$user->count_rating()}}<br /></span>
                <span>Рейтинг: {{$user->my_rating()}} / 100<br /></span>
                <span>Карма: {{$user->my_karma()}} / 100</span>
                <p>Права:
                    @if($user->roles_id==4)
                        <strong style="color: blue;">
                    @elseif($user->roles_id==3)
                        <strong style="color: red;">
                        @elseif($user->roles_id==2)
                            <strong style="color: orange;">
                            @else
                                <strong>
                    @endif
                    {{$user->my_roles()}}</strong>
                </p>
                <small>Дата регистрации: {{$user->created_at}}</small>

            </div>
            <div class="tools">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#deletModal{{$user->id}}">Удалить</button>
                
                @php
                    $modalid='deletModal'.$user->id;
                    $modaltitle='Удаление '.$user->name;
                    $modalbody='Вы уверены что хотите удалить данного пользователя?';
                    $modalsuccess=route('admin.user.delete', $user->id);
                @endphp
                @include('include.modal.confirm')

                <a href="{{route('admin.user.update', $user->id)}}" class="btn btn-info" role="button">Редактировать</a>
            </div>
        </div>
    @endforeach
</div>
<tr class="endtable">
    <th scope="col" colspan="5">{{ $users->appends(['page' => $users->currentPage(),'sort' => $sort])->links() }}
</tr>
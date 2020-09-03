<div class="tab-user">
    @foreach ($users as $user)
        <div class="user-item">{{$user->id}}</div>
    @endforeach
</div>
<tr class="endtable">
    <th scope="col" colspan="5">{{ $users->appends(['page' => $users->currentPage(),'sort' => $sort])->links() }}
</tr>
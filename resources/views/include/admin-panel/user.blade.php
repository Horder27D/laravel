<div class="tab-user">
    @foreach ($users as $user)
        <div class="user-item">{{$user->id}}</div>
    @endforeach
</div>
<tr class="endtable">
    <th scope="col" colspan="5">{{ $users->appends(['art_page' => $articles->currentPage(), 'user_page' => $users->currentPage(), 'rat_page' => $ratings->currentPage(), 'sort' => $sort])->links() }}
</tr>
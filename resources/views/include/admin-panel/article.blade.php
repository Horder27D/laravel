{{-- <a href="{{route('adminka', 1)}}"></a> --}}
<div class="tab-article">
    @foreach ($articles as $article)
        <div class="art-item">{{$article->id}}</div>
    @endforeach
</div>
<tr class="endtable">
    <th scope="col" colspan="5">{{ $articles->appends(['art_page' => $articles->currentPage(), 'user_page' => $users->currentPage(), 'rat_page' => $ratings->currentPage()])->links() }}
</tr>
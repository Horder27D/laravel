<div class="tab-rating">
    @foreach ($ratings as $rating)
        <div class="rating-item-header">{{$rating->articles_id}}</div>
        <div class="rating-item">{{$rating->id}}</div>
    @endforeach
</div>
<tr class="endtable">
    <th scope="col" colspan="5">{{ $ratings->appends(['art_page' => $articles->currentPage(), 'user_page' => $users->currentPage(), 'rat_page' => $ratings->currentPage()])->links() }}
</tr>
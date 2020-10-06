<nav class="nav bg-white" style="border-left: 1px solid #dee2e6; border-right: 1px solid #dee2e6; padding: 5px;">
    <label for="inpitSrot" style="margin-top: auto; margin-bottom: auto; margin-right: 5px;">{{$search->get('label')}}</label>
    <form class="form-inline" action="{{$search->get('route')}}" style="overflow: hidden">
        <select name="sort" id="inputSort" class="form-control">
            @foreach ($search->get('option') as $option)
                <option value="{{$option['id']}}">{{$option['text']}}</option>
            @endforeach
        </select>
        <div class="search" style="position: relative; display: flex;">
            <div class="search-item" style="display: none; position: relative; overflow: hidden; width: 0%;">
                <input class="form-control" type="search" name="sortname" placeholder="Поиск.." aria-label="Search">
            </div>
            <button class="btn btn-outline-dark" type="submit" style="">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </button>
        </div>
    </form>
</nav>
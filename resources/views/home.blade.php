@extends('layouts.app')

@section('content')
    @auth
        <div class="container enter">

            <div class="alert alert-success alert-block my-popup" id="my-popup">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                {!! __('Поздравляю, вы вошли как <b>'.Auth::user()->name ).'</b>!..' !!}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
            
        </div>
    @endauth
    @if(isset($articles))
        @foreach($articles as $article)
            @include('include.post')
        @endforeach
        
        <div class="row justify-content-center mt-1">
            <tr class="endtable">
                <th scope="col" colspan="5">{{ $articles->links() }}
            </tr>
        </div>
    @endif
@endsection

@section('script')
<script>
    setTimeout(() => $("#my-popup").fadeOut(1000), 1000);
</script>
@endsection
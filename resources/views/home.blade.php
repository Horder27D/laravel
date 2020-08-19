@extends('layouts.app')

@section('content')
@auth
    <div class="container enter" {{-- style="opacity: 1;
                                        -webkit-transition: .4s ease-out;
                                        -webkit-transition-delay: 0.5s;
                                        -o-transition: .4s ease-out;
                                        -o-transition-delay: 0.5s;
                                        -moz-transition: .4s ease-out;
                                        -moz-transition-delay: 0.5s;
                                        transition: .4s ease-out;
                                        transition-delay: 0.5s;" --}}>

                <div class="my-popup">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {!! __('Поздравляю, вы вошли как <b>'.Auth::user()->name ).'</b>!' !!}
                </div>
    </div>
@endauth
@endsection

@section('post')
    @parent
@endsection
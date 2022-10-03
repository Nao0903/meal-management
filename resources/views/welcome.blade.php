@extends('layouts.app')

@section('content')
    
    @if (Auth::check())
    
        {{ Auth::user()->name }}
        
        @include('meals.index')
        
    @else
    
        <div class="center jumbotron">
            <div class="text-center">
                <h1>食事管理で健康的な生活</h1>
                
                {{--
                    d-flex flex-column bd-highlight : 横並び
                    d-grid gap-2 col-6 mx-auto : 中央揃え、幅調整
                --}}
                <div class="py-5">
                <div class="d-flex flex-column bd-highlight mb-3 d-grid gap-2 col-6 mx-auto">
                    
                    {{-- ログインページへのリンク --}}
                    {{--<li class="nav-item"><a href="#" class="nav-link">ログイン</a></li>--}}
                    {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-success']) !!}</li>
                    
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', '新規登録してサービスを利用する', [], ['class' => 'btn btn-lg btn-primary']) !!}
                    
                </div>{{--class="d-flex flex-column bd-highlight mb-3 d-grid gap-2 col-6 mx-auto"--}}
                </div>
            </div>{{--class="text-center"--}}
        </div>          
    @endif
    
    
@endsection
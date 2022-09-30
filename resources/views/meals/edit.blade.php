@extends('layouts.app')

@section('content')

    <h1>修正画面</h1>

    <div class="row">
        <div class="col-6">
            
            {{--    $meal:　MealsControllerのeditメソッドでMealモデルをインスタンス化した値()--}}
            
            {{--
                    store(新規作成メソッド)と違ってupdate(更新メソッド)のルーティングには $meals->id を渡す必要があります。(編集対象を特定している)
                    そのため、 'route' => ['meals.update', $meal->id] というルーティング指定になります。
                    配列の2つ目に $meal->id を入れることでupdateのURLである /meal/{meal} の {meal} にidが入ります。
            --}}
            
            {!! Form::model($meal, ['route' => ['meals.update', $meal->id], 'method' => 'put']) !!}

                <div class="form-group">
                
                    {!! Form::label('date', '日付:') !!}
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('user_id', 'ユーザID(動作確認用、本番は外部キー制約をつけて、この項目を消す):') !!}
                    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('kind', '種類:') !!}
                    {!! Form::text('kind', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('content', '食事:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    
                    {!! Form::label('calrie', 'カロリー(kcal):') !!}
                    {!! Form::text('calorie', null, ['class' => 'form-control']) !!}

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
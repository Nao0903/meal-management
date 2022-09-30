@extends('layouts.app')

@section('content')

    <h1>登録画面</h1>

    <div class="row">
        <div class="col-6">
        
            {{--
                    Form::model() 
                    第一引数:対象となるModelのインスタンスを取る
                    第二引数:連想配列を取る
                    ※'method' => 'post' を追加しても良いですが、フォームを作成するときはデフォルトでPOSTメソッドになるので今回は不要
                    （PUTメソッドやDELETEメソッドの場合には 'method' => 'put' や 'method' => 'delete' を付与することになる）
            --}}
                        {{--$meals:　MealsControllerのcreateメソッドでMealモデルをインスタンス化した値--}}
            {!! Form::model($meals, ['route' => 'meals.store']) !!}{{--このフォームで入力した値をstoreメソッドへ送る。--}}

                <div class="form-group">
                    
                    {{--
                        Form::label
                        第一引数:$mealsのインスタンス内にあるカラム
                        
                        ※mealsテーブルのカラムは全て入れないとエラーとなる。(デフォルト値やtimestampは自動で値が入る)
                    --}}
                    
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
                    
                    {{--nullを'xxxx'とすると、デフォルト値をxxxxに変更できる--}}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
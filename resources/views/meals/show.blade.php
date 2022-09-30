@extends('layouts.app')

@section('content')

    {{--各$mealは　MealsController　のshowメソッドから渡されたデータ--}}
    
    {{--$meal->xxxx の　xxxx　はカラム名--}}
    
    <h1>詳細表示</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $meal->id }}</td>
        </tr>
        <tr>
            <th>日付</th>
            <td>{{ $meal->date }}</td>
        </tr>
        <tr>
            <th>種類</th>
            <td>{{ $meal->kind }}</td>
        </tr>
        <tr>
            <th>内容</th>
            <td>{{ $meal->content }}</td>
        </tr>
        <tr>
            <th>カロリー</th>
            <td>{{ $meal->calorie }}</td>
        </tr>
        <tr>
            <th>ユーザId(動作確認用)</th>
            <td>{{ $meal->user_id }}</td>
        </tr>
    </table>

@endsection
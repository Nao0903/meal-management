@extends('layouts.app')

@section('content')

    <h2 class="text-center">食事管理</h1>
    {{--$mealsは　MealsController　のindexメソッドから渡されたデータ--}}
    {{--食事登録があれば表示する--}}
    @if (count($meals) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    {{--<th>id</th>--}}
                    <th>日付</th>
                    <th>種類</th>
                    <th>内容</th>
                    <th>カロリー(kcal)</th>
                    <th>修正</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meals as $meals)
                <tr>
                    {{--<td>{{ $meals->id }}</td>--}}
                    <td>{{ $meals->date }}</td>
                    <td>{{ $meals->kind }}</td>
                    <td>{{ $meals->content }}</td>
                    <td>{{ $meals->calorie }}</td>
                    <td>修正ボタン</td>
                    <td>削除ボタン</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
{{--

    Laravel Collectiveの link_to_route() 関数

    第1引数：ルーティング名
    第2引数：リンクにしたい文字列
    第3引数：/messages/{message} の {message} のようなURL内のパラメータに代入したい値を配列形式で指定（今回は不要なので空っぽの配列 []）
    第4引数：HTMLタグの属性を配列形式で指定（今回はBootstrapのボタンとして表示するためのクラスを指定）
    
--}}
    
    <div class="d-grid gap-2">
    {!! link_to_route('meals.create', '登録', [], ['class="btn btn-primary" type="button"']) !!}
    </div>

    
@endsection
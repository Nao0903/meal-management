@extends('layouts.app')

@section('content')

    <h2 class="text-center">食事管理</h1>
    {{--$mealsは MealsController のindexメソッドから渡されたデータ--}}
    {{--食事登録があれば表示する--}}
    
    {{--
        MealsControllerから渡された $meals というレコード群が1つ以上あれば（count($meals) が1以上）
        @foreach で1つずつ $meal として取り出します。
    --}}
    
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
                @foreach ($meals as $meal)
                <tr>
                    {{--<td>{{ $meal->id }}</td>--}}
                    <td>{{ $meal->date }}</td>
                    <td>{{ $meal->kind }}</td>
                    <td>{{ $meal->content }}</td>
                    <td>{{ $meal->calorie }}</td>
                    
                    {{--削除ボタン--}}
                    <td>{!! link_to_route('meals.edit', '修正', ['meal' => $meal->id],['class="btn btn-info" type="button"']) !!}</td>
                    
                    {{--削除ボタン    使用可--}}
                    <td>
                        {!! Form::model($meal, ['route' => ['meals.destroy', 'meal' =>$meal->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                    
                
                    
                    
                    {{--使用不可:  show.blade.phpに遷移してしまう GETでルーティングすればOK
                            <td>{!! link_to_route('meals.destroy', '削除', ['meal' => $meal->id],['class="btn btn-danger" type="button"']) !!}</td>
                    --}}
                    
                    {{--使用不可:show.blade.phpに遷移してしまう 
                            <td>
                            <form action="{{ route('meals.destroy', ['meal'=>$meal->id]) }}" method='POST'>
                              @csrf
                              <input type="hidden" name='_method' value='delete'>
                              <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                            </td>
                    --}}
                    
                </tr>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- 
        ページネーションのリンク
        ベージネーション: レコードの取得の範囲を決めて、その範囲内のもののみを表示する機能
    --}}
    
    {{ $meals->links() }}
    
{{--

    Laravel Collectiveの link_to_route() 関数

    第1引数：ルーティング名
    第2引数：リンクにしたい文字列
    第3引数：/messages/{message} の {message} のようなURL内のパラメータに代入したい値を配列形式で指定（今回は不要なので空っぽの配列 []）
    第4引数：HTMLタグの属性を配列形式で指定（今回はBootstrapのボタンとして表示するためのクラスを指定）
    
--}}
    
    <div class="d-grid gap-2">
    {!! link_to_route('meals.create', ' ＋ 追加', [], ['class="btn btn-primary" type="button"']) !!}
    </div>

    
@endsection
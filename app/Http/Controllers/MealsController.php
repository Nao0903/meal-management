<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meal;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            Mealモデルをインスタンス化し(恐らくlaravel内部でnewしている)、DBの値を全て取得
            $meals = Meal::all();
        */
        
        //Mealモデルをインスタンス化後、dateカラムで降順にして、表示件数を絞る
        //paginateを設定したので、 index.blade.phpにベージネーションのリンクをつける。
        $meals = Meal::orderBy('date', 'desc')->paginate(5);
        //'meeals'はビューファイル側で呼び出す変数名
        //$mealsはコントローラ内で生成した変数($meals = Meal::all();)
        return view('meals.index', [ 'meals' => $meals, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mealモデルをインスタンス化し、値を $meal に代入
        $meals = new Meal;
        
        //'meals'はビューファイル側で呼び出す変数名
        //$mealsはコントローラ内で生成した変数
        return view ('meals.create', ['meals' => $meals, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'date' => 'required',
            'user_id' => 'required',
            'kind' => 'required',
            'content' => 'required',
            'calorie' =>'required',
        ]);
        
        
        
        //リストを作成
        $meal = new Meal;//レコードを新規追加
        
        //create.blade.phpで受け取った値をインスタンス化したMealモデル($meal)へレコード内のカラムへ入れる。
        $meal->date = $request->date;
        $meal->user_id = $request->user_id;
        $meal->kind = $request->kind;
        $meal->content = $request->content;
        $meal->calorie = $request->calorie;
        
        //カラムへ保存
        $meal ->save();
        
        //トップページへリダイレクト
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // getでmeals/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //詳細のレコードは1件である為、ここでは単数形($meal)としている
        $meal = Meal::findOrFail($id);
        
        
        return view('meals.show', ['meal' => $meal, ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // getでmeals/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {

        //詳細のレコードは1件である為、ここでは単数形($meal)としている
        $meal = Meal::findOrFail($id);
        
        return view('meals.edit', ['meal' => $meal,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'date' => 'required',
            'user_id' => 'required',
            'kind' => 'required',
            'content' => 'required',
            'calorie' =>'required',
        ]);


        //idの値でレコードを検索して取得
        $meal = Meal::findOrFail($id);
        
        //Mealモデルで検索したレコード($meal)へ edit.blade.phpで受け取った値をカラムへ入れる
        $meal->date = $request->date;
        $meal->user_id = $request->user_id;
        $meal->kind = $request->kind;
        $meal->content = $request->content;
        $meal->calorie = $request->calorie;
        
        //カラムへ保存
        $meal ->save();
        
        //トップページへリダイレクト
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //idの値でレコードを検索して取得
        $meal = Meal::findOrFail($id);
        
        //レコード削除
        $meal->delete(); 
        
        //トップページへリダイレクトさせる
        return redirect('/');
    }
}

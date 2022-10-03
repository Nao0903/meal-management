<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     // データの作成
     $users = [
         ['name' => '太郎', 'age' => 24],
         ['name' => '花子', 'age' => 21]
     ];
     // カラムの作成
     $head = ['名前', '年齢'];

     // 書き込み用ファイルを開く
     $f = fopen('test.csv', 'w');
     if ($f) {
         // カラムの書き込み
         mb_convert_variables('SJIS', 'UTF-8', $head);
         fputcsv($f, $head);
         // データの書き込み
         foreach ($users as $user) {
            mb_convert_variables('SJIS', 'UTF-8', $user);
            fputcsv($f, $user);
         }
     }
     // ファイルを閉じる
     fclose($f);

     // HTTPヘッダ
     header("Content-Type: application/octet-stream");
     header('Content-Length: '.filesize('test.csv'));
     header('Content-Disposition: attachment; filename=test.csv');
     readfile('test.csv');

     return view('user.index', compact('users'));
}

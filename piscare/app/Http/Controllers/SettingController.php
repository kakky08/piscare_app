<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Storage;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('mypage.settings.settings');
    }

    public function icon(Request $request)
    {
        /* $disk = Storage::disk('s3');
        $file = $request->file;
        $path = $disk->putFile('images', $file, 'public');
        dd($file);
        return response()->json(['response' => $path], 200); */

        $disk = Storage::disk('s3');
        //postされてきた画像
        $image = $request->image;
        //putFileというのは、画像を保存して、その保存したパス（バケット以下を返してくれる関数、第一引数ディレクトリ名、第二引数画像データ、第３引数公開・非公開）
        $path = $disk->putFile('images', $image, 'public');
        dd($path);

        //$pathには保存してあるパスが返っていることがわかる
        //なのでデータベースに$pathを保存することで呼び出せるようになる
        return response()->json(['response' => $path], 200);
    }
}

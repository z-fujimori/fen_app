<?php
namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller{
    //index
    public function index(){
        return view('search/index');
    }

    public function redord(Request $request, Shop $shops){
        return view('search/index');
    }

    //店データを取得しshopsへ
    public function shops(Request $request){
        $data = $request->data;

        $key = config('services.HP.key');
        $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
        //パラメータを指定
        $options = [
            'query' => [
                'key' => $key,
                'lat' => $data['lat'],    //緯度
                'lng' => $data['lng'],    //経度
                'range' => $data['range'],   //半径
                'count' => 30,   //取得数1-100
                'format' => 'json',
            ],
        ];
        $method = "GET";
        //接続
        $client = new Client();
        $response = $client->request($method, $url, $options);
        //dd($response);
        $shops = $response->getBody();
        $shops = json_decode($shops, true);
        $shops = json_decode($response->getBody(), true);
        $shops = $shops['results']['shop'];
        $view = 7; //1ページに表示する数
        $shops = array_chunk($shops,$view);
        $page = [0,$view,count($shops)];
        //shopsブレードに取得したデータを渡す
        return view('search/shops')->with([
            'shops'=>$shops,'page'=>$page
        ]);
    }

    public function demo(Request $request){
        dd($request);
    } 

}
?>

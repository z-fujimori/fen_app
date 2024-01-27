<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller{
    //index
    public function index(){
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
        //shopsブレードに取得したデータを渡す
        return view('search/shops')->with([
            'shops'=>$shops['results']['shop'],
        ]);
    }

    public function demo(Request $request){
        dd($request);
    } 

}
?>

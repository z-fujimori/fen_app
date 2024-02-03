<?php
namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller{
    //index
    public function index(Shop $shop){
        return view('search/index')->with([
            'shops'=>null,
        ]);
    }

    public function shops(Request $request, Shop $shops){
        //クッキーからdbに保存した時のdate取得
        $date = $_COOKIE['time'];
        return view('search/index')->with([
            //dateによりdbで検索
            'shops'=>$shops->where('time',$date)->paginate(6),
        ]);
    }

    //店データを取得しshopsへ
    public function redord(Request $request,Shop $shop){
        $data = $request->data;

        $key = config('services.HP.key');
        $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
        $dist_api = 'http://vldb.gsi.go.jp/sokuchi/surveycalc/surveycalc/bl2st_calc.pl?';
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
        $shops = $response->getBody();
        $shops = json_decode($shops, true);
        $shops = $shops['results']['shop'];
        $date = strtotime('now');
        setcookie("time",$date,time()+60*60*24);
        setcookie("range",$data['range'],time()+60*60*24);
        $i = 0;
        foreach($shops as $index=>$shop_data){
            // 距離を計算
            $dist_data = cal_distanse($data['lng'],$data['lat'],$shop_data['lng'],$shop_data['lat']);
            //dbに保存
            $shop = new Shop;
            $input_data['name'] = $shop_data['name'];
            $input_data['logo_image'] = $shop_data['logo_image'];
            $input_data['address'] = $shop_data['address'];
            $input_data['lat'] = $shop_data['lat'];
            $input_data['lng'] = $shop_data['lng'];
            $input_data['dist'] = $dist_data;
            $input_data['genre'] = $shop_data['genre']['name'];
            $input_data['access'] = $shop_data['access'];
            $input_data['url'] = $shop_data['urls']['pc'];
            $input_data['image_pc'] = $shop_data['photo']['pc']['l'];
            $input_data['image_mobile'] = $shop_data['photo']['mobile']['l'];
            $input_data['open'] = $shop_data['open'];
            $input_data['close'] = $shop_data['close'];
            $input_data['time'] = $date;
            $shop->fill($input_data)->save();

        };
        return redirect('/shops');
    }
}

//2点座標から距離を求める（Haversineの公式）
function cal_distanse($lng1, $lat1, $lng2, $lat2){
    $lng1 = deg2rad($lng1);
    $lat1 = deg2rad($lat1);
    $lng2 = deg2rad($lng2);
    $lat2 = deg2rad($lat2);
    return 6378.1337 * acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($lng2-$lng1));
};

?>

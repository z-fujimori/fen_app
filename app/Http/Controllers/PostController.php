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

    public function shopPage(Shop $shop){
        return view('search/shop')->with([
            'shop'=>$shop->first(),
        ]);
    }

    public function shops(Request $request, Shop $shops){
        $date = $_COOKIE['time'];
        return view('search/index')->with([
            'shops'=>$shops->where('time',$date)->paginate(6),
        ]);
    }

    //店データを取得しshopsへ
    public function redord(Request $request,Shop $shop){
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
        $date = strtotime('now');
        setcookie("time",$date,time()+60*60*24);
        setcookie("range",$data['range'],time()+60*60*24);
        foreach($shops as $index=>$shop_data){
            $shop = new Shop;
            $input_data['name'] = $shop_data['name'];
            $input_data['logo_image'] = $shop_data['logo_image'];
            $input_data['address'] = $shop_data['address'];
            $input_data['lat'] = $shop_data['lat'];
            $input_data['lng'] = $shop_data['lng'];
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
        //window.localStorage.setItem('time',$date);
        //shopsブレードに取得したデータを渡す
        //return redirect("/shops?range={$data['range']}&date={$date}");
        return redirect('/shops')->with([
            'range'=>$data['range'],
            'time'=>$date,
        ]);
        return redirect('/shops');
    }

    public function demo(Request $request){
        dd($request);
    } 

}
?>

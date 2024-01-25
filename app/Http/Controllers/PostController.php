<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller{
    public function index(){
        $key = config('services.HP.key');
        $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/';
        
        $options = [
            'query' => [
                'key' => $key,
                'keyword' => '浦安',
                'count' => 10,
                'format' => 'json',
            ],
        ];
        
        //dd($url);
        $method = "GET";
        //接続
        $client = new Client();
        $response = $client->request($method, $url, $options);
        //dd($response);
        $shops = $response->getBody();
        $shops = json_decode($shops, true);
        $shops = json_decode($response->getBody(), true);
        //dd($shops['results']['shop']);
        // index bladeに取得したデータを渡す
        return view('search/index')->with([
            'shops' => $shops['results']['shop'],
        ]);
    }
    public function shops(){
        return view('search/shops');
    }
}
?>

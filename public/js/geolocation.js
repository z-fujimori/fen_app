window.onload = function () {
    // ボタンを押した時の処理
    document.getElementById("btn").onclick = function(){
        // 位置情報を取得する
        console.log("push button");
        window.navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    };
    // 取得に成功した場合の処理
    function successCallback(position){
        // // shopsページに遷移
        // window.location.href = "/shops";

        // 緯度経度
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // formのデータを取得する
        const f = document.getElementById("for");
        console.log(f);

        f.addEventListener('formdata',(e) => {
            var formdata = e.formData;
            // 緯度経度のデータを追加
            formdata.set("data[lat]",latitude);
            formdata.set("data[lng]",longitude);
        });
        //送信
        f.submit();
    };
    // 取得に失敗した場合の処理
    function errorCallback(error){
        alert("位置情報が取得できませんでした");
    };


    document.getElementById("aw").onclick = function(){
        console.log("page");
    };
};

document.getElementById("shop").onclick = function(){
    var shop = document.getElementById('shop');
    var id = shop.getAttribute('value');
    console.log(id);
};



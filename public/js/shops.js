console.log(LaravelPage);
console.log(LaravelShops);

const shopPage = document.getElementById('title');
const title = document.getElementById('title');
const img = document.getElementById('img')
const body = document.getElementById('body');

const newtitle = document.createElement('p');
newtitle.id = "title"
newtitle.className = "title";

const newimg = document.createElement('img');
newimg.id = "img"
newimg.className = "img";

const newbody = document.createElement('p');
newbody.id = "body"
newbody.className = "body";

function shopSet(page,shops){
    //要素をクリア

    for (let i=0;i<page[1];i++){
        newtitle.textContent = shops[page[0]][i]['name'];

    }
}
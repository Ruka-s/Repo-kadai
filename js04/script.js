const clientId = "f0ee95b784e04a54976892176c190c06";
const clientSecret = "15eb28c5234648568785685486c8aeb9";

async function getAccessToken(clientId, clientSecret) {
  const encodedCredentials = btoa(clientId + ":" + clientSecret);

  const response = await fetch("https://accounts.spotify.com/api/token", {
    method: "POST",
    headers: {
      Authorization: " Basic " + encodedCredentials,
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      grant_type: "client_credentials",
    }),
  });

  const data = await response.json();
  return data.access_token;
}

getAccessToken(clientId, clientSecret)
  .then((accessToken) => {
    console.log("アクセストークン:", accessToken);
    // アクセストークンを使ってSpotify APIを呼び出す
  })
  .catch((error) => {
    console.error("エラー:", error);
  });

const fetchArtistInfo = async (artistName) => {
    // const token = await getAccessToken();
    const accessToken = await getAccessToken(clientId, clientSecret);
    // アーティストのIDを検索
    const searchResponse = await fetch(`https://api.spotify.com/v1/search?q=${encodeURIComponent(artistName)}&type=artist`, {
        headers: {
            'Authorization': `Bearer `+ accessToken
        }
    });
    const searchData = await searchResponse.json();
    const artist = searchData.artists.items[0];
    if (artist) {
       
        document.getElementById("PreArtistName").innerHTML = `${artist.name}`;
        document.getElementById("followers").innerHTML = `${artist.followers.total}`;
        document.getElementById("genres").innerHTML =`${artist.genres.join(', ')}`;
        document.getElementById("external_url").innerHTML =`${artist.external_urls.spotify}`;
        document.getElementById("image").innerHTML =`<img src="${artist.images[0]?.url}" alt="" class="max-h-36">`;
        document.getElementById("popularity").innerHTML =`${artist.popularity}`;

        
        // アーティスト情報を表示
        console.log('アーティスト名:', artist.name);
        console.log('フォロワー数:', artist.followers.total);
        console.log('ジャンル:', artist.genres.join(', '));
        console.log('Spotify URL:', artist.external_urls.spotify);
        console.log('画像 URL:', artist.images[0]?.url);
        console.log('人気度:', artist.popularity);
    } else {
        console.log('アーティストが見つかりませんでした');
    }
    
};


// 入力されたアーティストの情報を取得
function clickBtn(){
    const name = document.getElementById("artistname").value;
    fetchArtistInfo(name);
};


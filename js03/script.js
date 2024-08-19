// Firebaseの初期化
const firebaseConfig = {
    // Firebaseプロジェクトの構成情報
    apiKey: "AIzaSyCmHz5LJyNi49MWrtwJ9yfFiAiCrAhDYXo",
    authDomain: "rss-demo-209d8.firebaseapp.com",
    databaseURL: "https://rss-demo-209d8-default-rtdb.firebaseio.com",
    projectId: "rss-demo-209d8",
    storageBucket: "rss-demo-209d8.appspot.com",
    messagingSenderId: "752373098377",
    appId: "1:752373098377:web:2deb17d9e3ffec010ea358"
  };
  const firebaseApp = firebase.initializeApp(firebaseConfig);
  const database = firebase.database();

    // let feedname = document.getElementById("feedname");
    // let btn = document.getElementById("send");
    // btn.onclick = registerFeed(feedname);

window.onload = function () {
    document.getElementById("send").onclick = function() {
        let feedname = document.getElementById("feedname").value;
        registerFeed(feedname);
    };
  };
// RSSフィードのURL
//   const feedUrl = "https://www.lifehacker.jp/feed/index.xml";
// const feedUrl = "https://ascii.jp/mac/rss.xml";

const feedsRef = database.ref('feeds');

// RSSフィードを登録する関数
function registerFeed(feedUrl) {
    // RSSフィードのURLを検証する
    // if (!isValidUrl(feedUrl)) {
    //   alert('無効なRSSフィードURLです。');
    //   return;
    // }
  
    // Realtime DatabaseにRSSフィードを保存する
    feedsRef.push({
      url: feedUrl,
      lastUpdated: 0, // 初期値として0を設定
    })
    .then(snapshot => {
      console.log('RSSフィードが登録されました:', snapshot.key);
      console.log(feedUrl);
    })
    .catch(error => {
      console.error('RSSフィードの登録に失敗しました:', error);
    });
  }

  // 最新の記事のIDを保存する変数
  let lastArticleId = null;
  
//   // 定期的にRSSフィードを監視する関数
//   function checkFeed() {
//     fetch(feedUrl)
//       .then(response => response.text())
//       .then(xml => {
//         // XMLパーサーを使ってRSSフィードを解析
//         const parser = new DOMParser();
//         const xmlDoc = parser.parseFromString(xml, "text/xml");
  
//         // 最新の記事を取得
//         const items = xmlDoc.querySelectorAll("item");
//         const latestItem = items[0];
  
//         // 最新の記事のIDを取得
//         const articleId = latestItem.querySelector("guid").textContent;
  
//         // 新しい記事がある場合
//         if (articleId !== lastArticleId) {
//             console.log("RSSフィードの取得に成功しました");
//           // Firebase Databaseに記事情報を保存
//           database.ref("articles").push({
//             title: latestItem.querySelector("title").textContent,
//             link: latestItem.querySelector("link").textContent,
//             description: latestItem.querySelector("description").textContent,
//             pubDate: latestItem.querySelector("pubDate").textContent
//           });
  
//           // 最新の記事のIDを更新
//           lastArticleId = articleId;
//         }
//         else{
//             console.log("新規記事はありません");
//         }
//       })
//       .catch(error => {
//         console.error("RSSフィードの取得に失敗しました:", error);
//       });
//   }
  
//   // 1分ごとにRSSフィードを監視
//   setInterval(checkFeed, 60000);
// RSSフィードを定期監視する関数
function monitorFeeds() {
    // Realtime DatabaseからRSSフィードの配列を取得する
    // feedsRef.on('value', snapshot => {
    //   snapshot.forEach(childSnapshot => {
    //     const feed = childSnapshot.val();
    //     const feedUrl = feed.url;
    //     console.log(feedUrl + "を確認します");
    //     const lastUpdated = feed.lastUpdated;
  
    //     // RSSフィードを解析する
    //     fetch(feedUrl)
    //     .then(response => response.text())
    //     .then(xml => {
    //       // XMLを解析して新しい記事を取得する
    //       const parser = new DOMParser();
    //       const xmlDoc = parser.parseFromString(xml, 'text/xml');
    //       const items = xmlDoc.querySelectorAll('item');
  
    //       // 新しい記事があればRealtime Databaseに更新する
    //       items.forEach(item => {
    //         const pubDate = new Date(item.querySelector('pubDate').textContent).getTime();
    //         if (pubDate > lastUpdated) {
    //           // 新しい記事をRealtime Databaseに保存する
    //           feedsRef.child(childSnapshot.key).update({
    //             lastUpdated: pubDate,
    //             // 新しい記事の情報を追加する
    //           })
    //           .then(() => {
    //             console.log('RSSフィードが更新されました:', childSnapshot.key);
    //           })
    //           .catch(error => {
    //             console.error('RSSフィードの更新に失敗しました:', error);
    //           });
    //         }
    //       });
    //     })
    //     .catch(error => {
    //       console.error('RSSフィードの解析に失敗しました:', error);
    //     });
    //   });
    // });
    const count = 2;
    feedsRef.on('value', snapshot => {
        
            snapshot.forEach(childSnapshot => {
                const feed = childSnapshot.val();
                const feedUrl = feed.url;
                
                const lastUpdated = feed.lastUpdated;
          
                // RSSフィードを解析する
                fetch(feedUrl)
                .then(response => response.text())
                .then(xml => {
                  // XMLを解析して新しい記事を取得する
                  const parser = new DOMParser();
                  const xmlDoc = parser.parseFromString(xml, 'text/xml');
                  const items = xmlDoc.querySelectorAll('item')
                  const latestItem = items[0];
                  const articleId = latestItem.querySelector("guid").textContent;
                  if (articleId !== lastArticleId) {
                                console.log("RSSフィードの取得に成功しました");
                              // Firebase Databaseに記事情報を保存
                              database.ref("articles").push({
                                title: latestItem.querySelector("title").textContent,
                                link: latestItem.querySelector("link").textContent,
                                description: latestItem.querySelector("description").textContent,
                                pubDate: latestItem.querySelector("pubDate").textContent
                              });
                      
                              // 最新の記事のIDを更新
                              lastArticleId = articleId;
                            }
                            else{
                                console.log("新規記事はありません");
                            }
                  // 新しい記事があればRealtime Databaseに更新する
                //   if(count>0){
                //     count = count -1;
                //   items.forEach(item => {
                //     const pubDate = new Date(item.querySelector('pubDate').textContent).getTime();
                //     if (pubDate > lastUpdated) {
                //       // 新しい記事をRealtime Databaseに保存する
                //       feedsRef.child(childSnapshot.key).update({
                //         lastUpdated: pubDate,
                //         // 新しい記事の情報を追加する
                //       })
                //       .then(() => {
                //         console.log('RSSフィードが更新されました:', childSnapshot.key);
                //       })
                //       .catch(error => {
                //         console.error('RSSフィードの更新に失敗しました:', error);
                //       });
                //     }
                //   });
                // }
            })
                .catch(error => {
                  console.error('RSSフィードの解析に失敗しました:', error);
                });
              });
              
        
      });
  }
  // 定期監視のスケジュールを設定する
  setInterval(monitorFeeds, 60000); // 1分ごとに監視
  

  // URLの検証関数
function isValidUrl(url) {
    // URLの検証ロジックを実装する
    // 例：正規表現を使用する
    return /^(https?:\/\/[^\s]+)$/.test(url);
  }
  
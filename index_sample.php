<?php
if (isset($_POST['query'])) {
  $query = urlencode($_POST['query']);
  $apiKey = 'AIzaSyDpaDTJ_iKeTU35KPbu64UCJTXYhoEpCWg';  // 取得したAPIキーをここに入力
  $url = "https://www.googleapis.com/books/v1/volumes?q={$query}";

  $response = file_get_contents($url);

  $file = fopen("./data/data.csv","w+");
  fwrite($file, $response);
  fclose($file);
  echo json_encode(["success" => true]);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>Google Books API Search</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <input type="text" id="search" placeholder="本のタイトルを入力">
  <button id="searchButton">検索</button>
  <div id="results"></div>

  <script>
  $(document).ready(function() {
            $('#searchButton').click(function() {
                var query = $('#search').val();
                $.ajax({
                    url: 'index_sample.php',  // PHPスクリプトのパス
                    type: 'POST',
                    data: { query: query },
                    success: function(data) {
                        var books = JSON.parse(data);
                        $('#results').empty();
                        books.items.forEach(function(book) {
                            var title = book.volumeInfo.title;
                            var authors = book.volumeInfo.authors.join(', ');
                            $('#results').append('<p>' + title + ' by ' + authors + '</p>');
                        });
                    }
                });
            });
        });

  </script>
</body>

</html>
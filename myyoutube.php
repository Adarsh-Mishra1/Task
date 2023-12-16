<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouTube Video Player</title>
</head>
<body>
  <?php
    
    $videoId = '_inKs4eeHiI';

   //api key
    $apiKey = 'AIzaSyC-zHnoclx6M7gzW_aIWimjOt3LAemVszM';

    
    $apiUrl = "https://www.googleapis.com/youtube/v3/videos?id={$videoId}&key={$apiKey}&part=snippet";
    $response = file_get_contents($apiUrl);
    $videoDetails = json_decode($response, true);

    if (!empty($videoDetails['items'])) {
      $videoTitle = $videoDetails['items'][0]['snippet']['title'];
      $videoDescription = $videoDetails['items'][0]['snippet']['description'];
      $embedUrl = "https://www.youtube.com/embed/{$videoId}";
  ?>
      <h2><?php echo $videoTitle; ?></h2>
      <p><?php echo $videoDescription; ?></p>
      <iframe width="640" height="360" src="<?php echo $embedUrl; ?>" frameborder="0" allowfullscreen></iframe>
  <?php
    } else {
      echo 'Error fetching video details.';
    }
  ?>
</body>
</html>

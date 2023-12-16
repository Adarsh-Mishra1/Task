<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $apiKey = 'AIzaSyC-zHnoclx6M7gzW_aIWimjOt3LAemVszM';
    $videoUrl = $_POST['videoUrl'];
    //extracting the vido url
    function getVideoIdFromUrl($url) {
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    $videoId = getVideoIdFromUrl($videoUrl);

    if ($videoId) {
        // YouTube Data API
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
    } else {
        echo 'Invalid YouTube video URL.';
    }
}
?>

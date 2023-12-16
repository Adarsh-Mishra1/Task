<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Details Task</title>
</head>
<body>
    <h2>YouTube Video Details</h2>
    <form action="fetch_video.php" method="post">
        <label for="videoUrl">Enter YouTube Video URL:</label>
        <input type="text" id="videoUrl" name="videoUrl" required>
        <button type="submit">Fetch Video Details</button>
    </form>
</body>
</html>

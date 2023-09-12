<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <h1>State Message Parser</h1>
    <form id="ndc-form" action="" method="post">
        <label for="ndc-message">Paste NDC Message here</label>
        <textarea id="ndc-message" name="ndc_message"></textarea>
        <button type="submit" name="submit">Parse</button>
    </form>

    <?php
    include('src\Handler.php');
    if (isset($_POST['submit'])) {
        $handler = new Handler();
        $message = $_POST['ndc_message'];
        echo '<div class="parsed-message">';
        echo '<h2>Parsed Message</h2>';
        echo '<ul>';
        $handler->processMessage($message);
        echo '</ul> </div>';
    }
    ?>
    <script src="/js/app.js"></script>
</body>
</html>
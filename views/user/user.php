<?php
$controller = new SquareController();
$square = $controller->getAll();


?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="/views/js/flashMe.js"></script>
    <script src="/views/script.js"></script>
    <link rel="stylesheet" href="/views/style.css">
</head>
<body>
<h2><a href="/user/logout">Log Ouut</a></h2>
<button class="" id="addDiv" > </button>
<h1>Profile</h1>
<?= $_SESSION['name']?>
<div class="cont-dragg">
    <?php
    foreach ($square as $item) {
        ?>
        <div class='draggable' id="draggable<?= $item['0'] ?>" style="left: <?= $item['2'] ?>;top: <?= $item['3'] ?>;background-color: <?= $item['1'] ?>;transition: background-color 500ms linear;"></div>
        <?php
    }
?>
</div>

</body>
</html>
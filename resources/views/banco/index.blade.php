<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bàn cờ vua</title>

    <style>
        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: #f4f6f8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 70px;
        }

        h1 {
            margin-bottom: 25px;
            color: #333;
        }

        .chessboard {
            display: grid;
            grid-template-columns: repeat({{ $n }}, 60px);
            grid-template-rows: repeat({{ $n }}, 60px);
            border: 6px solid hsl(240, 6%, 13%);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .cell {
            width: 60px;
            height: 60px;
        }

        .white {
            background-color: #f7f7f7;
        }

        .black {
            background-color: #000000;
        }
    </style>
</head>
<body>

<h1>Bàn cờ vua {{ $n }} x {{ $n }}</h1>

<div class="chessboard">
<?php
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++) {
        $color = (($i + $j) % 2 == 0) ? 'white' : 'black';
        echo "<div class='cell $color'></div>";
    }
}
?>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        .info {
            font-size: 18px;
            margin-bottom: 15px;
            color: #34495e;
        }

        .label {
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Thông tin sinh viên</h1>

        <div class="info">
            <span class="label">Họ và tên:</span> {{ $name }}
        </div>

        <div class="info">
            <span class="label">MSSV:</span> {{ $mssv }}
        </div>
    </div>

</body>
</html>

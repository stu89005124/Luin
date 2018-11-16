<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>機票訂購系統</title>
    <style>
        body {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .block {
            border: 1px solid #000;
            width: 400px;
            height: 200px;
            text-align: center;
        }

        .test {
            margin-bottom: 15px;
            margin-top: 15px;
        }
        input {
            margin-top: 90px;
        }
    </style>
</head>

<body>
    <div class="block">
        <div class="test">
            <label for="">出發地點</label>
            <select name="" id="">
                <option value="">台北</option>
                <option value="">桃園</option>
                <option value="">台中</option>
            </select>
            <select name="" id="">
            </select>
        </div>
        <div class="test2">
            <label for="">抵達機場</label>
            <select name="" id="">
                <option value="">日本</option>
                <option value="">韓國</option>
                <option value="">泰國</option>
            </select>
            <select name="" id="">
            </select>
        </div>
        <input type="button" value="送出">
    </div>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <title><?=$title ?></title>
        <style>
        h1 {font-size:48pt;
                margin: 0px 0px 10px 0px; padding: 0px 20px; color:white;
                background: linear-gradient(to right, #aaa, #fff); }
        p {font-size:14pt; color:#666;}
        </style>
</head>
<body>
    <!-- <p>This is sample content.</p>
    <p>これは、Helloレイアウトを利用したサンプルです。</p> -->

    <p>金額は、<?=$this->Number->currency(1234567, 'JPY') ?></p>
    <p>2桁で表すと、<?=$this->Number->precision(1234.56789, 2) ?>です。</p>
    <p>割合は、<?=$this->Number->toPercentage(0.12345, 2, ['multiply'=>true]) ?></p>
</body>
</html>
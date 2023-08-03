<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sales</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ハンバーガー売上計算アプリ</h1>
    　<div class="flex justify-center">
        <table>
            <tr>
                <th>年月日</th>
                <th>自販機</th>
                <th>コラム</th>
                <th>商品</th>
                <th>売上</th>
                <th>廃棄</th>
                <th>詳細</th>
            </tr>
        　　@foreach($sales as $sale)
        　　<tr>
        　　  <td>{{ $sale->year }}年{{ $sale->month }}月{{ $sale->date }}日</td>
        　　  <td>{{ $sale->vending_machine_id }}</td>
        　　  <td>{{ $sale->column_id}}</td>
        　　  <td>{{ $sale->product_id }}</td>
        　　  <td>{{ $sale->solds }}</td>
        　　  <td>{{ $sale->discards }}</td>
        　　  <td><button type="button" onclick="location.href='/sales/{{ $sale->id }}'">編集</button></td>
        　　</tr>
        　　@endforeach
        </table>
      </div>
        　　
    </body>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sales</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1>売上詳細</h1>
    <table>
        <tr>
            <th>年月日</th>
             <td>{{ $sale->year }}年{{ $sale->month }}月{{ $sale->date }}日</td>
        </tr>
        <tr>
            <th>自販機</th>
             <td>{{ $sale->vending_machine_id }}</td>
        </tr>
         <tr>
            <th>商品</th>
             <td>{{ $sale->product_id }}</td>
        </tr>
        <tr>
            <th>売上</th>
             <td>{{ $sale->solds }}</td>
        </tr>
        <tr>
            <th>廃棄</th>
             <td>{{ $sale->discards }}</td>
        </tr>
    </table>
        
    </body>
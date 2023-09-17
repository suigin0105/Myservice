<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sales</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1>売上登録</h1>
    <form action="/sales" method="POST">
        @csrf
        ログイン者:{{ $user_name }}
        <div class='vendingmachine'>
            <h2>自販機名</h2>
            <select name='select[vendingmachine_id]'>
                @foreach($vendingmachines as $vendingmachine)
                    <option value="{{ $vendingmachine->id }}">{{ $vendingmachine->name }}</option>
                @endforeach
            </select>
        </div>
        <div class='column'>
            <h2>自販機コラム番号</h2>
            <select name='select[column_id]'>
                @foreach($columns as $column)
                    <option value="{{ $column->id }}">{{ $column->name }}</option>
                @endforeach
            </select>
        </div>
        <div class='date'>
            <h2>年月日・計上日</h2>
             <input type='number' name='sale[year]' min='1900' placeholder="年"/>
             <input type='number' name= 'sale[month]' max='12' min='1' placeholder="月"/>
             <input type='number' name= 'sale[date]' max='31' min='1' placeholder="日"/>
        </div>
        <div class='solds'>
            <h2>売上・廃棄個数</h2>
             <input type='number' name='sale[solds]' min='10000' placeholder="売上個数"/>
             <input type='number' name='sale[discards]' min='10000' placeholder="廃棄個数"/>
        </div>
        <input type="submit" value="保存"/>
        <a href="/sales">戻る</a>
    </form>
    </body>


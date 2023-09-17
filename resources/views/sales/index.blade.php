@extends('app')

@section('content')

   <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">自販機売上管理システム</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="/sales/create">売上登録・一覧</a>
            <a class="btn btn-success" href="/products">商品登録・一覧</a>
            </div>
        </div>
    </div>
        ログインID:{{ $user_name }}
        <form action="/sales/store" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>年月日</th>
                <th>自販機</th>
                <th>コラム</th>
                <th>商品</th>
                <th>売上</th>
                <th>廃棄</th>
            </tr>
            <tr>
                <th>
                    <input type='number' name='year' min='1900' placeholder="年">
                    <input type='number' name='month' max='12' min='1' placeholder="月">
                    <input type='number' name='dates' max='31' min='1' placeholder="日">
                </th>
                <th>
                    <select name='vendingmachine_id'>
                        @foreach($vendingmachines as $vendingmachine)
                        <option value="{{ $vendingmachine->id }}">{{ $vendingmachine->name }}</option>
                        @endforeach
                    </select>
                </th>
                <th>
                    <select name='column_id'>
                        @foreach($columns as $column)
                        <option value="{{ $column->id }}">{{ $column->name }}</option>
                        @endforeach
                    </select>
                </th>
                <th>
                    <select name='product_id'>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </th>
                <th>
                    <input type='number' name='solds' min=0>
                </th>
                <th>
                    <input type='number' name='discards' min=0>
                </th>
            </tr>
            <input type="submit" value="保存"/>
        </form>
            
        <table class="table table-bordered">
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
        　　      <td>{{ $sale->year }}/{{ $sale->month }}/{{ $sale->date }}</td>
        　　      <td>{{ $sale->vendingmachine->name }}</td>
        　　      <td>{{ $sale->column->name }}</td>
        　　      <td>{{ $sale->product->name }}</td>
        　　      <td>{{ $sale->solds }}</td>
        　　      <td>{{ $sale->discards }}</td>
        　　      <td>
        　　          <a class="btn btn-success" onclick="location.href='/sales/{{ $sale->id }}'">編集</a>
        　　      </td>
        　　    </tr>
        　　@endforeach
        </table>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>自販機</th>
                    <th>売上数</th>
                </tr>
            </thead>
            <tbody>
             @foreach($result as $val)
                <tr>
                    <td>{{ $val->vending_machine_id }}</td>
                    <td>{{ $val->total_solds }}</td>
                </tr>  
             @endforeach
            </tbody>
        </table>

 @endsection
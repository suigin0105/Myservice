@extends('app')

@section('content')

   <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">自販機売上管理システム</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="/sales">売上登録・一覧</a>
                <a class="btn btn-success" href="/products">商品登録・一覧</a>
                <a class="btn btn-success" href="/columns">コラム登録・一覧</a>
            </div>
        </div>
    </div>
        ログインID:{{ $user_name }}
    　　<h2 style="font-size:1rem;">自販機登録</h2>
    <div style="text-align:right;">
    <form action="/vending_machines/store" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-12 mb-2 mt-2">
              <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="自販機名">
               @if ($errors->has('name'))
                <span style="color:red">{{$errors->first('name')}}</span>
               @endif
              </div>
            </div>
            
            <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
            </div>
        </div>
    </form>
    </div>
    
     <h2 style="font-size:1rem;">自販機一覧</h2>
        <table class="table table-bordered">
                <th>No</th>
                <th>自販機名</th>
                <th></th>
                <th></th>
        　　@foreach($vendingmachines as $vendingmachine)
        　　<tr>
        　　  <td style='text-align:right'>{{ $vendingmachine->id }}</td>
        　　  <td>{{ $vendingmachine->name }}</td>
        　　  <td style='text-align:center'>
        　　        <a class="btn btn-success" href="/vending_machines/edit/{{ $vendingmachine->id }}">編集</a>
              </td>
              <td style='text-align:center'>
                  <form action="/vending_machines/{{ $vendingmachine->id }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("本当に削除しますか？（この自販機に登録された売上データ・コラムはすべて削除されます）");'>削除</button>
                  </form>
              </td>
        　　</tr>
        　　@endforeach
        </table>

        {!! $vendingmachines->links('pagination::bootstrap-5') !!}
        
@endsection
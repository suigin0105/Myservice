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
            <a class="btn btn-success" href="/vending_machines">自販機登録・一覧</a>
            </div>
        </div>
    </div>
        ログインID:{{ $user_name }}
    　　<h2 style="font-size:1rem;">コラム登録</h2>
    <div style="text-align:right;">
    <form action="/columns/store" method="POST">
        @csrf
        
        <div class="row">
             <div class="col-12 mb-2 mt-2">
              <div class="form-group">
                    <select name="vending_machine" class="form-select">
                         <option>自販機を選択してください。</option>
                         @foreach($vendingmachines as $vendingmachine)
                            <option value="{{ $vendingmachine->id }}">{{ $vendingmachine->name }}</option>
                         @endforeach
                    </select>
              </div>
            </div>
            
            <div class="col-12 mb-2 mt-2">
              <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="コラム名">
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
    
     <h2 style="font-size:1rem;">コラム一覧</h2>
        <table class="table table-bordered">
                <th>No</th>
                <th>コラム名</th>
                <th>自販機名</th>
                <th></th>
                <th></th>
        　　@foreach($columns as $column)
        　　<tr>
        　　  <td style='text-align:right'>{{ $column->id }}</td>
        　　  <td>{{ $column->name }}</td>
        　　  <td>{{ $column->vendingmachine->name }}</td>
        　　  <td style='text-align:center'>
        　　        <a class="btn btn-success" href="">編集</a>
              </td>
              <td style='text-align:center'>
                  <form action=""method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
                  </form>
              </td>
        　　</tr>
        　　@endforeach
        </table>

        {!! $columns->links('pagination::bootstrap-5') !!}
        
@endsection
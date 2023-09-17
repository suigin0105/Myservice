@extends('app')

@section('content')

   <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">自販機売上管理システム</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="/products/?page_id={{ $page_id }}">戻る</a>
            </div>
        </div>
    </div>
    
    
        ログインID:{{ $user_name }}
    <div style="text-align:right;">
    <form action="/products/edit/{{ $product->id }}" method="POST">
        @method('PUT')
        @csrf
        
        <div class="row">
            <div class="col-12 mb-2 mt-2">
              <div class="form-group">
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="">
               @if ($errors->has('name'))
                <span style="color:red">{{$errors->first('name')}}</span>
               @endif
              </div>
            </div>
            
            <div class="col-12 mb-2 mt-2">
              <div class="form-group">
                     <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="">
               @if ($errors->has('price'))
                <span style="color:red">{{$errors->first('price')}}</span>
               @endif
              </div>
            </div>
            
            <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
            </div>
        </div>
    </form>
    </div>
@endsection
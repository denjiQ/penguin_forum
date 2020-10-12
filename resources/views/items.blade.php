@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ url('create_item') }}" aria-label="{{ __('Login') }}">
            {{ csrf_field() }}
                <table>
                    <tr>
                        <th>コード</th>
                        <th>名前</th>
                        <th>値段</th>
                        <th>場所コード</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="product_code"></td>
                        <td><input type="text" name="product_name"></td>
                        <td><input type="text" name="product_price"></td>
                        <td><input type="text" name="product_location_num"></td>
                    </tr>
                </table>
                <input type="submit" value="send">
            </form>
            <ul id="pagination-demo" class="pagination-sm"></ul>
            <div class="page" id="page-1">
                <p id="pag">あああああ</p>
            </div>
            <div class="page" id="page-2">
                いいいいい
            </div>
            <div class="page" id="page-3">
                ううううう
            </div>
            <div class="page" id="page-4">
                えええええ
            </div>
            <div class="page" id="page-5">
                おおおおお
            </div>
            <div class="page" id="page-6">
                かかかかか
            </div>
            <button id="open-sample-dialog">ダイアログを開く</button>
            <div id="sample-dialog" title="サンプルダイアログ" style="display:none;">
                @if(isset ($ele))
                    {{ $ele }}
                @endif
                    には送れませんでした。
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>

  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">苗字</th>
          <td class="confirm-table__text">
            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">名前</th>
          <td class="confirm-table__text">
            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
          </td>
        </tr>
        
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
            @if($contact['gender'] == 1)
              <div>男性</div>
            @elseif($contact['gender'] == 2)
              <div>女性</div>
            @else
              <div>その他</div>
            @endif
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物</th>
          <td class="confirm-table__text">
            <input type="tel" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ種類</th>
          <td class="confirm-table__text">
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
            
            @if($contact['category_id'] <= 0)
              <p>未選択</p>
            @elseif($contact['category_id'] >= 1)
              @if($categories == null)
                <p>カテゴリーがありません</p>
              @elseif($categories != null)
                <p>{{$categories[($contact['category_id'] - 1)] -> content}}</p>
              @endif
            @endif
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
  </form>
  <button><a class="link-notformat" href="/">修正</a></button>
</div>
@endsection

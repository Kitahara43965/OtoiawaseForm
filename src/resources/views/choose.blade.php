@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/choose.css') }}">
@endsection

@section('content')
<div class="choose__content">
  <div class="choose__heading">
    <h2>詳細</h2>
  </div>

  @if($inverseDeletedIdValidMarker != 0)
  
    <form class="form" action="/admin/delete" method="post">
        @method('DELETE')
        @csrf
        <div class="choose-table">
        <table class="choose-table__inner">
            <tr class="choose-table__row">
            <th class="choose-table__header">苗字</th>
            <td class="choose-table__text">
                <input type="text" name="last_name" value="{{ $contacts[$inverseDeletedId-1]->last_name }}" readonly />
            </td>
            </tr>
            <tr class="choose-table__row">
            <th class="choose-table__header">名前</th>
            <td class="choose-table__text">
                <input type="text" name="first_name" value="{{ $contacts[$inverseDeletedId-1]->first_name }}" readonly />
            </td>
            </tr>
            
            <tr class="choose-table__row">
            <th class="choose-table__header">性別</th>
            <td class="choose-table__text">
                <input type="hidden" name="gender" value="{{ $contacts[$inverseDeletedId-1]->gender }}"/>
                @if($contacts[$inverseDeletedId-1]->gender == 1)
                <div>男性</div>
                @elseif($contacts[$inverseDeletedId-1]->gender == 2)
                <div>女性</div>
                @else
                <div>その他</div>
                @endif
            </td>
            </tr>
            <tr class="choose-table__row">
            <th class="choose-table__header">メールアドレス</th>
            <td class="choose-table__text">
                <input type="email" name="email" value="{{ $contacts[$inverseDeletedId-1]->email }}" readonly />
            </td>
            </tr>
            <tr class="choose-table__row">
            <th class="choose-table__header">電話番号</th>
            <td class="choose-table__text">
                <input type="tel" name="tel" value="{{ $contacts[$inverseDeletedId-1]->tel }}" readonly />
            </td>
            </tr>
            <tr class="choose-table__row">
            <th class="choose-table__header">住所</th>
            <td class="choose-table__text">
                <input type="text" name="address" value="{{ $contacts[$inverseDeletedId-1]->address }}" readonly />
            </td>
            </tr>
            <tr class="choose-table__row">
            <th class="choose-table__header">建物</th>
            <td class="choose-table__text">
                <input type="tel" name="building" value="{{ $contacts[$inverseDeletedId-1]->building }}" readonly />
            </td>
            </tr>
            <tr class="choose-table__row">
            <th class="choose-table__header">お問い合わせ種類</th>
            <td class="choose-table__text">
                <input type="hidden" name="category_id" value="{{ $contacts[$inverseDeletedId-1]->category_id }}" readonly />
                
                @if($contacts[$inverseDeletedId-1]->category_id <= 0)
                <p>未選択</p>
                @elseif($contacts[$inverseDeletedId-1]->category_id  >= 1)
                @if($categories == null)
                    <p>カテゴリーがありません</p>
                @elseif($categories != null)
                    <p>{{$categories[($contacts[$inverseDeletedId-1]->category_id-1)] -> content}}</p>
                @endif
                @endif
            </td>
            </tr>
            <tr class="choose-table__row">
            <th class="choose-table__header">お問い合わせ内容</th>
            <td class="choose-table__text">
                <input type="text" name="detail" value="{{ $contacts[$inverseDeletedId-1]->detail }}" readonly />
            </td>
            </tr>
        </table>
        </div>
        <div class="form__button">
            <input type="hidden" name="id" value="{{ $contacts[$inverseDeletedId-1]->id}}">
            <button class="form__button-submit" type="submit">削除</button>
        </div>
        <div>
           <button><a class="link-notformat" href="/admin">×戻る</a></button>
        </div>
    </form>
  @endif
  
</div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

<style>
  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>

@section('content')

<div class="admin__content">

  <div class="contact-form__heading">
    <h2>Admin</h2>
  </div>

  {{ $contacts->links() }}


  <!--
  <form class="search-form">
    @csrf
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword')}}">
        <select class="search-form__item-select" name="category_id">
        <option value="">カテゴリ</option>
          @foreach ($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
          @endforeach
        </select>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
    </div>
  </form>
  -->

  


  <div class="contact-form__content">
    
      <div class="admin-table">
        <table class="admin-table__inner">
          <tr class="admin-table__row">
            <th colspan="2" class="admin-table__header">名前</th>
            <th class="admin-table__header">メールアドレス</th>
            <th class="admin-table__header">お問い合わせの種類</th>
            <th class="admin-table__header"></th>
          </tr>
          @foreach ($contacts as $contact)
            <tr class="admin-table__row">
              
              <form class="form" action="choose" method="post">
                @csrf
                <td>
                  <div>
                    <input class="update-form__item-input">{{$contact['last_name']}}</input>
                  </div>
                </td>
                <td>
                  <div>
                    <input class="update-form__item-input">{{$contact['first_name']}}</input>
                  </div>
                </td>
                <td>
                  <div>
                    <input class="update-form__item-input">{{$contact['email']}}</input>
                  </div>
                </td>

                <td>
                  <div>
                    
                  
                    @if($contact['category_id'] <= 0)
                      <input class="update-form__item-input">{{$contact['email']}}</input>
                    @elseif($contact['category_id'] >= 1)
                      @if($categories == null)
                        <input class="update-form__item-input">{{'カテゴリーがありません'}}</input>
                      @elseif($categories != null)
                        <input class="update-form__item-input">{{$categories[($contact['category_id'] - 1)] -> content}}</input>
                      @endif
                    @endif
                
                  </div>
                </td>

                <td>
                  <div class="update-form__button">
                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                    <button class="update-form__button-submit" type="submit">詳細</button>
                  </div>
                </td>
              </form>
            </tr>
          @endforeach
        </table>
      </div>
  </div>
</div>
@endsection
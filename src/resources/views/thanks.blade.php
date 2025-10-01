@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
  <div class="thanks__heading">
    <h2>Thank you</h2>
  </div>
  <button>
    <a class="link-notformat" href="/">
      HOME
    </a>
  </button>
</div>

@endsection

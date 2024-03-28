@extends('layouts.app')
@section('content')
<form action="{{ route('book.store') }}" method="post">
    <label>お名前</label>
    <input type="text" name="name">

    <label>お値段</label>
    <input type="text" name="price">

    <button type="submit">登録</button>
    @csrf
</form>
@endsection
@extends('layouts.app')

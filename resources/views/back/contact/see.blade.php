@extends('back.layouts.master')
@section('title','Mesaj Görüntüle')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Ad Soyad</label>
            <input type="text" name="title" class="form-control" value="{{ $contact->name }}" readonly></input>
        </div>
        <div class="form-group">
            <label>Email Adresi</label>
            <input type="text" name="title" class="form-control" value="{{ $contact->email }}" readonly></input>
        </div>
        <div class="form-group">
            <label>Mesaj Konusu</label>
            <input type="text" name="title" class="form-control" value="{{ $contact->topic }}" readonly></input>
        </div>
        <div class="form-group">
            <label>Mesaj</label>
            <textarea id="editor" name="content" class="form-control"  rows="4" readonly>{{ $contact->message }}</textarea>
        </div>
    </div>
</div>

@endsection
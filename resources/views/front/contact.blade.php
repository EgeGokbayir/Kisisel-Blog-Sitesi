@extends('front.layouts.master')
@section('title','İletişim')
@section('bg','https://wallpapercave.com/wp/wp4863860.jpg')
@section('content')
<div class="col-md-8 mx-auto">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
<p>Bizimle iletişime geçebilirsiniz.</p>
<div class="my-5">
    <form method="POST" action="{{route('contact.post')}}">
        @csrf
        <div>
            <label for="name">Ad Soyad</label>
            <input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="Ad Soyad yazınız." required/>
            <p class="help-block text-danger"></p>
        </div>
        <div>
            <label for="email">E-posta Adresi</label>
            <input class="form-control" value="{{old('email')}}" name="email" type="email" placeholder="E-posta adresinizi giriniz." required/>
            <p class="help-block text-danger"></p>
        </div>
        <div>
            <label>Konu</label>
            <select class="form-control" name="topic">
                <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                <option @if(old('topic')=="Diğer") selected @endif>Diğer</option>
            </select>
        </div>
        <div class="mt-4">
            <label for="message">Mesajınız</label>
            <textarea class="form-control" name="message" placeholder="Mesajınız" style="height: 12rem" required>{{old('message')}}</textarea>
            <p class="help-block text-danger"></p>
        </div>
        <button class="btn btn-primary" id="submitButton" type="submit">Gönder</button>
    </form>
</div>
</div>
<div class="col-md-4 float-end">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.711323996278!2d29.15605271571689!3d40.92207503267326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac413ec74c8ff%3A0x65b681154cfc3524!2sRitim%20%C4%B0stanbul%20AVM!5e0!3m2!1str!2str!4v1678355684710!5m2!1str!2str" width="600" height="620" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection

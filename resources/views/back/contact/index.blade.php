@extends('back.layouts.master')
@section('title','İletişim')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('title')
        <span class="m-0 font-weight-bold text-primary float-right">{{$contacts->count()}} Mesaj Bulundu.</strong>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Konu</th>
                        <th>Ad Soyad</th>
                        <th>Mesaj</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $row)
                    <tr>
                        <td>{{$row->topic}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{str_limit($row->message,75)}}</td>
                        <td>{{$row->created_at->diffForHumans()}}</td>
                        <td class="align-middle text-center">
                            <a href="{{route('admin.contact.see',$row->id)}}" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.contact.delete',$row->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
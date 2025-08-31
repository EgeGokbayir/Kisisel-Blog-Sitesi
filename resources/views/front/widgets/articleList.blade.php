@if(count($articles)>0)
@foreach($articles as $article)
<div class="post-preview">
    <a href="{{route('single', [$article->getCategory->slug,$article->slug])}}">
        <h2 class="post-title">
            {{$article->title}}
        </h2>
        <h6 class="post-subtitle">
            {!!str_limit($article->content,75)!!}
        </h6>
    </a>
    <p class="post-meta">Kategori :
    <a href="{{route('single', [$article->getCategory->slug,$article->slug]   )}}">{{ $article->getCategory->name}}</a>
    <span class="text-danger float-end">Okunma Sayısı : <b>"{{$article->hit}}"</b>&nbsp&nbsp
    <span class="float-end text-muted">{{$article->created_at->diffForHumans()}}</span>
    </span>
    </p>
</div>
@if(!$loop->last)
  <hr>
@endif
@endforeach
<div class="float-center">
  {{$articles->links()}}
</div>
@else
<div class="alert alert-danger">
  <h1>Bu kategoriye ait yazı bulunamadı.</h1>
</div>
@endif

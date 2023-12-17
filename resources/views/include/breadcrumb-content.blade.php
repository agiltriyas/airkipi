<ul class="breadcrumbs bg-light mb-4">
    <li class="breadcrumbs__item">
        <a href="{{route("lp-index")}}" class="breadcrumbs__url">
            <i class="fa fa-home"></i> Home</a>
    </li>
    <li class="breadcrumbs__item">
        <a href="{{route('lp-kategori',$kategori)}}" class="breadcrumbs__url">{{$kategori}}</a>
    </li>
    @if(isset($article))
    <li class="breadcrumbs__item breadcrumbs__item--current">
        {{$article}}
    </li>
    @endif
</ul>
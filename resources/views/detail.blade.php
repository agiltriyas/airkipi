@extends('layout.app',
[
'title' => $content->title,
'tagTitle' => $content->tagtitle,
'tags' => $content->tags,
'tagDescription' => $content->tagdescription,
'tagUrl' => $content->tagurl,
'tagSitename' => $content->tagsitename,
'tagImage' => $content->tagimage,
'tagType' => $content->tagtype,
]
)

@section('content')
<section class="min-vh-50 py-10 d-flex align-items-center">
    <div class="overlay overlay-advanced">
        <div class="overlay-inner bg-cover bg-image-holder">
            <img src="{{(!isset($content->headerimage))? 'assetsblog/images/image-4.jpg' : $content->headerimage}}" alt="background">
        </div>
        <div class="overlay-inner bg-dark opacity-70"></div>
        <div class="overlay-inner bg-gradient-v-transparent-dark opacity-50"></div>
    </div>
    <div class="container">
        <div class="col-md-10 mx-auto text-center text-white">
            <h2 class="h1">{{ucfirst($content->title)}}</h2>
            <p>{{date_format($content->created_at,'d M Y')}}</p>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <article class="article">
                    {!! $content->content !!}
                </article>

                <hr class="my-7" />

            </div>
        </div>
    </div>
</section>

@endsection
@extends('layout.app',['title' => 'Our Activities'])

@section('content')
<section class="min-vh-50 py-10 d-flex align-items-center">
    <div class="overlay overlay-advanced">
        <div class="overlay-inner bg-cover bg-image-holder">
            <img src="assetsblog/images/image-4.jpg" alt="background">
        </div>
        <div class="overlay-inner bg-dark opacity-70"></div>
        <div class="overlay-inner bg-gradient-v-transparent-dark opacity-50"></div>
    </div>
    <div class="container">
        <div class="col-md-10 mx-auto text-center text-white">
            <h2 class="h1">Activities</h2>
            <!-- <p>A collection of news, features & interesting things.</p> -->
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row m-n3 masonry-container">
            @foreach($contents as $content)
            <article class="col-md-6 col-lg-4 col-xl-3 p-3 masonry-item">
                <div class="card">
                    <a href="{{route('lp-activities.detail',$content->slug)}}" rel="bookmark">
                        <img src="{{(!isset($content->thumbnail)) ? 'assets/images/portfolio/image-1-thumb.jpg' : $content->thumbnail}}" class="card-img" alt="">
                    </a>
                    <div class="card-body">
                        <h2 class="h6"><a href="{{route('lp-activities.detail',$content->slug)}}" rel="bookmark" class="text-dark"> {{$content->title}}</a></h2>
                        <span>
                            <div rel="bookmark" class="text-gray-700"><time datetime="2015-05-04T15:05:34+00:00">4 May 2015</time></div>
                        </span>
                    </div>
                </div>
            </article>
            @endforeach

        </div>

        <div class="row justify-content-center mt-8">
            {{$contents->links('pagination::bootstrap-4')}}
        </div>

    </div>
</section>

@endsection
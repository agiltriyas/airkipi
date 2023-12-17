@extends('layout.app')

@section('content')
<!-- search -->
<section class="bg-content ">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- Search result -->
                <div class="wrap__search-result">
                    <div class="wrap__search-result-keyword">
                        <h5>Search results for keyword: <span class="text-primary"> "{{$_GET['search']}}" </span> found in
                            {{$contents->total()}} posts. </h5>
                    </div>

                    <!-- Post Article List -->
                    @foreach($contents as $content)
                    <div class="card__post card__post-list card__post__transition mt-30">
                        <div class="row ">
                            <div class="col-md-5">
                                <div class="card__post__transition">
                                    <a href="{{$content->slug}}">
                                        <img src="{{$content->thumbnail}}" class="img-fluid w-100" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7 my-auto pl-0">
                                <div class="card__post__body ">
                                    <div class="card__post__content  ">
                                        <div class="card__post__category ">
                                            {{$content->kategori}}
                                        </div>
                                        <div class="card__post__author-info mb-2">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        by {{$content->user->name}}
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        {{date('d F Y',strtotime($content->created_at))}}
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card__post__title">
                                            <h5>
                                                <a href="{{$content->slug}}">
                                                    {{$content->title}}
                                                </a>
                                            </h5>
                                            <p class="d-none d-lg-block d-xl-block mb-0">
                                                {{ strip_tags(substr($content->content,0,100)) }}
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach


                </div>

                <!-- pagination -->
                <div class="mt-4">
                    <!-- Pagination -->
        {{$contents->withQueryString()->links('pagination::custom')}}

                    {{-- <div class="pagination-area">
                        <div class="pagination wow fadeIn animated" data-wow-duration="2s" data-wow-delay="0.5s"
                            style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                            <a href="#">
                                «
                            </a>
                            <a href="#">
                                1
                            </a>
                            <a class="active" href="#">
                                2
                            </a>
                            <a href="#">
                                3
                            </a>
                            <a href="#">
                                4
                            </a>
                            <a href="#">
                                5
                            </a>

                            <a href="#">
                                »
                            </a>
                        </div>
                    </div> --}}
                </div>

            </div>

        </div>
    </div>
</section>
<!-- end search -->

@endsection
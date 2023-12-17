<div class="col-md-4">
    <div class="sticky-top">
        <aside class="wrapper__list__article ">
            <!-- <h4 class="border_section">Sidebar</h4> -->
            <div class="mb-4">
                <div class="widget__form-search-bar  ">
                    <div class="row no-gutters">
                        <div class="col">
                            <input class="form-control border-secondary border-right-0 rounded-0"
                                value="" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button
                                class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper__list__article-small">
                @foreach($data['latest'] as $latest)
                <div class="mb-3">
                    <!-- Post Article -->
                    <div class="card__post card__post-list">
                        <div class="image-sm">
                            <a href="{{url('').'/'.$latest->slug}}">
                                <img src="{{$latest->thumbnail}}" class="img-fluid" alt="">
                            </a>
                        </div>


                        <div class="card__post__body ">
                            <div class="card__post__content">

                                <div class="card__post__author-info mb-2">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by {{$latest->user->name}}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="text-dark text-capitalize">
                                                {{date('d F Y',strtotime($latest->created_at))}}
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="card__post__title">
                                    <h6>
                                        <a href="{{url('').'/'.$latest->slug}}">
                                            {{$latest->title}}
                                        </a>
                                    </h6>
                                   

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Post Article -->
                <div class="article__entry">
                @foreach($data['latest2'] as $latest)

                    <div class="article__image">
                        <a href="{{url('').'/'.$latest->slug}}">
                            <img src="{{$latest->thumbnail}}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="article__content">
                        <div class="article__category">
                            {{$latest->kategori}}
                        </div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <span class="text-primary">
                                    by {{$latest->user->name}}

                                </span>
                            </li>
                            <li class="list-inline-item">
                                <span class="text-dark text-capitalize">
                                    {{date('d F Y',strtotime($latest->created_at))}}
                                </span>
                            </li>

                        </ul>
                        <h5>
                            <a href="{{url('').'/'.$latest->slug}}">
                                {{$latest->title}}
                            </a>
                        </h5>
                        <p>
                            {!! substr($latest->content,0,100) !!} ...
                        </p>
                        <a href="{{$latest->slug}}" class="btn btn-outline-primary mb-4 text-capitalize"> read more</a>
                    </div>
                </div>
                @endforeach
            </div>
        </aside>

        {{-- <aside class="wrapper__list__article">
            <h4 class="border_section">newsletter</h4>
            <!-- Form Subscribe -->
            <div class="widget__form-subscribe bg__card-shadow">
                <h6>
                    The most important world news and events of the day.
                </h6>
                <p><small>Get magzrenvi daily newsletter on your inbox.</small></p>
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Your email address">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">sign up</button>
                    </div>
                </div>
            </div>
        </aside> --}}


    </div>
</div>
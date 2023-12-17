@extends('layout.app',['title'=>'Halaman Utama','description' => 'airkipi.com'])

@section('content')

<div class="ln-fullpage" data-navigation="true">

    <!-- Section - Home -->
    <section class="ln-section d-flex js-min-vh-100" data-anchor="home" data-tooltip="Home" data-overlay-color="#00050e" data-overlay-opacity="50">
        <div class="overlay overlay-advanced">
            <div class="overlay-inner bg-image-holder bg-cover">
                <img src="{{(!isset($data['banner']['background']))?'assets/images/image-161.jpg':url('storage/').'/' . $data['banner']['background']}}" alt="background">
            </div>
            <div class="overlay-inner bg-dark opacity-70"></div>
        </div>
        <div class="container align-self-center text-white">
            <div class="row">
                <div class="col-12 col-lg-9 col-xl-6">
                    <h1 class="mb-4 animated" data-animation="fadeInUp">{{(is_array($data['banner']['title']))?$data['banner']['title'][0]:$data['banner']['title']}}</h1>
                    <p class="mb-7 animated" data-animation="fadeInUp" data-animation-delay="200">{{(is_array($data['banner']['subtitle']))?$data['banner']['subtitle'][0]:$data['banner']['subtitle']}}</p>
                    <a href="#our-product" class="btn btn-white mr-3 scrollto animated" data-animation="fadeInUp" data-animation-delay="400">Learn more</a>

                </div>
            </div>
        </div>
    </section>

    <!-- Section - What we do -->
    <section class="ln-section d-xl-flex" data-anchor="what-we-do" data-tooltip="What we do" data-overlay-color="#2d5aec" data-overlay-opacity="90">
        <div class="overlay overlay-advanced">
            <div class="overlay-inner bg-image-holder bg-cover">
                <img src="{{(!isset($data['about']['background'])) ?'assets/images/image-4.jpg' : url('storage/').'/' . $data['about']['background']}}" alt="background">
            </div>
            <div class="overlay-inner overlay-video">
                <video autoplay muted loop>
                    <source src="{{(!isset($data['about']['background'])) ? asset('assets/video/moutains.webm') : url('storage/').'/' . $data['about']['background']}}" type="video/webm">
                    <source src="{{(!isset($data['about']['background'])) ? asset('assets/video/moutains.webm') : url('storage/').'/' . $data['about']['background']}}" type="video/mp4">
                    <source src="{{(!isset($data['about']['background'])) ? asset('assets/video/moutains.webm') : url('storage/').'/' . $data['about']['background']}}" type="video/ogg">
                </video>
            </div>
            <div class="overlay-inner bg-dark opacity-50"></div>
        </div>
        <div class="container align-self-xl-center text-white">

            <div class="row">
                <div class="col-12 col-xl-5 mb-8 mb-xl-0">
                    <h2 class="animated mb-4" data-animation="fadeInUp">{{(is_array($data['about']['title']))?$data['about']['title'][0]:$data['about']['title']}}</h2>
                    <p class="animated" data-animation="fadeInUp" data-animation-delay="150"><span>{{(is_array($data['about']['text']))?$data['about']['text'][0]:$data['about']['text']}}</span></p>
                </div>
                <div class="col-12 col-xl-6 offset-xl-1">
                    <div class="row">
                        @if(is_array($data['about']['feature']))
                        @for($i=0;$i < count($data['about']['feature']);$i++) <div class="col-md-6 col-sm-6 mb-8 animated" data-animation="fadeInUp">
                            <div class="icon-7x mb-4">
                                <i class="{{$data['about']['icon'][$i]}}"></i>
                            </div>
                            <h3 class="h4 mb-0">{{$data['about']['feature'][$i]}}</h3>
                    </div>
                    @endfor
                    @else
                    <div class="col-md-6 col-sm-6 mb-8 animated" data-animation="fadeInUp">
                        <div class="icon-7x mb-4">
                            <i class="{{$data['about']['icon']}}"></i>
                        </div>
                        <h3 class="h4 mb-0">{{$data['about']['feature']}}</h3>
                    </div>
                    @endif

                </div>
            </div>
        </div>

</div>
</section>

<!-- Section - Our work -->
<section class="ln-section d-xl-flex" data-anchor="our-product" data-tooltip="Our work" data-overlay-color="#00050e" data-overlay-opacity="80">
    <div class="overlay overlay-advanced">
        <div class="overlay-inner bg-image-holder bg-cover">
            <img src="{{(!isset($data['product']['background'])) ? 'assets/images/image-13.jpg' : url('storage/').'/' . $data['product']['background']}}" alt="background">
        </div>
        <div class="overlay-inner bg-dark opacity-50"></div>
    </div>
    <div class="container align-self-xl-center text-white">
        <div class="row mb-8">
            <div class="col-12 col-xl-6">
                <h2 class="mb-4 animated" data-animation="fadeInUp">{{(is_array($data['product']['title']))?$data['product']['title'][0]:$data['product']['title']}}</h2>
                <p class="animated" data-animation="fadeInUp" data-animation-delay="150">{{(is_array($data['product']['text']))?$data['product']['text'][0]:$data['product']['text']}}</p>
            </div>
        </div>
        <div class="slider dots-light animated" data-animation="fadeInUp" data-animation-delay="300" data-slick='{"dots": true}'>
            @if(is_array($data['product']['feature']))

            @for($i=0;$i < count($data['product']['feature']);$i++) <div>
                <div class="portfolio-item mb-8">
                    <div class="row {{($i % 2 == 0) ? '' : 'flex-lg-row-reverse'}}">
                        <div class="col-12 col-lg-7 mb-4 mb-lg-0">
                            <div class="item-media">
                                <a href="{{(!isset($data['product']['image'])) ? 'assets/images/portfolio/project-1.jpg' :  url('storage/').'/' .$data['product']['image'][$i]}}" class="mfp-image">
                                    <div class="media-container">
                                        <div class="bg-image-holder bg-cover">
                                            <img src="{{(!isset($data['product']['image'])) ? 'assets/images/portfolio/project-1.jpg' :  url('storage/').'/' .$data['product']['image'][$i]}}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 {{($i % 2 == 0) ? '' : 'd-lg-flex justify-content-lg-end text-lg-right'}}">
                            <div class="pt-lg-8">
                                <div class="divider divider-alt bg-white mt-0 mb-8 d-none d-lg-block"></div>
                                <h4 class="h3">{{$data['product']['feature'][$i]}}</h4>
                                <!-- <p class="text-italic">Web Design</p> -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
        @else
        <div>
            <div class="portfolio-item mb-8">
                <div class="row">
                    <div class="col-12 col-lg-7 mb-4 mb-lg-0">
                        <div class="item-media">
                            <a href="{{(!isset($data['product']['image'])) ? 'assets/images/portfolio/project-1.jpg' :  url('storage/').'/' .$data['product']['image']}}" class="mfp-image">
                                <div class="media-container">
                                    <div class="bg-image-holder bg-cover">
                                        <img src="{{(!isset($data['product']['image'])) ? 'assets/images/portfolio/project-1.jpg' :  url('storage/').'/' .$data['product']['image']}}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="pt-lg-8">
                            <div class="divider divider-alt bg-white mt-0 mb-8 d-none d-lg-block"></div>
                            <h4 class="h3">{{$data['product']['feature']}}</h4>
                            <!-- <p class="text-italic">Web Design</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    </div>
</section>

<!-- Section - Activities -->
<section class="ln-section d-xl-flex" data-anchor="our-activities" data-tooltip="our-activities" data-overlay-color="#00050e" data-overlay-opacity="80">
    <div class="container">
        <div class="row mb-7">
            <div class="col-md-10 mx-auto text-center">

                <h2>{{(is_array($data['activities']['title'])) ? $data['activities']['title'][0] : $data['activities']['title']}}</h2>
                <p class="mb-7">{{(is_array($data['activities']['subtitle'])) ? $data['activities']['subtitle'][0] : $data['activities']['subtitle']}}</p>

            </div>
        </div>

        <!-- Masonry Container -->
        <div class="masonry-container row m-n4">

            @forelse($data['activitiesContents'] as $actContent)
            <article class="col-sm-6 col-lg-4 p-4 masonry-item">
                <a href="{{route('lp-activities.detail',$actContent->slug)}}" class="card h-100 zindex-1 hover-parent shadow-light border-0">
                    <div class="overlay overlay-advanced zindex-n1">
                        <div class="overlay-inner bg-image-holder bg-cover hover-zoom">
                            <img src="{{(!isset($actContent->thumbnail)) ? 'assets/images/portfolio/image-1-thumb.jpg' : $actContent->thumbnail}}" alt="">
                        </div>
                        <div class="overlay-inner bg-dark opacity-0 hover-opacity-60"></div>
                    </div>

                    <div class="card-body text-white pt-5 px-5 pb-10 pb-lg-13 opacity-0 hover-opacity-100">
                        <h5 class="card-title">{{$actContent->title}}</h5>
                    </div>

                    <!-- <div class="card-footer text-white border-0 pt-0 pb-5 px-0 mx-5 opacity-0 hover-opacity-100">
                        Web / Live
                    </div> -->
                </a>
            </article>
            @empty
            <div class="col-sm-12 col-lg-12">
                Activities Content in Progress
            </div>
            @endforelse


        </div><!-- .masonry-container end -->
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <a href="{{route('lp-activities.index')}}" class="btn btn-outline-primary">Read More</a>
            </div>
        </div>
    </div>
</section>

<!-- Section - Contact -->
<section class="ln-section d-xl-flex" data-anchor="contact" data-tooltip="Contact" data-overlay-color="#00050e" data-overlay-opacity="90">
    <div class="overlay overlay-advanced">
        <div class="overlay-inner bg-image-holder bg-cover">
            <img src="{{(!isset($data['contact']['background'])) ? 'assets/images/image-14.jpg' :  url('storage/').'/' .$data['contact']['background']}}" alt="background">
        </div>
        <div class="overlay-inner bg-dark opacity-50"></div>
    </div>
    <div class="container align-self-center text-white">
        <div class="row mb-7">
            <div class="col-12 col-xl-6">
                <h2 class="mb-4 animated" data-animation="fadeInUp">{{(is_array($data['contact']['title'])) ? $data['contact']['title'][0] : $data['contact']['title']}}</h2>
                <p class="animated" data-animation="fadeInUp" data-animation-delay="150">{{(is_array($data['contact']['subtitle']))?$data['contact']['subtitle'][0] : $data['contact']['subtitle']}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-5 mb-8 mb-lg-0">
                <div class="row">
                    @if(is_array($data['contact']['feature']))
                    @for($i=0;$i < count($data['contact']['feature']);$i++) <div class="col-12 col-md-4 col-lg-6 mb-8 mb-md-0 mb-lg-5 animated" data-animation="fadeInUp" data-animation-delay="150">
                        <div class="icon-5x mb-4">
                            <i class="{{$data['contact']['icon'][$i]}}"></i>
                        </div>
                        <p class="mb-0">{{$data['contact']['feature'][$i]}}</p>
                </div>

                <!-- <div class="col-12 col-md-4 col-lg-6 mb-8 mb-md-0 mb-lg-5 animated" data-animation="fadeInUp" data-animation-delay="150">
                        <div class="icon-5x mb-4">
                            <i class="ti-location-pin"></i>
                        </div>
                        <p class="mb-0">69 Halsey St, New York, Ny 10002,<br />
                            United States</p>
                    </div>

                    <div class="col-12 col-md-4 col-lg-6 animated" data-animation="fadeInUp" data-animation-delay="150">
                        <div class="icon-5x mb-4">
                            <i class="ti-email"></i>
                        </div>
                        <p class="mb-0"><a href="mailto:support@example.com" class="text-white">support@example.com</a><br />
                            <a href="mailto:hello@example.com" class="text-white">hello@example.com</a>
                        </p>
                    </div> -->
                @endfor
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-6 offset-lg-1 animated" data-animation="fadeInUp" data-animation-delay="150">
            <div class="contact-form">
                <form class="mb-0" id="cf" name="cf" action="include/sendemail.php" method="post" autocomplete="off">
                    <div class="form-row">

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" id="cf-name" name="cf-name" placeholder="Enter your name" class="form-control required">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="email" id="cf-email" name="cf-email" placeholder="Enter your email address" class="form-control required">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" id="cf-subject" name="cf-subject" placeholder="Subject (Optional)" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="form-group">
                                <textarea name="cf-message" id="cf-message" placeholder="Here goes your message" class="form-control required" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="col-12 d-none">
                            <input type="text" id="cf-botcheck" name="cf-botcheck" value="">
                        </div>

                        <input type="hidden" name="prefix" value="cf-">

                        <div class="col-12">
                            <button class="btn btn-soft-white" type="submit" id="cf-submit" name="cf-submit">Send
                                Message</button>
                        </div>

                    </div>
                </form>
                <div class="contact-form-result"></div>
            </div>
        </div>
    </div>
    </div>
</section>

</div>

@endsection
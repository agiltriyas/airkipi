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
                        <h5>Term Of Use</h5>
                    </div>

                    {!! $staticContent->content !!}


                </div>

                <!-- pagination -->
                <div class="mt-4">
                    <!-- Pagination -->

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
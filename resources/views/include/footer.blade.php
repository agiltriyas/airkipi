<footer class="position-relative py-10 py-lg-12 bg-dark text-gray-500">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-12 col-xxl-10 mx-auto text-center">
                <ul class="list-inline mb-5">
                    @if(is_array($data['socmed']['feature']))
                    @for($i=0;$i < count($data['socmed']['feature']);$i++) <li class="list-inline-item mx-0">
                        <a class="btn btn-icon btn-text-secondary text-gray-400" href="{{ explode('|',$data['socmed']['feature'][$i])[1] }}" tabindex="0">
                            <i class="fab fa-{{ explode('|',$data['socmed']['feature'][$i])[0] }}{{(explode('|',$data['socmed']['feature'][$i])[0] == 'facebook') ? '-f' : ''}} btn-icon-inner"></i>
                        </a>
                        </li>
                        <!-- <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="#" tabindex="0">
                                <i class="fab fa-twitter btn-icon-inner"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="#" tabindex="0">
                                <i class="fab fa-linkedin-in btn-icon-inner"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="#" tabindex="0">
                                <i class="fab fa-dribbble btn-icon-inner"></i>
                            </a>
                        </li> -->
                        @endfor
                        @else
                        <li class="list-inline-item mx-0">
                            <a class="btn btn-icon btn-text-secondary text-gray-400" href="{{ explode('|',$data['socmed']['feature'][0])[1] }}" tabindex="0">
                                <i class="fab {{explode('|',$data['socmed']['feature'][0])[0]}}-f btn-icon-inner"></i>
                            </a>
                        </li>
                        @endif
                </ul>
                <p class="mb-0">{{$data['footer']['title']}}</a>
                </p>
            </div>
        </div>
    </div>
</footer>
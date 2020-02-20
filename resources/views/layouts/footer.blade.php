<footer class="footer footer-black bg-danger  text-white">
        <div class="container">
            <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a class="navbar-brand" href="{{ route('home') }}"  rel="tooltip" title="Coded by Qusai Khaled" data-placement="bottom" >
                        QB-VideoTube
                        </a>
                    </li>
                    @foreach ($pages as $page)
                        <li>
                            <a  href="{{ route('front.page' , ['id' => $page->id , 'slug' => trim(str_replace(' ', '_',$page->name))]) }}"  rel="tooltip" title="{{$page->name}}" data-placement="bottom" >
                                {{$page->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i>
                <a class="navbar-brand" href="https://qusai-khaled.github.io/BB-Website-My-Portfolio" rel="tooltip" title="Coded by Qusai Khaled" data-placement="bottom" target="_blank">
            Qusai Khaled
            </a>
                </span>
            </div>
            </div>
        </div>
        </footer>

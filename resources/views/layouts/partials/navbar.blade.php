<header class="top-area">
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo">
                        <a href="/">
                            Liku<span>pang</span>
                        </a>
                    </div><!-- /.logo-->
                </div><!-- /.col-->
                <div class="col-sm-10">
                    <div class="main-menu">
                    
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button><!-- / button-->
                        </div><!-- /.navbar-header-->
                        <div class="collapse navbar-collapse">		  
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ route('home') }}">home</a></li>
                                <li><a href="{{ route('destinasi_wisata.index') }}">Objek Wisata</a></li>
                                <li><a href="{{ route('souvenir.index') }}">Sovenir </a></li>
                                <li><a href="{{ route('homestay.index') }}">Homestay</a></li>
                                <li><a href="{{ route('kuliner.index') }}">Kuliner</a></li>
                                @auth       
                                <li>
                                    <a href="{{ route('dashboard') }}" target="__blank" class="book-btn" style="background:#00e0f0; color:white">dashboard <i class="fa fa-sign-in"></i>
                                    </a>
                                </li><!--/.project-btn--> 
                                @endauth
                                @guest
                                <li>
                                    <a href="{{ route('login') }}" target="__blank" class="book-btn" style="background:#00e0f0; color:white">Sign in <i class="fa fa-sign-in"></i>
                                    </a>
                                </li><!--/.project-btn--> 
                                @endguest
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.main-menu-->
                </div><!-- /.col-->
            </div><!-- /.row -->
            <div class="home-border"></div><!-- /.home-border-->
        </div><!-- /.container-->
    </div><!-- /.header-area -->

</header>
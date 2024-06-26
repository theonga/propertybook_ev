<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PropertyBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-utilities@4.1.3/bootstrap-utilities.css" rel="stylesheet">

    <!-- add app.css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand font-weight-bold text-white"  href="#">Business</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-4" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#home" style="color: white;">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link " href="#services" style="color: #d8c9c9;">Services</a></li>
                    <li class="nav-item"><a class="nav-link " href="#pricing" style="color: #d8c9c9;">Pricing</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="section bg-primary" id="home">
        <div class="container text-center mt-sm-2">
            <div class="row align-items-center">
                <div class="text-start col-lg-6  col-sm-1">
                   <h1 class="text-white  fw-bold">{{ $hero->title }}</h1>
                   <p class="text-white mt-4 text-gray fw-medium lh-lg">{{ $hero->content }}</p>

                   <div class="mt-4 d-flex flex-row align-items-center">
                       <div>
                         <a class="btn btn-light px-4 text-uppercase text-primary fw-bold fs-sm-6">Get Started</a>
                       </div>
                       <div class="ml-4">
                         <img class="bg-white rounded-circle p-2 text-sm-2 shadow" height="40" width="40" src="{{url('/images/playBtn.png')}}" alt="Image"/>
                       </div>
                       <div class="ml-2  d-sm-block">
                         <a class="px-4 fw-bold text-white text-decoration-none text-sm-2">Watch Intro</a>
                       </div>
                   </div>
                </div>
                <div class="text-end col-lg-6 col-sm-1 mt-sm-6">
                     <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}" class="img-fluid mt-2">
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-6" id="story">
        <div class="container text-center mt-sm-2">
            <div class="row align-items-center">
                <div class="text-start col-lg-6 col-sm-1 mt-sm-6">
                     <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}" class="img-fluid mt-2">
                </div>
                <div class="text-start col-lg-6 col-sm-1">
                   <p class="fw-bold text-uppercase text-secondary mt-3">Our Story</p>
                   <h2 class="fw-bold mt-3">{{ $story->title }}</h2>
                   <p class="mt-4 text-secondary-emphasis fw-medium lh-lg">{{ $story->content }}</p>
                   <div class="d-flex sec-navbar p-2 rounded text-white">
                       @foreach($story->subSections as $subSection)
                          <span id="story_title_{{$subSection->id}}" class="fw-bold  tab-title {{ $loop->first ? 'bg-primary' : 'tab-title-inactive' }}">{{$subSection->title}}</span>
                       @endforeach
                   </div>
                    @foreach($story->subSections as $subSection)
                        <div id="story_content_{{$subSection->id}}" class="mt-4 {{ $loop->first ? '' : 'd-none' }}">
                            <p class="text-gray">{{$subSection->content}}</p>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-4" id="services">
        <div class="text-center d-flex justify-content-center">
            <h2 class="text-center border border-primary text-primary rounded-4 txt-sm ">Services</h2>
        </div>
         <div class="container mt-6">
            <div class="grid-container">
                @foreach($services->subSections as $subSection)
                <div class="grid-item">
                     <img height="40" width="40" src="{{ asset('storage/' . $subSection->image) }}" alt="{{ $subSection->title }}" class="img-fluid mt-2">
                     <h3 class="mt-4 fs-4">{{ $subSection->title }}</h3>
                     <p class="text-gray">{{ $subSection->content }}</p>
                </div>
               @endforeach
            </div>
        </div>
    </section>

    <section class="section mt-4" id="pricing">
        <div class="text-center d-flex justify-content-center">
            <h2 class="text-center border border-primary text-primary rounded-4 txt-sm ">Pricing</h2>
        </div>

        <div class="mt-6">
           <div class="container grid-container">
               @foreach ($pricings as $price)
                  <div class="grid-item ">
                        <div class="text-center d-flex justify-content-center mt-4">
                            <h3 class="text-center border border-primary text-primary rounded-4 txt-sm ">{{ $price->package }}</h3>
                        </div>
                        
                        <p class="text-gray">{{ $price->description }}</p>
                        <h4 class="text-center fs-4"><sup>$</sup><span class="price">{{ $price->price }}</span><sub>/mo</sub></h4>
                        
                        <div class="text-center d-flex justify-content-center mt-4">
                           <a class="btn btn-light px-4 text-uppercase border border-primary  text-primary fw-bold fs-sm-6">Get Started</a>
                        </div>
                        
                        <ul class="list-unstyled mt-4">
                           @foreach(explode(',', $price->features) as $feature)
                                <li class="text-gray">{{ $feature }}</li>
                            @endforeach
                        </ul>
                       
                  </div>
               @endforeach
           </div>
        </div>
    </section>
    

    <footer class="bg-primary">
        <div class="text-center">
            <h2 class="text-center text-white">{{$footer->title}}</h2>
            <p class="text-white mt-4">{{ $footer->content }}</p>
            <div class="text-center d-flex justify-content-center mt-4">
                <a class="btn btn-light px-4 text-uppercase border border-primary  text-primary fw-bold fs-sm-6">Get Started</a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
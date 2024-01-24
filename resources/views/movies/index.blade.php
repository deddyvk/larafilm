<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 	aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  Dropdown
			  </a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="#">Action</a></li>
				<li><a class="dropdown-item" href="#">Another action</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="#">Something else here</a></li>
			  </ul>
			  </li>
			  <li class="nav-item">
				<a class="nav-link disabled">Disabled</a>
			  </li>
			</ul>
			<form class="d-flex" role="search">
			  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		  </div>
		</div>
  </nav>
  <div class="container-fluid mt-2">
	<h1 class="display-4 text-center">TRENDING</h1>
      <section class="jumbotron" id="trending">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row justify-content-between">
                    @foreach ($trending_carsl[0] as $item)
						<div class="col-md-3">
							<div class="card text-bg-dark" style="width: 280px;">
								<img class="card-img img-fluid" src="https://image.tmdb.org/t/p/w185{{ $item['poster_path'] }}">
								<span class="position-absolute top-0 end-0 badge bg-primary">{{ number_format($item['vote_average'],1) }} <span class="visually-hidden">unread messages</span></span>
								<div class="card-img-overlay">
									<!--<h4 class="card-title"><strong>{{ $item['title'] }}</strong></h4>
									<p class="card-text"><small>{{ \Carbon\Carbon::parse($item['release_date'])->diffForHumans() }}</small></p>-->
								</div>
								<div class="card-body">
									<!--<p class="card-text">{{ substr($item['overview'], 0,100) }} ....</p>-->
									<h4 class="card-title"><strong>{{ $item['title'] }} </strong></h4>
                                	<p class="card-text"><small>{{ \Carbon\Carbon::parse($item['release_date'])->diffForHumans() }}</small></p>
								</div>
							</div>
						</div>
                    @endforeach
                </div><!--row-->
            </div> <!--carousel-item-->
            
            <div class="carousel-item">
                <div class="row">
                  @foreach ($trending_carsl[1] as $item)
                      <div class="col-md-3">
                        <div class="card text-bg-dark" style="width: 280px;">
                            <img class="card-img img-fluid" src="https://image.tmdb.org/t/p/w185{{ $item['poster_path'] }}">
							<span class="position-absolute top-0 end-0 badge bg-primary">{{ number_format($item['vote_average'],1) }} <span class="visually-hidden">unread messages</span></span>
                            <div class="card-img-overlay">
                                <!--<h4 class="card-title"><strong>{{ $item['title'] }}</strong></h4>
                                <p class="card-text"><small>{{ \Carbon\Carbon::parse($item['release_date'])->diffForHumans() }}</small></p>-->
                            </div>
                            <div class="card-body">
                                <!--<p class="card-text">{{ substr($item['overview'], 0,100) }} ....</p>-->
								<h4 class="card-title"><strong>{{ $item['title'] }}</strong></h4>
                                <p class="card-text"><small>{{ \Carbon\Carbon::parse($item['release_date'])->diffForHumans() }}</small></p>
                            </div>
                        </div>
                       </div>
                  @endforeach
                </div>
            </div> 
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <section id="popular" class="mt-4">
      <h2 class="text-center">NOW PLAYING</h2>
      <div class="row">
        @foreach ($playing as $play)
        <div class="col-md-3 mb-3">
          <div class="card text-bg-dark" >
            <img class="card-img img-fluid" src="https://image.tmdb.org/t/p/w185{{ $play['poster_path'] }}" >
            <!--<div class="position-absolute bg-dark  text-white" style="background-color:rgba(0,0,0,0.2)">{{ $play['vote_average'] }}</div>
            <div class="position-absolute top-0 start-0">{{ $play['vote_average'] }}</div>-->
			
            <span class="position-absolute top-0 end-0 badge bg-primary">{{ number_format($play['vote_average'],1) }} <span class="visually-hidden">unread messages</span></span>
            
            <div class="card-img-overlay">
                <!--<h4 class="card-title"><strong>{{ $play['title'] }} </strong></h4>
                <p class="card-text"><small>{{ \Carbon\Carbon::parse($play['release_date'])->diffForHumans() }}</small></p>-->
            </div>
            <div class="card-body">
                <!--<p class="card-text">{{ substr($play['overview'], 0,100) }} ....</p>-->
				<h4 class="card-title"><strong>{{ $play['title'] }}</strong></h4>
                <p class="card-text"><small>{{ \Carbon\Carbon::parse($play['release_date'])->diffForHumans() }}</small></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
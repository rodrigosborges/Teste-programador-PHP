<html>
<head>
  	<noscript><meta http-equiv="refresh" content="1; URL={{url('erro')}}"/></noscript>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Rodrigo Borges">
	<meta http-equiv='cache-control' content='no-cache'>

	<title>Teste PHP</title>

	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-dialog.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/chosen.min.css') }}">
	<link rel="icon" type= "image/png" href="https://mapesolutions.com/wp-content/uploads/2018/12/favicon.png" />
	<link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
	<link href="{{ url('css/sweetalert2.min.css')}}" rel='stylesheet' type='text/css'>

	@yield('css')
	
</head>
<body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom">
		<a class="navbar-brand" href="{{url('/')}}"> <img src="{{ url('img/logo.png') }}" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav float-md-left">
			</ul>
		</div>
	</nav>

    <div class="container-fluid mt-5" id="body-content">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-8 offset-lg-2 mt-3">
				<div class="content-div">
                    <div class="card">
                        <div class="card-header">
                            <h4>Início</h4>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
				</div>
			</div>			
		</div>
	</div>
    

	<script type="text/javascript">const main_url = '{{url('/')}}/';</script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/validator/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/validator/localization/messages_pt_BR.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/bootstrap-dialog.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/jquery.mask.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/validacao/validate-methods.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/main.js') }}"></script>
	<script src="{{ url('js/bibliotecas/jquery/chosen.jquery.min.js')}}"></script>
	<script src="{{ url('js/bibliotecas/jquery/jquery-ui.js')}}"></script>
	<script src="{{ url('js/bibliotecas/bootstrap-select.min.js') }}"></script>
	<script src="{{ url('js/bibliotecas/defaults-pt_BR.min.js') }}"></script>
	<script type="text/javascript" src="{{url('js/bibliotecas/sweetalert2.min.js')}}"></script>
	@yield('js')
</body>
</html>

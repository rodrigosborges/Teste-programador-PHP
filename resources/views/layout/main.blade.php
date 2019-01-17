<html>
<head>
  	<noscript><meta http-equiv="refresh" content="1; URL={{url('erro')}}"/></noscript>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Rodrigo Borges">
	<meta http-equiv='cache-control' content='no-cache'>

	<title>Teste PHP</title>

	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
	<link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
	<link rel="icon" type= "image/png" href="{{ url('img/favicon.png') }}" />
	@yield('css')
	
</head>
<body>
    <div class="row">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom">
            <a class="navbar-brand" href="{{url('/')}}"> <img src="{{ url('img/logo.png') }}" /></a>
        </nav>
    </div>

    <div class="container-fluid mt-5" id="body-content">
        @yield('content')
	</div>
	
	<footer>
		<span>Desenvolvido por Rodrigo Soares Borges</span>
	</footer>
    

	<script type="text/javascript"> const main_url = '{{url('/')}}'; </script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/validator/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/validator/localization/messages_pt_BR.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/jquery/jquery.mask.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/validacao/validate-methods.js')}}"></script>
	<script src="{{ url('js/bibliotecas/bootstrap-select.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/main.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bibliotecas/defaults-pt_BR.min.js') }}"></script>
	@yield('js')
</body>
</html>

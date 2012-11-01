<!DOCTYPE html>
<html lang="es-VE">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Certificado</title>

<style>
@font-face {
  font-family: Lato;
  src: url('/pdf/fonts/Lato-Regular.ttf');
}
* {
	margin:0;
	padding: 0;
}
body {
	font-size: 16px;
	background-image: url('/pdf/img/certificado2.png');
	/*background-size: 600px;*/
}
h1 { margin-top: 2.5rem; }
.header { margin-top: 100px }
h1, h2, .header p { font-size: 2.5rem; }
h2 { line-height: 80px; }
h3 { font-size: 2em; line-height: 70px }
h4 { font-size: 1.5em; }
.container {
	font-family: 'Lato', sans-serif;
	text-align: center;
	height: 28rem;
	margin: 10% 20%;
	width: 60%;
}
.hero { margin-top: 4rem; }
.hero p , .footer p { font-size: 1.5rem; }
.footer { margin-top: 5rem; }

</style>

</head>
<body>
	<div class="container">
		<header class="header">
			<p>Certificado que se otorga a:</p>
			<h2>{{ $data[0]->user->people->first_name.' '.$data[0]->user->people->last_name }}</h2>
		</header>
		<div class="hero">
			<p>por haber cursado:</p>
			<h3>Derecho Romano</h3>
			<p>con una nota promedio de {{ number_format($nota, 2) }} puntos</p>
		</div>
		<footer class="footer">
			<h4>Fecha</h4>
			<p>{{ date('F Y') }}</p>
		</footer>
	</div>
</body>
</html>
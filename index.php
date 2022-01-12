<?php
require 'Pinger.php';
$app = new Pinger();

$DNSChecker = new Pinger();
$DNSChecker->addHost('1.1.1.1',53, 'Cloudflare DNS')
				->addHost('8.8.8.8',53, 'Google DNS')
				->addHost('9.9.9.9',53, 'Quad9')
				->addHost('208.67.222.222',53, 'OpenDNS')
				->addHost('8.26.56.26',53, 'Comodo DNS')
				->addHost('185.222.222.222',53, 'dns.sb')
				->addHost('74.82.42.42',53, 'Hurricane Electric')
				->addHost('80.80.80.80',53, 'Freenom World')
				->addHost('64.6.64.6',53, 'Verisign')
				->addHost('77.88.8.88',53, 'Yandex DNS')
				->addHost('4.2.2.1',53, 'Verizon')
				->addHost('195.175.39.39',53, 'TurkTelekom')
        ->registerCallback('Output');

function Output($online, $host, $port, $label) {
    echo '<tr><td>', $label, '</td>',
        '<td><code>', $host, ':', $port, '</code></td>',
        '<td align="center">', ($online ? '<button type="button" class="btn btn-success btn-sm">ONLINE</button>' : '<button type="button" class="btn btn-danger btn-sm">OFFLINE</button>'), '</td></tr>',
        PHP_EOL;
}

?><!doctype html>
<html lang="en" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dns</title>
	<link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}
	
	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
	
	.container {
		width: auto;
		max-width: 800px;
		padding: 0 15px;
	}
	</style>
</head>
<body class="d-flex flex-column h-100">
	<main class="flex-shrink-0">
		<div class="container">
		<br>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
			<tr><th scope="col">Name</th><th scope="col">host:port</th><th scope="col"><center>Result</center></th></tr>
			<?php
				$DNSChecker->run();
			?>
			</table>
		</div>

</div>
	</main>
	<footer class="footer mt-auto py-3 bg-light">
		<div class="container"> <span class="text-muted">netops.com.tr</span> </div>
	</footer>
</body>

</html>

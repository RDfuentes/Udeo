<!doctype html>
<html lang="es">

<!-- encabezado -->
<head>
    <!-- utf-8 -->
	<meta charset="utf-8" />
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ACREDICOM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS -->
	@include('assets.css.styles')
</head>
<!-- end encabezado -->

<body data-layout="horizontal">

	<!-- Page -->
	<div id="layout-wrapper">

		<header>
			@include('layouts.partes.base')
		</header>

		<!-- main content -->
		<div class="main-content">
			<div class="page-content">
				@yield('content')
			</div>
		</div>
		<!-- end main content-->

		<footer>
			@include('layouts.partes.footer')
		</footer>

	</div>
	<!-- end Page -->

	<!-- JAVASCRIPT -->
	@include('assets.js.scripts')

	<script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
            addModal.hide();
            editModal.hide();
        })
    </script>
	
</body>
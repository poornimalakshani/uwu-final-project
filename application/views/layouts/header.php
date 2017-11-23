<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="/assests/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assests/css/layout.css">
  </head>
  <body>
	<?php $this->load->view('layouts/top-nav'); ?>

	<?php $this->load->view('layouts/left-bar'); ?>

	<div class="container" <?=($this->session->userdata('admin') ? 'id="main"': '')?>>
		<div>
			<div class="col-md-12 popup-message text-white" id="popup-message" style="display: none">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="main-container">


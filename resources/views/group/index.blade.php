@extends('layouts/page')

@section('title', 'Home')

@section('content')
    <div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
    	<div class="container">
    	    <div class="row justify-content-center">
    	        <div class="col-md-8">
    	            <div class="card" style="margin-bottom: 50px;">
    	                <div class="card-header">
    	                    My Groups
    	                    <a href="/group/create">
    	                        <i class="fas fa-plus-square" style="font-size: 30px; vertical-align: middle; float:right;"></i>
    	                    </a>
    	                </div>

    	                <div class="card-body">
    	                    <table class="table table-hover">
    	                        <thead>
    	                        </thead>
    	                        <tbody>
    	                        </tbody>
    	                    </table>
    	                </div>
    	            </div>
    	        </div>
    	    </div>
    	</div>
    </div>
@endsection

<?php

class Pages extends Controller
{
	public function __construct()
	{

	}

	public function index()
	{
		$data = [
			'title' => 'Welcome on index'
		];
		$this->view('pages/index', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'Welcome on about'
		];
		$this->view('pages/about', $data);
	}
}
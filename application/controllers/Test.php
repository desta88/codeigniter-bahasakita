<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::  __construct();
	}

	// Token
	protected $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InRlc3RhcGkiLCJyb2xlIjoidXNlciIsImV4cGlyZWQiOjE1NzE5MTk5NTUsInBocmFzZXMiOiI5ODE1YjFmZmNiZTk0YjJmODBiNjVjNTE0MzU3YmY4ZSJ9.0mMU_BBSVNq6sHsSj1xjsyLA2XA7vHJc3_gtX-ix1_o';

	public function index()
	{
		$this->v1();
	}

	public function v1()
	{
		$data['token'] = $this->token;
		$this->load->view('v_test', $data);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::  __construct();
	}

	// Token
	protected $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6InRlc3RhcGkiLCJyb2xlIjoidXNlciIsImV4cGlyZWQiOjE1NzE5MTY1ODMsInBocmFzZXMiOiI1MDJjZWFiMjliMDA0MzA3OGY4YjJkYmRhOWNmZDRjNCJ9.6hNj96jR-BrOsgBFq1LxmBhJkup4Zia7T7cHUiAqd1M';

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

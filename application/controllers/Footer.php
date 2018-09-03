<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function listarCursoFooter(){
		$this->load->model('Cursodao');
		
		$curso = $this->Cursodao;
		
		$dado = $curso->listarCurso(4, 1);
		
		return $dado;
	}
}
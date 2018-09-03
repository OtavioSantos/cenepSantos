<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		//carrega os dados a serem exibidos nas páginas
		$data['banner'] = $this->listarBanner();
		$data['curso'] = $this->listarCurso();
		$data['not'] = $this->listarNoticia();
		$data['op'] = $this->listarOpiniao();
		
		$this->load->view('inset/head');
		$this->load->view('index', $data);
		$this->load->view('inset/footer');
	}
	
	public function listarBanner(){
		$this->load->model('Bannerdao');
		
		$banner = $this->Bannerdao;
		
		$dados = $banner->listarBanner();
		
		return $dados;
	}
	
	public function listarCurso(){
		$this->load->model('Cursodao');
		
		$curso = $this->Cursodao;
		//                          Quantidade exibida/ página / se é destaque / filtro / pesquisa
		$dados = $curso->listarCurso(4, 1, true, null, null);
		
		return $dados;
	}
	
	public function listarNoticia(){
		$this->load->model('Noticiadao');
		
		$not = $this->Noticiadao;
		
		//                          quantidade / página / destaque / pesquisa
		$dados = $not->listarNoticia(4, 1, 'sim', null);
		
		return $dados;
	}
	
	public function listarOpiniao(){
		$this->load->model('Opiniaodao');
		
		$op = $this->Opiniaodao;
		
		//envia a quantidade de registros a serem obtidos e a pagina
		$dados = $op->listarOpiniao();
		
		return $dados;
	}
}

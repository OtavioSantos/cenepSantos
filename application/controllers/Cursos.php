<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Cursos extends CI_Controller {
    
    	public function index($page){
    	    $data['curso'] = $this->listarCurso($page);
    	    $data['page'] = $this->pagination($page, "Todos", "");
    
    		$this->load->view('inset/head');
    		$this->load->view('inset/curso/curso', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	public function visCurso($id){
    	    $data['curso'] = $this->carregarCurso($id);
    	    
    	    $this->load->view('inset/head');
    		$this->load->view('inset/curso/cursoVisualizar', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	//listagem sem filtro
    	public function listarCurso($page){
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->listarCurso(9, $page, false, null, null);
    		
    		return $dado;
    	}
    	
    	//listagem com filtro
    	public function listarFiltro($page){
    		$filtro = $this->input->get('filtro');
    		$pesq = $this->input->get('pesq');
    		
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->listarCurso(9, $page, false, $filtro, $pesq);
    		
    		if($dado == null){
    			$data['result_error'] = '<div class="col-lg-12 filtro-msg">
    								<p class="h3">Nenhum item encontrado!</p>
    								<p>Nenhum curso foi encontrado com os requisitos de pesquisa escolhidos!</p>
    								<a href="'.base_url("Cursos/Page/1").'">Limpar pesquisa</a>
    							</div>';
    		}else{
    			$data['curso'] = $dado;
    		}
    		
    	    $data['page'] = $this->pagination($page, $filtro, $pesq);
    
    		$this->load->view('inset/head');
    		$this->load->view('inset/curso/curso', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	public function pagination($page, $filtro, $pesq){
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->pagination($page, $filtro, $pesq);
    		
    		return $dado;
    	}
    	
    	public function catalogoCursos($page){
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$data['curso'] = $curso->catalogoCursos(9, $page, null);
    		$data['page'] =  $this->paginationCatalogoCursos($page, '');
    		
    		$this->load->view('inset/head');
    		$this->load->view('inset/curso/catalogoCursos', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	//listagem com filtro
    	public function listarFiltroCatalogoCursos($page){
    		$pesq = $this->input->get('pesq');
    		
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->catalogoCursos(9, $page, $pesq);
    		
    		if($dado == null){
    			$data['result_error'] = '<div class="col-lg-12 filtro-msg">
    								<p class="h3">Nenhum item encontrado!</p>
    								<p>Nenhum curso foi encontrado com os requisitos de pesquisa escolhidos!</p>
    								<a href="'.base_url("Cursos/Page/1").'">Limpar pesquisa</a>
    							</div>';
    		}else{
    			$data['curso'] = $dado;
    		}
    		
    	    $data['page'] = $this->paginationCatalogoCursos($page, $pesq);
    
    		$this->load->view('inset/head');
    		$this->load->view('inset/curso/catalogoCursos', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	public function paginationCatalogoCursos($page, $pesq){
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->paginationCatalogoCursos($page, $pesq);
    		
    		return $dado;
    	}
    	
    	public function carregarCurso($id){
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->carregarCurso($id);
    		
    		return $dado;
    	}
    	
    	public function getDadosCurso(){
    	    $id = $this->input->post('cdcurso');
    	    
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->carregarCurso($id);
    		
    		$dado->vl_curso = number_format($dado->vl_curso, 2, ',', '.');
    		
    		echo json_encode($dado);
    	}
    	
    	public function trabalhoTeste($page){
    	    $this->load->model('Cursodao');
    		
    		$curso = $this->Cursodao;
    		
    		$dado = $curso->listarCurso(9, $page, false, null, null);
    		
    		echo json_encode($dado);
    	}
    	
    	
    }
?>
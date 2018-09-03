<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Noticias extends CI_Controller {
        
        public function index($page){
    	    $data['not'] = $this->listarNoticia($page);
    	    $data['page'] = $this->pagination($page, "");
    	    $data['notDest'] = $this->listarNotDest();
    
    		$this->load->view('inset/head');
    		$this->load->view('inset/noticia/noticia', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	public function visNoticia($id){
    	    $data['not'] = $this->carregarNoticia($id);
    	    $data['notDest'] = $this->listarNotDest();
    	    
    	    $this->load->view('inset/head');
    		$this->load->view('inset/noticia/noticiaVisualizar', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	//listagem com filtro e pesquisa
    	public function listarNoticia($page){
    	    $this->load->model('Noticiadao');
    		
    		$not = $this->Noticiadao;
    		
    		$dado = $not->listarNoticia(5, $page, false, null);
    		
    		return $dado;
    	}
    	
    	public function carregarNoticia($id){
    	    $this->load->model('Noticiadao');
    		
    		$not = $this->Noticiadao;
    		
    		$dado = $not->carregarNoticia($id);
    		
    		return $dado;
    	}
    	
    	public function pagination($page, $pesq){
    	    $this->load->model('Noticiadao');
    		
    		$not = $this->Noticiadao;
    		
    		$dado = $not->pagination($page, $pesq);
    		
    		return $dado;
    	}
    	
    	public function listarFiltro($page){
    		$pesq = $this->input->get('pesq');
    		
    	    $this->load->model('Noticiadao');
    		
    		$not = $this->Noticiadao;
    		
    		$dado = $not->listarNoticia(5, $page, false, $pesq);
    		
    		if($dado == null){
    			$data['result_error'] = '<div class="col-lg-12 filtro-msg">
    								<p class="h3">Nenhum item encontrado!</p>
    								<p>Nenhuma notícia foi encontrada com os requisitos de pesquisa escolhidos!</p>
    								<a href="'.base_url("Noticias/Page/1").'">Limpar pesquisa</a>
    							</div>';
    		}else{
    			$data['not'] = $dado;
    		}
    		
    	    $data['page'] = $this->pagination($page, $pesq);
    	    $data['notDest'] = $this->listarNotDest();
    
    		$this->load->view('inset/head');
    		$this->load->view('inset/noticia/noticia', $data);
    		$this->load->view('inset/footer');
    	}
    	
    	public function listarNotDest(){
    		$this->load->model('Noticiadao');
    		
    		$not = $this->Noticiadao;
    		
    		$dado = $not->listarNotDest();
    		
    		return $dado;
    	}
    }
?>
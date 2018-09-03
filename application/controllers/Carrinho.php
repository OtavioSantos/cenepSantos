<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Carrinho extends CI_Controller {
        
        public function verificarExistenciaCarrinho(){
            if(!$this->session->has_userdata('carrinho')){
                $this->session->set_userdata('carrinho', (object) array(
                        'item' => [],
                        'desc' => [],
                        'vlTotal' => 0,
                        'vlTotalDesc' => 0,
                    ));
            }else{
                $this->session->set_userdata('carrinho', (object) array(
                        'item' => $this->session->carrinho->item,
                        'desc' => $this->session->carrinho->desc,
                        'vlTotal' => $this->calcularValorTotal(),
                        'vlTotalDesc' => $this->calcularValorDesc(),
                    ));
            }
        }
    
        public function index(){
    		$this->verificarExistenciaCarrinho();
            $data['car'] = $this->exibirCarrinho();
            $data['valorTotal'] = $this->calcularValorTotal();
            
            $this->load->view('inset/head');
    		$this->load->view('inset/carrinho/carrinho', $data);
    		$this->load->view('inset/footer');
        }
        
        public function adicionarItem(){
            $cdcurso = $this->input->post('cdcurso');
            
            $this->verificarExistenciaCarrinho();
            
            //verifica se o item ja esta cadastrado no carrinho
            if(in_array($cdcurso, $arrayItem)){
                echo json_encode(['result'=>true]);
            }else{
                array_push($arrayItem, $cdcurso);
                
                array_push($this->session->carrinho->item, $cdcurso);
            }
            
            $this->verificarExistenciaCarrinho();
        }
        
        public function exibirCarrinho(){
            $this->load->model('Carrinhodao');
            
            $car = $this->Carrinhodao;
            
            return $car->exibirCarrinho();
        }
        
        public function calcularValorTotal(){
            $this->load->model('Carrinhodao');
            
            $item = $this->Carrinhodao->exibirCarrinho();
            
            $total = 0;
            
            foreach($item as $it){
                $it->vl_curso;
                $total = $total + $it->vl_curso;
            }
            
            return $total;
        }
        
        public function calcularValorDesc(){
            $this->load->model('Carrinhodao');
            $car = $this->Carrinhodao;
            
            //VERIFICA SE FOI ENVIADO ALGO COM O METHODO POST
            if($this->input->post('desc') != null){
                $desc = strtoupper($this->input->post('desc'));
                
                //VERIFICA SE O CUPOM JA ESTA EM USO
                $return1 = false;
                foreach($this->session->carrinho->desc as $d){
                    if($d->cd_desc == $desc and $d->ds_status != "indisponivel"){
                        $return1 = true;
                    }
                }
                
                $cdDesc = $car->verificarDesconto($desc);
                
                if($return1){
                    echo json_encode([
        					'tipo'=>'error',
        					'titulo'=>'CUPOM JA EM USO OU INDISPONIVEL!',
        					'msg'=>'O cupom inserido ja está em uso ou com prazo de validade vencido.',
        				]);
                }else{
                    if(!$cdDesc){
                        echo json_encode([
        					'tipo'=>'error',
        					'titulo'=>'CÓDIGO DE CUPOM INVÁLIDO!',
        					'msg'=>'Certifique que tenha digitado corretamente e tente novamente.',
        				]);
                    }else{
                        //VERIFICA SE O CÓDIGO DE CUPOM CORRESPONDE ALGUM DOS CURSOS NO CARRINHO
                        array_push($this->session->carrinho->desc, $cdDesc);
                        
                        $cdDesc = [];
                        array_push($cdDesc, $car->verificarDesconto($desc));
                        
                        $return2 = $car->relacionarCursoCupom($cdDesc);
                        
                        if($return2){
                            echo json_encode([
            					'tipo'=>'confirm',
            					'titulo'=>'CUPOM UTILIZADO!',
            					'msg'=>'O cupom <strong>'.$desc.'</strong> foi utilizado com sucesso!<br>
            					       <small>
            					            O desconto permanecerá enquanto o item correspondente ao mesmo
            					            permanecer no carrinho.
            					       </small>',
            				]);
                        }else{
                            array_pop($this->session->carrinho->desc);
                        
                            echo json_encode([
            					'tipo'=>'error',
            					'titulo'=>'NENHUM CURSO NO CARRINHO CORRESPONDE AO CUPOM!',
            					'msg'=>'Nenhum curso no carrinho possui desconto para o cupom digitado.<br>
            					        Verifique os cursos disponíveis para o cupom utilizado!',
            				]);
                        }
                    }
                }
            }else{
                return $car->aplicarDesconto();
            }
        }
        
        public function removerItem(){
            $cdcurso = $this->input->post('cdcurso');
            
            $cursoPos = array_search($cdcurso, $this->session->carrinho->item);
            
            unset($this->session->carrinho->item[$cursoPos]);
            
            $cddesc = $this->session->carrinho->desc;
            
            //VERIFICA A RELAÇÃO CURSO DESCONTO
            $exist = false;
            
            foreach($this->session->carrinho->desc as $d){
                $ver = explode(" ", $d->cd_cursos);
                $desc = $d->cd_desc;
                
                foreach($this->session->carrinho->item as $i){
                    foreach($ver as $v){
                        if($i == $v){
                            $exist = true;
                            break;
                        }
                    }
                }
                
                //SE NÃO HOUVER MAIS CURSOS REFE RENTE AO CUPOM, O CUPOM DEVE SER REMOVIDO
                if(!$exist || empty($this->session->carrinho->item)){
                    foreach($this->session->carrinho->desc as $d){
                        if($d->cd_desc == $desc){
                            $pos = array_search($d, $this->session->carrinho->desc);
                            unset($this->session->carrinho->desc[$pos]);
                        }
                    }
                }
            }
            
            $this->verificarExistenciaCarrinho();
            
            echo json_encode([
    					'tipo'=>'confirm',
    					'titulo'=>'CURSO REMOVIDO DO CARRINHO!',
    					'msg'=>'O curso pode ser readicionado ao seu carrinho.<br>
    					        Tenha em mente que você perderá o desconto referente ao cupom correspondente ao curso caso esteja utilizando algum.',
    				]);
        }
        
        public function retornoPagamentoPS(){
            $this->load->model('Usuariodao');
            $user = $this->Usuariodao;
            
            $nmUser = $this->input->post('CliNome');
            $cdUser = $user->getcd($nmUser)->cd_user;
            
            $qtItem = $this->input->post('NumItens');
            $cdItem = [];
            
            $status = $this->input->post('StatusTransacao');
            
            for($i = 1; $i <= $qtItens; $i++){
                array_push($cdItem, $this->input->post('ProdID_'.$i));
            }
            
            $codCompra = $user;
            
            foreach($cdItem as $c){
                $codCompra = $codCompra.$c;
            }
            
            //PESQUISAR COMPRA E ALTERAR STATUS
            $this->load->model('Carrinhodao');
            $car = $this->Carrinhodao;
            
            $car->alterarStatusCompra($codCompra, $status);
            
        }
        
        public function retornarDadosCarrinho(){
            echo json_encode($this->session->carrinho);
            
            //DESTRÓI A SESSION CARRINHO
            unset( $_SESSION['carrinho'] );
        }
    }
?>
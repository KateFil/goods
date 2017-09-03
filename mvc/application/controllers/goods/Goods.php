<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller {

	public function index()
	{
	    $this->load->model('goods/goods_model');
        $data['query'] = $this->goods_model->index();
//	    echo '<pre>';
//	        print_r($data['query']);
//	    echo '</pre>';

	    $data['title'] = 'Goods';
        $this->load->view('goods/header_view', $data);
        $this->load->view('goods/index_view', $data);
        $this->load->view('goods/footer_view', $data);

    }

    public function add()
    {
        $data=[];

        if($this->input->post('name') != '' && $this->input->post('description') != '' && $this->input->post('price') != ''){
            foreach ($this->input->post() as $key => $val){
                $val = trim($val);
                $val = stripslashes($val);
                $val = strip_tags($val);
                $val = htmlspecialchars($val);
                $data[$key]=$val;

            };

            $this->load->model('goods/goods_model');
            $data['x'] = $this->goods_model->add($data);
            echo json_encode($data['x']);
        }
        else{
            $data['error'] = 'не все поля заполнены';
            echo json_encode($data);
        }

    }

    public function show(){
        $this->load->model('goods/goods_model');
        $data['x'] = $this->goods_model->show();
        echo $data['x'];
    }
    public function delete(){
        $this->load->model('goods/goods_model');
        $data['x'] = $this->goods_model->delete($this->input->post('id'));
        echo json_encode($data);
    }

    public function update(){
        $this->load->model('goods/goods_model');
        $data['x'] = $this->goods_model->update($this->input->post());
        echo json_encode($data);

    }


}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $query = $this->db->get('goods');
        $query = $query->result();
        return $query;
    }

    public function add($x)
    {
        $this->db->insert('goods', $x);
        return 'ok';
    }

    public function show()
    {
        $query = $this->db->select('*')
                          ->order_by('id', 'DESC')
                          ->limit(1)
                          ->get('goods');
        $query = $query->result();
        return json_encode($query);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('goods');
        return 'ok';
    }
    
    public function update($x)
    {
        
        $array = array(
            $x['name']=> $x['text']
        );
        $this->db->set($array);
        $this->db->where('id', $x['id']);
        $this->db->update('goods');

        return 'ok';

    }


}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        @$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'supplier/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'supplier/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'supplier/index.html';
            $config['first_url'] = base_url() . 'supplier/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Supplier_model->total_rows($q);
        $dokter = $this->Supplier_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $dokter,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'supplier/supplier_list';
         $this->load->view('template', $data);
    }

    public function read($id) 
    {
        $row = $this->Supplier_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_supplier' => $row->kode_supplier,
		'nama_supplier' => $row->nama_supplier,
        'alamat' => $row->alamat,
        'telepon' => $row->telepon,
	    );
            $data['page'] = 'supplier/supplier_read';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('supplier/create_action'),
	    'id' => set_value('id'),
	    'kode_supplier' => set_value('kode_supplier'),
	    'nama_supplier' => set_value('nama_supplier'),
        'alamat' => set_value('alamat'),
        'telepon' => set_value('telepon'),
	);
        $data['page'] = 'supplier/supplier_form';
        $this->load->view('template', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'telepon' => $this->input->post('telepon',TRUE),
	    );

            $this->Supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Supplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('supplier/update_action'),
		'id' => set_value('id', $row->id),
		'kode_supplier' => set_value('kode_supplier', $row->kode_supplier),
		'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
        'alamat' => set_value('alamat', $row->alamat),
        'telepon' => set_value('telepon', $row->telepon),
	    );
            $data['page'] = 'supplier/supplier_form';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'telepon' => $this->input->post('telepon',TRUE),
	    );

            $this->Supplier_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Supllier_model->get_by_id($id);

        if ($row) {
            $this->Supplier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_supplier', 'kode_supplier', 'trim|required');
	$this->form_validation->set_rules('nama_supplier', 'spesialis', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('telepon', 'telepon', 'trim|required');


	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-18 10:58:59 */
/* http://harviacode.com */
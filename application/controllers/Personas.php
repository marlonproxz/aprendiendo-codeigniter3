<?php

class Personas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper("url");
        $this->load->model('Persona');

        $this->load->library('form_validation');
        $this->load->database();
    }

    function index() {
        redirect("/personas/listado");
    }

    public function listado() {
        $vdata["personas"] = $this->Persona->findAll();
        $this->load->view('personas/listado', $vdata);
    }

    public function guardar($persona_id = null) {

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('edad', 'Edad', 'required');

        $vdata["nombre"] = $vdata["apellido"] = $vdata["edad"] = "";
        if (isset($persona_id)) {

            $persona = $this->Persona->find($persona_id);

            if (isset($persona)) {
                $vdata["nombre"] = $persona->nombre;
                $vdata["apellido"] = $persona->apellido;
                $vdata["edad"] = $persona->edad;
            }
        }

        if ($this->input->server("REQUEST_METHOD") == "POST") {

            $data["nombre"] = $this->input->post("nombre");
            $data["apellido"] = $this->input->post("apellido");
            $data["edad"] = $this->input->post("edad");

            $vdata["nombre"] = $this->input->post("nombre");
            $vdata["apellido"] = $this->input->post("apellido");
            $vdata["edad"] = $this->input->post("edad");

            if ($this->form_validation->run()) {

                if (isset($persona_id)) {
                    $this->Persona->update($persona_id, $data);
                } else
                    $this->Persona->insert($data);
                
                $this->do_upload();
                
                redirect("/personas/guardar/$persona_id");
            }
        }
        
        $this->load->view('personas/guardar', $vdata);
    }

    private function do_upload() {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            // $error = array('error' => $this->upload->display_errors());
            var_dump($this->upload->display_errors());
            
            // $this->load->view('upload_form', $error);
        } else {
            //$data = array('upload_data' => $this->upload->data());
            var_dump($data);
            //$this->load->view('upload_success', $data);
        }
    }

    public function borrar($persona_id = null) {
        $this->Persona->delete($persona_id);

        redirect("/personas/listado");
    }

    public function borrar_ajax($persona_id = null) {
        $this->Persona->delete($persona_id);

        echo 1;
    }

    public function ver($persona_id = null) {

        if (!isset($persona_id)) {
            show_404();
        }

        $persona = $this->Persona->find($persona_id);

        if (!isset($persona)) {
            show_404();
        }

        if (isset($persona)) {
            $vdata["nombre"] = $persona->nombre;
            $vdata["apellido"] = $persona->apellido;
            $vdata["edad"] = $persona->edad;
        } else {
            $vdata["nombre"] = $vdata["apellido"] = $vdata["edad"] = "";
        }

        $this->load->view('personas/ver', $vdata);
    }

}

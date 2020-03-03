<?php

class Personas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper("url");
        $this->load->model('Persona');

        //$this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
    }
    
    function llamar_helper(){
        $this->load->helper('list_person_helper');
        
        //var_dump(list_person());
        $vdata["personas"] = list_person();
        $this->load->view('personas/llamar_helper', $vdata);
    }

    function index() {
        //$this->session->set_userdata('item', 'PS4');
        //echo $this->session->userdata('item');
        $this->session->set_flashdata('item', 'value');
        
        redirect("/personas/listado");
    }

    public function listado() {
        
        //echo $this->session->flashdata('item');
        
        /*$newdata = array(
        'username'  => 'johndoe',
        'email'     => 'johndoe@some-site.com',
        'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);*/
        
        //echo $this->session->userdata('name');
        //$this->session->unset_userdata('name');
        
        $vdata["personas"] = $this->Persona->findAll();
        $view["view"] = $this->load->view('personas/listado', $vdata, TRUE);
        
        $this->load->view('body', $view);
    }

    public function guardar($persona_id = null) {

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('edad', 'Edad', 'required');

        $error = $vdata["image"] = $vdata["nombre"] = $vdata["apellido"] = $vdata["edad"] = "";
        if (isset($persona_id)) {

            $persona = $this->Persona->find($persona_id);

            if (isset($persona)) {
                $vdata["nombre"] = $persona->nombre;
                $vdata["apellido"] = $persona->apellido;
                $vdata["edad"] = $persona->edad;
                $vdata["image"] = $persona->image;
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
                    $persona_id = $this->Persona->insert($data);
                
                $error = $this->do_upload($persona_id);
                
                $this->session->set_flashdata('message', 'Guardado exitoso de '. $vdata["nombre"]);
                if($error == "")
                    
                    redirect("/personas/guardar/$persona_id");
                    //redirect("/personas/listado");
            }
        }
        
        $vdata["error"] = $error;
        
        $view["view"] = $this->load->view('personas/guardar', $vdata, TRUE);
        $this->load->view('body', $view);
    }

    private function do_upload($persona_id) {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            // $error = array('error' => $this->upload->display_errors());
            //var_dump($this->upload->display_errors());
            return $this->upload->display_errors();
            // $this->load->view('upload_form', $error);
        } else {
            $data = $this->upload->data();
            //var_dump($data);
            $name = $data["file_name"];
            $save = array(
                'image' =>  $name
            );
            //var_dump($data);
            $this->Persona->update($persona_id, $save);
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

        $view["view"] = $this->load->view('personas/ver', $vdata, TRUE);
        $this->load->view('body', $view);
    }

}

<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class News extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('news', 'dutch');
        $this->load->model('news_model');
    }

    public function index()
    {
        $data['title'] = $this->lang->line('news_title');
        //$data['users'] = ['ram', 'shyam', 'mohan', 'radhey'];
        //$this->session->set_userdata('email', 'vikas36714@gmail.com');
        $data['allnews'] = $this->news_model->get_allnews();
        
        $this->load->view('news/index', $data);
    }

    public function details($id)
    {
        $news = $this->news_model->get_news($id);

        $data['title'] = $news->title;

        $data['news'] = $news;

        $this->load->view('news/details', $data);
        
    }

    public function store()
    {
        $title = 'county';
        $description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';

        $newsdata = [
            'title' => $title,
            'description' => $description,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s', time())
        ];

        $this->session->set_flashdata('message', 'Record has been added.');
        $this->news_model->insert_news($newsdata);

        redirect('news/index');
    }

    public function edit($id)
    {
        $title = 'bussiness';
        $description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';

        $newsdata = [
            'title' => $title,
            'description' => $description,
            'active' => 1,
        ];

        $this->session->set_flashdata('message', 'Record has been updated.');
        $this->news_model->update_news($id, $newsdata);

        redirect('news/index');
    }

    public function delete($id)
    {
        $this->news_model->delete_news($id);

        $this->session->set_flashdata('message', 'Record has been deleted.');
        redirect('news/index');
    }



}
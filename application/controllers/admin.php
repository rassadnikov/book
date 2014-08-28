<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 27.08.14
 * Time: 21:10
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $data = array();

    public function __construct(){
        parent::__construct();

        $this->check_admin();

        $this->data['title'] = 'Ultra, админ панель';

    }

    public function index(){

        $this->data['active'] = __FUNCTION__;

        $this->load->view('admin/header' , $this->data);
        $this->load->view('admin/welcome');
        $this->load->view('admin/footer');
    }

    public	function check_admin() {

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function rubric(){

        $this->data['active'] = __FUNCTION__;
        $this->data[$this->data['active'].'List'] = $this->common_model->selectFrom($this->data['active']);

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/'.$this->data['active']);
        $this->load->view('admin/footer');
    }

    public function rubricAction($action, $id = false){

        switch($action){
            case 'add' :

                $arrayData = array();

                foreach($this->input->post() as $key =>$val){
                    $arrayData[$key] = trim($val);
                }

                if(!empty($arrayData) && is_array($arrayData)){
                    $this->common_model->insertInto('rubric', $arrayData);
                }
                redirect('/admin/rubric', 'refresh');
                break;
            case 'edit' :
                if($id && !empty($id) && is_numeric($id)){
                    $arrayData = array();

                    foreach($this->input->post() as $key =>$val){
                        $arrayData[$key] = trim($val);
                    }

                    if(!empty($arrayData) && is_array($arrayData)){
                        $this->common_model->updateWhere('rubric', 'rub_id ='.$id, $arrayData);
                    }
                }
                break;
            case 'delete' :

                $this->common_model->deleteFrom('rubric', 'rub_id ='.$id);
                $this->common_model->deleteFrom('book_rubric', 'bru_rubric_id ='.$id);

                break;
            default :
                break;
        }

    }

    public function author(){

        $this->data['active'] = __FUNCTION__;
        $this->data[$this->data['active'].'List'] = $this->common_model->selectFrom($this->data['active']);

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/'.$this->data['active']);
        $this->load->view('admin/footer');
    }

    public function authorAction($action, $id = false){

        switch($action){
            case 'add' :

                $arrayData = array();

                foreach($this->input->post() as $key =>$val){
                    $arrayData[$key] = trim($val);
                }

                if(!empty($arrayData) && is_array($arrayData)){
                    $this->common_model->insertInto('author', $arrayData);
                }
                redirect('/admin/author', 'refresh');
                break;
            case 'edit' :
                if($id && !empty($id) && is_numeric($id)){
                    $arrayData = array();

                    foreach($this->input->post() as $key =>$val){
                        $arrayData[$key] = trim($val);
                    }

                    if(!empty($arrayData) && is_array($arrayData)){
                        $this->common_model->updateWhere('author', 'aut_id ='.$id, $arrayData);
                    }
                }
                break;
            case 'delete' :

                $this->common_model->deleteFrom('author', 'aut_id ='.$id);
                $this->common_model->deleteFrom('book_author', 'bau_author_id ='.$id);

                break;
            default :
                break;
        }

    }

    public function book($bookId = ''){

        $this->data['active'] = __FUNCTION__;

        if(isset($bookId) && !empty($bookId) && is_numeric($bookId)){

            $this->data['book'] = $this->common_model->selectFromWhere('book', 'boo_id = '.$bookId);
            $this->data['authorList'] = $this->author_model->selectAuthorsWithBookId($bookId);
            $this->data['rubricList'] = $this->rubric_model->selectRubricsWithBookId($bookId);

            $this->load->view('admin/header', $this->data);
            $this->load->view('admin/book_one');
            $this->load->view('admin/footer');

        }else{

            $this->data['bookList'] = $this->common_model->selectFrom('book');

            $this->load->view('admin/header', $this->data);
            $this->load->view('admin/book');
            $this->load->view('admin/footer');
        }
    }

    public function bookAction($action, $bookId = ''){

        if(isset($bookId) && !empty($bookId) && !is_numeric($bookId)){
            return false;
        }

        switch($action){
            case 'add' :

                $arrayData = array('boo_name' => 'Новая книга');
                $newBookId = $this->common_model->insertInto('book', $arrayData);
                redirect('/admin/book/'.$newBookId, 'refresh');
                break;
            case 'edit' :

                $arrayData = array();
                $rubrics = $this->input->post('rubrics');
                $this->common_model->deleteFrom('book_rubric', 'bru_book_id = '.$bookId);
                if(isset($rubrics) && !empty($rubrics)){
                    foreach($rubrics as $rubricId){
                        $this->common_model->insertInto('book_rubric', array('bru_rubric_id' => $rubricId, 'bru_book_id' => $bookId));
                    }
                    unset($_POST['rubrics']);
                }

                $authors = $this->input->post('authors');
                $this->common_model->deleteFrom('book_author', 'bau_book_id = '.$bookId);
                if(isset($authors) && !empty($authors)){
                    foreach($authors as $authorId){
                        $this->common_model->insertInto('book_author', array('bau_author_id' => $authorId, 'bau_book_id' => $bookId));
                    }
                    unset($_POST['authors']);
                }

                foreach($this->input->post() as $key =>$val){
                    $arrayData[$key] = trim($val);
                }

                if(!empty($_FILES["photo"]["tmp_name"])){

                    $new_file_name = $bookId."-".time().".jpg";
                    if(!is_dir("uploads/books")){
                        mkdir("uploads/books", 0777);
                        mkdir("uploads/books/preview", 0777);
                    }
                    if(move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/books/".$new_file_name)){

                        $original = "uploads/books/".$new_file_name;
                        $resizeFile = "uploads/books/preview/".$new_file_name;

                        try{
                            $thumb = PhpThumbFactory::create($original);
                        }catch (Exception $e){
                            // handle error here however you'd like
                        }

                        $thumb->adaptiveResize(120, 120);
                        $thumb->save($resizeFile);

                        $arrayData['boo_image'] = $new_file_name;
                    }
                }

                if(!empty($arrayData) && is_array($arrayData)){
                    $this->common_model->updateWhere('book', 'boo_id ='.$bookId, $arrayData);
                }

                redirect('/admin/book/'.$bookId);
                break;
            case 'delete' :

                $book = $this->common_model->selectFromWhere('book', 'boo_id ='.$bookId);

                if(isset($book) && !empty($book)){
                    $del_file = array(
                        'uploads/books/'.$book->boo_image,
                        'uploads/books/preview/'.$book->boo_image
                    );
                    $this->delete_file($del_file);
                }

                $this->common_model->deleteFrom('book_author', 'bau_book_id ='.$bookId);
                $this->common_model->deleteFrom('book_rubric', 'bru_book_id ='.$bookId);
                $this->common_model->deleteFrom('book', 'boo_id ='.$bookId);
                redirect('/admin/book');
                break;
            case 'deleteImage' :

                $book = $this->common_model->selectFromWhere('book', 'boo_id ='.$bookId);

                if(isset($book) && !empty($book)){
                    $del_file = array(
                        'uploads/books/'.$book->boo_image,
                        'uploads/books/preview/'.$book->boo_image
                    );
                    $this->delete_file($del_file);
                }

                redirect('/admin/book/'.$bookId);
                break;

            default :
                break;
        }
    }

    public function delete_file($file){

        if(is_array($file)){
            foreach($file as $oneFile){
                if(file_exists($oneFile)) {
                    unlink($oneFile);
                    return true;
                }
            }
        }else{

            if(file_exists($file)) {
                if(@unlink($file)) {
                    return true;
                }
            }
        }
    }
}//end class

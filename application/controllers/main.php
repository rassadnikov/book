<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    public $data = array();

    public function __construct(){
        parent::__construct();
        $this->data['active'] = '';
    }

	public function index(){

        $this->load->view('header', $this->data);
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}

    public function book($bookId = ''){

        $this->data['active'] = __FUNCTION__;

        if(isset($bookId) && !empty($bookId) && is_numeric($bookId)){

            $this->data['book'] = $book = $this->common_model->selectFromWhere('book', 'boo_id = '.$bookId);
            $this->data['authorList'] = $this->author_model->selectAuthorsByBookId($bookId);
            $this->data['rubricList'] = $this->rubric_model->selectRubricsByBookId($bookId);

            $this->load->view('header', $this->data);
            $this->load->view('book_one');
            $this->load->view('footer');

        }else{

            $this->data['bookList'] = $this->common_model->selectFrom('book');

            $this->load->view('header', $this->data);
            $this->load->view('book');
            $this->load->view('footer');
        }
    }

    public function author($authorId = ''){

        $this->data['active'] = __FUNCTION__;

        if(isset($authorId) && !empty($authorId) && is_numeric($authorId)){

            $this->data['author'] = $book = $this->common_model->selectFromWhere('author', 'aut_id = '.$authorId);
            $this->data['bookList'] = $this->book_model->selectBooksByAuthor($authorId);
            $this->data['authorBooks'] = $this->load->view('book', $this->data, true);

            $this->load->view('header', $this->data);
            $this->load->view('author_one');
            $this->load->view('footer');

        }else{

            $this->data['authorList'] = $this->common_model->selectFrom('author');

            $this->load->view('header', $this->data);
            $this->load->view('author');
            $this->load->view('footer');
        }
    }

    public function rubric($rubricId = ''){

        $this->data['active'] = __FUNCTION__;

        if(isset($rubricId) && !empty($rubricId) && is_numeric($rubricId)){

            $this->data['rubric'] = $this->common_model->selectFromWhere('rubric', 'rub_id = '.$rubricId);
            $this->data['bookList'] = $this->book_model->selectBooksByRubric($rubricId);
            $this->data['rubricBooks'] = $this->load->view('book', $this->data, true);

            $this->load->view('header', $this->data);
            $this->load->view('rubric_one');
            $this->load->view('footer');

        }else{

            $this->data['rubricList'] = $this->common_model->selectFrom('rubric');

            $this->load->view('header', $this->data);
            $this->load->view('rubric');
            $this->load->view('footer');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
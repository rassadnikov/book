<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 27.08.14
 * Time: 23:25
 */

class Book_model extends CI_Model {

    public function selectBooksByAuthor($authorId){

        if(empty($authorId) || !is_numeric($authorId))
            return false;

        $this->db->join('book_author', 'book.boo_id = book_author.bau_book_id', 'left');
        $this->db->where('bau_author_id', $authorId);
        $result = $this->db->get('book')->result();

        return ($result && count($result) > 0) ?  $result : false;
    }

    public function selectBooksByRubric($rubricId){

        if(empty($rubricId) || !is_numeric($rubricId))
            return false;

        $this->db->join('book_rubric', 'book.boo_id = book_rubric.bru_book_id', 'left');
        $this->db->where('bru_rubric_id', $rubricId);
        $result = $this->db->get('book')->result();

        return ($result && count($result) > 0) ?  $result : false;

    }

}// end Class
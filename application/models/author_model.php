<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 28.08.14
 * Time: 0:52
 */

class Author_model extends CI_Model {

    public function selectAuthorsWithBookId($bookId){

        if(empty($bookId) || !is_numeric($bookId))
            return false;

        $this->db->join('book_author', 'author.aut_id = book_author.bau_author_id && b_book_author.bau_book_id='.$bookId, 'left');
        $result = $this->db->get('author')->result();

        return ($result && count($result) > 0) ?  $result : false;
    }

    public function selectAuthorsByBookId($bookId){

        if(empty($bookId) || !is_numeric($bookId))
            return false;

        $this->db->join('book_author', 'author.aut_id = book_author.bau_author_id', 'left');
        $this->db->where('book_author.bau_book_id', $bookId);
        $result = $this->db->get('author')->result();

        return ($result && count($result) > 0) ?  $result : false;
    }

}// end Class
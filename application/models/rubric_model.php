<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 28.08.14
 * Time: 0:53
 */

class Rubric_model extends CI_Model {

    public function selectRubricsWithBookId($bookId){

        if(empty($bookId) || !is_numeric($bookId))
            return false;

        $this->db->join('book_rubric', 'rubric.rub_id = book_rubric.bru_rubric_id && b_book_rubric.bru_book_id='.$bookId, 'left');
        $result = $this->db->get('rubric')->result();

        return ($result && count($result) > 0) ?  $result : false;
    }

    public function selectRubricsByBookId($bookId){

        if(empty($bookId) || !is_numeric($bookId))
            return false;

        $this->db->join('book_rubric', 'rubric.rub_id = book_rubric.bru_rubric_id', 'left');
        $this->db->where('book_rubric.bru_book_id', $bookId);
        $result = $this->db->get('rubric')->result();

        return ($result && count($result) > 0) ?  $result : false;
    }

}// end Class
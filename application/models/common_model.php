<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 17.04.14
 * Time: 18:36
 */

//namespace common;


class Common_model extends CI_Model {

    public function selectFrom($tableName, $join = false, $order = false, $limit = false){

        if(empty($tableName))
            return false;

        if($join != false){
            $this->db->join($join[0], $join[1], 'left');
        }
        if($order != false){
            $this->db->order_by($order[0], $order[1]);
        }
        if($limit != false && is_array($limit)){
            $this->db->limit($limit);
        }
        $result = $this->db->get($tableName)->result();
        return ($result && count($result) > 0) ?  $result : false;
    }

    public function selectFromWhereList($tableName, $where, $order = false, $limit = false, $join = false){

        if(empty($tableName) || empty($where))
            return false;

        $this->db->where($where);
        if($order != false){
            $this->db->order_by($order[0], $order[1]);
        }
        if($limit != false && is_array($limit)){
            $this->db->limit($limit);
        }
        if($join != false){
            $this->db->join($join[0], $join[1]);
        }
        $result = $this->db->get($tableName)->result();

        return ($result && count($result) > 0) ?  $result : false;
    }

    public function selectFromWhere($tableName, $where, $join = false){

        if(empty($tableName) || empty($where))
            return false;

        if($join != false){
            $this->db->join($join[0], $join[1]);
        }
        $this->db->where($where);
        $result = $this->db->get($tableName)->row();

        return ($result && count($result) > 0) ?  $result : false;
    }

    public function insertInto($tableName, $arrayData){

        if(empty($tableName) || empty($arrayData) || !is_array($arrayData))
            return false;

        $this->db->insert($tableName, $arrayData);

        return is_numeric($this->db->insert_id()) ? $this->db->insert_id() : false;
    }

    public function updateWhere($tableName, $where, $arrayData){

        if(empty($tableName) || empty($where) || empty($arrayData) || !is_array($arrayData))
            return false;

        $this->db->where($where);
        $this->db->update($tableName, $arrayData);

    }

    public function deleteFrom($tableName, $where){

        if(empty($tableName) || empty($where))
            return false;

        $this->db->where($where);
        $this->db->delete($tableName);
    }

    public function getNextIdFrom($tableName){

        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $result = $this->db->get($tableName)->row();

        return ($result && count($result) > 0) ?  $result->id + 1 : false;
    }

    public function check($tableName, $where){

        if(empty($tableName) || empty($where))
            return false;

        $this->db->where($where);
        $result = $this->db->get($tableName)->row();

        return ($result && count($result) > 0) ?  true : false;
    }

    public function countFrom($tableName){

        if(empty($tableName))
            return false;

        return $this->db->count_all_results($tableName);
    }






    public function addColumnForTable($tableName, $fields){

        if(empty($tableName) || empty($fields))
            return false;

        $this->load->dbforge();
        $this->dbforge->add_column($tableName, $fields);
    }

    public function deleteColumnFromTable($tableName, $column){

        if(empty($tableName) || empty($column))
            return false;

        $this->load->dbforge();
        if(is_array($column)){
            foreach($column as $col){
                $this->dbforge->drop_column($tableName, $col);
            }
        }else{
            $this->dbforge->drop_column($tableName, $column);
        }

    }



} // endClass
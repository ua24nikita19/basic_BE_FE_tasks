<?php

namespace Application\Models;
use Application\Core\Model;

/** Class to work woth model Task*/
class Task extends Model
{
    public function getAllRecords()
    {
        $getQuery = $this->db->query("SELECT * FROM tasks");
        $result = $getQuery->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getRecordSortedByParam($param)
    {
        $getQuery = $this->db->query("SELECT * FROM tasks ORDER BY $param  ASC");
        $result = $getQuery->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

}
<?php

namespace Source\Models;

use Source\Core\Connect;

class Course
{

    public function selectAll ()
    {
        $query = "SELECT * FROM courses";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectById (int $id)
    {
        $query = "SELECT * FROM courses WHERE id = {$id}";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectByCategory(string $categoryName)
    {
        $query = "SELECT courses.* 
                  FROM courses 
                  JOIN categories ON categories.id = courses.category_id 
                  WHERE categories.name LIKE '{$categoryName}'";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectByCategoryId(int $categoryId)
    {
        $query = "SELECT courses.* 
                  FROM courses 
                  JOIN categories ON categories.id = courses.category_id 
                  WHERE courses.category_id = {$categoryId}";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

}

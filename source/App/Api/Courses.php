<?php

namespace Source\App\Api;

use Source\Models\Course;

class Courses extends Api
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function listByCategory (array $data) : void
    {
        $courses = (new Course())->selectByCategoryId($data["category_id"]);
        $this->back($courses,200);
    }

    public function listCourses (array $data) : void
    {
        $courses = (new Course())->selectAll();
        $this->back($courses,200);
    }

    public function getCourse(array $data): void
    {
        $course = (new Course())->selectById($data["course_id"]);
        $this->back($course,200);
    }

}

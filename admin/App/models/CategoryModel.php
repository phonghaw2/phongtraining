<?php 

class CategoryModel extends DB 
{
   
    protected $table = 'categories';
    public function getCategory(){
        $qr = "SELECT cat.*, count(*) mount FROM categories as cat
                join post on cat.id = post.category_id
                group by cat.id";
        $result = mysqli_query($this->con, $qr);

        return $result;
    }
}

?>
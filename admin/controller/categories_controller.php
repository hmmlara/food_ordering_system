<?php
include_once __DIR__.'/../model/categories_model.php';

class CategoriesController extends Categories{
    public function getcategories(){
        $results=$this->getcategory();
        return $results;
    }

    public function getParent(){
        $parent=$this->getParents();
        return $parent;
     }
     public function addCategory($name,$parent){
        $result=$this->addCat($name,$parent);
            return $result;
        }
        public function getCat($id){
            $result=$this->getCatInfo($id);
            return $result;
        }

        public function updateCategory($id,$name,$parent){
            $results=$this->updateCat($id,$name,$parent);
            return $results;
        }

        public function deleteCategory($id){
            $result=$this->deleteCat($id);
            return $result;
        }
}

?>
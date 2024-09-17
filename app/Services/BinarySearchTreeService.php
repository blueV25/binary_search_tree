<?php

namespace App\Services;

use \App\Models\BinarySearchTree;

class BinarySearchTreeService{

    public function insert($value, $rootId = null)
    {
        if(!$rootId){
            return BinarySearchTree::create(['value' => $value]);
        }

     $node = BinarySearchTree::findOrFail($rootId);

    if($value < $node->value){
            if($node->left_child_id){
                return $this->insert($value, $node->left_child_id);
            }else{
                $newNode = BinarySearchTree::create(['value' => $value]);
                $node->update(['left_child_id' => $newNode->id]);
                return $newNode;
            }
    }elseif($value > $node->value){

           if($node->right_child_id){
                return $this->insert($value, $node->right_child_id);
            }else{
                $newNode = BinarySearchTree::create(['value' => $value]);
                $node->update(['right_child_id' => $newNode->id]);
                return $newNode;
            }

        }else{
            return $node;
        }
    }


    public function search($value, $rootId)
    {

        $node = BinarySearchTree::findOrFail($rootId);

        if($value == $node->value){
            return $node;
        }elseif($value < $node->value && $node->left_child_id){
            return $this->search($value, $node->left_child_id);
        }elseif($value > $node->value && $node->right_child_id){
            return $this->search($value, $node->right_child_id);
        }

        return null;
    }
}

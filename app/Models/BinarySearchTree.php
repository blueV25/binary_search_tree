<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinarySearchTree extends Model
{
    use HasFactory;

   protected $table = "binary_search_trees";

    protected $fillable = ['value', 'left_child_id','right_child_id'];

    public function leftChild(){
        return $this->belongsTo(BinarySearchTree::class, 'left_child_id');
    }

    public function rightChild(){
        return $this->belongsTo(BinarySearchTree::class, 'right_child_id');
    }
}

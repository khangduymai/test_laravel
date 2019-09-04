<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  //fillable
  protected $fillable = [
    'name', 'email', 'active', 'company_id'
  ];

  protected $attributes =[
    'active' => 1
  ];

  //accessor
  public function getActiveAttribute($attribute){
    return $this->activeOption() [$attribute];
  }

  /*
  public function getActiveOoption($attribute) {
    $attributeOptions = [
      1 => 'Hello',
      2 => 'hi',
      3 => 'chao'
    ];

    return $attributeOptions[$attribute];
  }
  */
  

  //declare local scope using for where clause in ORM
    public function scopeActive($querry){
      return $querry->where('active', 1);
    }

  public function scopeInactive($querry)
  {
    return $querry->where('active', 0);
  }


  public function company(){
    return $this->belongsTo(Company::class);
  }

  public function activeOption(){
    return [
      1 => 'Active',
      0 => 'Inactive',
      2 => 'In-process'
    ];
  }
   
}

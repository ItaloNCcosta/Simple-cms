<?php

namespace App\Model;

abstract class BaseModel
{
  protected $table;
  protected $fillable = [];

  public function __construct()
  {
    $this->setTable();
  }

  abstract protected function setTable();
}

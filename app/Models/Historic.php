<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Historic extends Model
{
  protected $fillable = [
    'type', 'amount', 'amount_before', 'amount_after', 'date', 'time',
  ];

  public function getDateAttribute($value){
    return Carbon::parse($value)->format('d/m/Y');
  }

  public function getTimeAttribute($value){
    return Carbon::parse($value)->format('H:i:s');
  }

  public function type($type = null){
    $types = [
      'I' => 'Depósito',
      'O' => 'Saque',
    ];

    if(!$type)
      return $types;

    return $types[$type];
  }

  public function search($data, $totalPage){
    return $this->where(function($query) use ($data){
      if(isset($data['date']))
        $query->where('date', $data['date']);

      if(isset($data['type']))
        $query->where('type', $data['type']);
    })
      ->orderByRaw('created_at DESC')
      ->paginate($totalPage);
  }
}

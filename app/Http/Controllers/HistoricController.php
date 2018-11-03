<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use Illuminate\Http\Request;

class HistoricController extends Controller
{
    private $totalPage = 10;

    public function historic(Historic $historic){
      //dd(auth()->user()->historics);

      $historics = auth()->user()->historics()->orderByRaw('created_at DESC')->paginate($this->totalPage);

      $types = $historic->type();

      return view('site.historic.historic', compact('historics', 'types'));
    }

    public function search(Historic $historic, Request $request){
      $dataForm = $request->except('_token');

      $historics = $historic->search($dataForm, $this->totalPage);

      $types = $historic->type();

      return view('site.historic.historic', compact('historics', 'types'));
    }
}

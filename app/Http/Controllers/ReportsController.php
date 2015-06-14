<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller {

    public function daily(){
        $daily = Report::all();
        return view('reports.daily', ['dates' => $daily->lists('date'), 'totals' => $daily->lists('amount')]);
	}

}

<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;


	 public function foo(){

    	

//FOR EACH
	 	/*

        $lists = \App\s_list::All();
        foreach($lists as $m_list){

            $m_list['headers'] = $m_list->headers;
            
            $m_list['rows']  = $m_list->rows;
            
            
            foreach ($m_list['rows'] as $row) {
                $row['cells'] = $row->cells;
                $row['actions'] = $row->actions;

                foreach ($row['cells'] as $cell) {
                    $cell['actions'] = $cell->actions;
                }

            }

            $m_list['actions'] = $m_list->actions;
            
        }
        
        $total['status']['code'] = '200';
        $total['status']['message'] = 'operation completed';
        $total['status']['error details']['validation'] = '';
        $total['status']['error details']['other'] = '';
        
        $total['lists'] = $lists;


        $total['summary']['filtered_by'] = 'filter 1, filter 2, filter 3';
        $total['summary']['count']['displayed_rows'] = '39';
        $total['summary']['count']['total_rows'] = '1200';
        $total['summary']['limit'] = '50';
        $total['summary']['pagination'] = '2';


        return json_encode($total);*/
    }


}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;



use App\s_list;

use App\cell;
use App\row;

use App\header;

use App\action;

class listController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('lists.create');

	}


	public function generate_json($id){

		$list = \App\s_list::find($id);
        

            $m_list['headers'] = $list->headers;
            
            $m_list['rows']  = $list->rows;
            
            
            foreach ($m_list['rows'] as $row) {
                $row['cells'] = $row->cells;
                $row['actions'] = $row->actions;

                foreach ($row['cells'] as $cell) {
                    $cell['actions'] = $cell->actions;
                }

            }

            $m_list['actions'] = $list->actions;
            
        return json_encode($m_list);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//


		
	   $list_name = $request->name;
	   
       $list = new s_list;
       
       $list->name = $list_name;
       $list->save();
 	   
       return back()->with('success', 'list has been created');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$lists = s_list::all();
		return view('lists.view', compact('lists'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		// return 'lel';
		//
		$list = s_list::find( $id);
		$rows = $list->rows;
		$headers = $list->headers;

		$actions = action::all();

        return view('lists\edit')->with(compact('list'))->with(compact('rows'))->with( compact('headers'))->with(compact('actions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
		$list = s_list::find($id);

		$list->name = $request->list_name;

		$list->save();

		if($request->newrow != NULL){
			$row = new row;
			$list->rows()->save($row);

			foreach($list->headers as $header){
				$cell = new \App\cell;
				$cell->save();
				$row->cells()->save($cell);
				$header->cells()->save($cell);
	
			}
		}


		if($request->n_head != NULL){
			
			$header = new header;
			$header->name = $request->n_head;
			$header->label = $request->n_head;
			$list->headers()->save($header);


			foreach($list->rows as $row){
				$cell = new \App\cell;
				$cell->save();
				$row->cells()->save($cell);
				$header->cells()->save($cell);
	
			}

		}

		if($request->action != NULL){
			$action = \App\action::find($request->action);
			$list->actions()->save($action);
		}

		return redirect('lists/edit/'.$id)->with('success','list has been updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$list = s_list::find($id);

		//to remove excessive cells in order to prevent cells table from having unused data in the future
		foreach($list->rows as $row){
			$row->delete();
		}

		$list->delete();

		return redirect('lists/view')->with('success','list has been removed');
	}

}

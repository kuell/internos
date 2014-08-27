<?php

class InternoFrequenciaController extends \BaseController {

	protected $frequencias;
	protected $rules = array(
		'interno_id'=>'required',
		'entrada'=>'required',
		'saida'=>'required',
		'data'=>'required'
		);

	public function __construct(InternoFrequencia $frequencia){
		$this->frequencias = $frequencia;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$frequencias = $this->frequencias->all();

		return View::make('interno_frequencias.index', compact('frequencias'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$interno = Interno::find($_GET['interno']);
		$mesano = $_GET['mesano'];
		$data = explode('/', $mesano);

		$frequencia = $this->frequencias
								->whereRaw('extract(month from data) ='.$data[0])
								->whereRaw('extract(year from data) ='.$data[1])
								->where('interno_id', '=', $interno->id)
								->get();
			$valor = array();
		foreach($frequencia as $f){
			$d = explode('/', $f->data);
			$i = (Int) $d[0];
			
			$valor[$i] = array('entrada'=> $f->entrada,
							   'saida'=>$f->saida);


		}

		return View::make('interno_frequencias.create', compact('data'), compact('interno'))->with('valor', $valor);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$valida = Validator::make($input, $this->rules);

		if($valida->passes()){
			$f = $this->frequencias;
				$f->data = $input['data'];
				$f->entrada = $input['entrada'];
				$f->saida = $input['saida'];
				$f->interno_id = $input['interno_id'];

			$i = $f->where('interno_id', '=', $f->interno_id)
					->where('data', '=', $f->data)->count();

			if($i == 0){
				$f->save();
			}
			else{
				DB::table('interno_frequencias')
					->where('interno_id', $f->interno_id)
					->where('data', $f->data)->update(array('entrada'=>$f->entrada, 
																 'saida'=>$f->saida));
			}
		}else{
			print_r($valida->errors());
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	}


}

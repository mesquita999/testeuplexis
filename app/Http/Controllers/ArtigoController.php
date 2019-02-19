<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Artigo;

class ArtigoController extends Controller
{
	private $artigo;

    public function __construct(Artigo $artigo)
    {
        $this->artigo  = $artigo;     
    }

   
    public function index()
	{
	    $artigo = $this->artigo->all();
      	return view('artigo')->with('artigos', $artigo);
	}

	public function destroy($id_artigo){

	    $artigo = $this->artigo::find($id_artigo);

	    $artigo->delete();

	    return redirect()->route('artigo');

	}

    public function saveArtigo()
    {
    	try
    	{
	        //print_r($request);
	        $request = request()->all();

	        if(isset($request["arr_post"]))
	        {
		        $str_nomes = "";

		        foreach($request["arr_post"] as $item)
		        {
		        	 $objArtigo = new \App\Artigo();
			        	$objArtigo->id_usuario = Auth::user()->id;
			        	$objArtigo->titulo = $item["titulo"];
			        	$objArtigo->link = $item["link"];
			        	$objArtigo->save();
			        $objArtigo = null;

			        $str_nomes .= "<br />" .$item["titulo"];
		        }       

		        return response()->json(['success'=>'<strong>Deu tudo certo, artigos capturados:</strong><br /><small>' . $str_nomes . '</small>']);
		    }
		    else
		    	return response()->json(['error'=> utf8_encode('É necessário artigos para salvar.')]);
	    }
	    catch(Exception $ex)
	    {
	    	return response()->json(['error'=> $ex->getMessage()]);
	    }
    }
}

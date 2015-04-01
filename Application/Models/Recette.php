<?php

namespace Application\Models;



class Recette extends \Library\Model\Model{

	

	

	public function __construct($connexionName){
		parent::__construct($connexionName);
	}


	public function getRecettes(){
		
		return $this->convEnTab(json_decode(file_get_contents(WEBSERVICE_ROOT.'/index.php?service=recette&method=getrecettes')) );
	}

	/**
	 * @param  [String] $recette     [description]
	 * @param  [int] $idUser      [description]
	 * @param  [int] $idCategorie [description]
	 * @return [boolean]              [description]
	 */
	public function insertRecette($params, $idUser){


		$params["id_user"] = $idUser;
		$params["service"] = "Recette";
		$params["method"]  = "insertRecette";

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => http_build_query($params)
		        )
		);

		$context  = stream_context_create($opts);
		
		return $this->convEnTab(file_get_contents(WEBSERVICE_ROOT.'/index.php', false, $context) );
		
	}



	/**
	 * @param  [String] $recette     [description]
	 * @param  [int] $idUser      [description]
	 * @param  [int] $idCategorie [description]
	 * @return [boolean]              [description]
	 */
	public function updateRecette($params, $idRecette){
		

		$params["id_recette"] = $idRecette;
		$params["service"] = "Recette";
		$params["method"]  = "updateRecette";
//var_dump("dan model",$params);

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => http_build_query($params)
		        )
		);

		$context  = stream_context_create($opts);
		
		return $this->convEnTab(json_decode(file_get_contents(WEBSERVICE_ROOT.'/index.php', false, $context) ) );
		
	}



	/**
	 * @param  [String] $recette     [description]
	 * @param  [int] $idUser      [description]
	 * @param  [int] $idCategorie [description]
	 * @return [boolean]              [description]
	 */
	public function deleteRecette($idRecette){
		

		$params["id_recette"] = $idRecette;
		$params["service"] = "Recette";
		$params["method"]  = "deleteRecette";


		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => http_build_query($params)
		        )
		);

		$context  = stream_context_create($opts);
		
		return $this->convEnTab(json_decode(file_get_contents(WEBSERVICE_ROOT.'/index.php', false, $context) ) );
		
	}




}
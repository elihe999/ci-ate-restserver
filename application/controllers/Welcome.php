<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/RestController.php';
require APPPATH.'/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Welcome extends RestController {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
	}


	/**
	 * @OA\Info(title="mysq", version="0.1")
	 * 
	 */

	
	/**
      * @OA\Get(
	  *	  path="/api/resource.json",
	  *	  @OA\Response(response="200", description="1")
	  * )
      * 
      */
	public function setting_get()
	{
		
	}
}

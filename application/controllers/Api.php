<?php
defined('BASEPATH') OR exit('No direct script acc allowed');

require APPPATH.'/libraries/RestController.php';
require APPPATH.'/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function users_get()
    {
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com']
        ];

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            if ( $users )
            {
                $this->response( $users, 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No user were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $users ) )
            {
                $this->response( $users[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }
}

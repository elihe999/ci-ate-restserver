<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

	/**
     * Install Page for this controller.
     *
     * @function
     * 1) setup up database
     * 2) ?remind sudoer
	 *
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
    {
        $this->load->helper( 'directory' );
        $map = directory_map('./', 1);
        $data['test'] = '';
        forEach( $map as $filename ) {
            if ( $filename === 'setupconfig.lock' ) {
                $data['test'] = '11';
            }
        }
		$this->load->view('install/setup.php', $data);
	}
}

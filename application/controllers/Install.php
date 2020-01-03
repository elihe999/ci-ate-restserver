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
                $data['test'] = 'Already setup. To reset the setting, delete setuoconfig.lock';
            }
        }
		$this->load->view('install/setup.php', $data);
	}

    public function setup()
    {
        $this->load->helper( 'directory' );
        $map = directory_map('./public', 1);
        $file_lock = true;
        forEach( $map as $filename ) {
            if ( $filename === 'setupconfig.lock' ) {
                $file_lock = false;
            }
        }

        if ( $file_lock ) {
            $config = '<?php';
            $config .= "\n";
            $config .= '$host="' . $_POST["host"] . '";';
            $config .= "\n";
            $config .= '$user="' . $_POST["username"] . '";';
            $config .= "\n";
            $config .= '$pass="' . $_POST["password"] . '";';
            $config .= "\n";
            $config .= '$dbname="' . $_POST["dbname"] . '";';
            $config .= "\n";
            $config .= "?>";
            var_dump($config);

            $filename = "public/dbconfig.php";
            $handle = fopen($filename, "w+");
            if ($handle) {
                fwrite($handle, $config);
                fclose($handle);
            }
            touch("public/setupconfig.lock");
            // $sql[] = "CREATE TABLE case_history_tb IF NOT EXISTS `";
        } else {
            echo 'System already install. Try to delete setupconfig.lock on public/';
        }
    
    }
}

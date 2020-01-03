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
            $host = $_POST["host"];
            $user = $_POST["username"];
            $pass = $_POST["password"];
            $dbname = $_POST["dbname"];
            $config = '<?php';
            $config .= "\n";
            $config .= '$host="' . $host . '";';
            $config .= "\n";
            $config .= '$user="' . $user . '";';
            $config .= "\n";
            $config .= '$pass="' . $pass . '";';
            $config .= "\n";
            $config .= '$dbname="' . $dbname . '";';
            $config .= "\n";
            $config .= "?>";
            var_dump($config);

            $filename = "public/dbconfig.php";
            $handle = fopen($filename, "w+");
            if ($handle) {
                fwrite($handle, $config);
                fclose($handle);
            } else {
                die("Check the file public/dbconfig.php. Make sure it is writeable");
            }
            touch("public/setupconfig.lock");
            if (!@$link=mysqli_connect($host, $user, $pass)) {
                echo "Database connect fail, try to setup database by yourself.";
            } else {
                mysqli_query($link, "CREATE database IF NOT EXISTS `$dbname`");
                mysqli_select_db($link, $dbname);
                // user
                $sql[] = "CREATE TABLE IF NOT EXISTS `user_tb` (
                    `username` VARCHAR(100) NOT NULL,
                    `password` VARCHAR(30) NOT NULL,
                    UNIQUE (username)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                // suite                
                $sql[] = "CREATE TABLE IF NOT EXISTS `suite_history_tb` (
                    `path` VARCHAR(300) NOT NULL,
                    `passnum` BIGINT UNSIGNED,
                    `failnum` BIGINT UNSIGNED,
                    `warnnum` BIGINT UNSIGNED,
                    `totalnum` BIGINT UNSIGNED,
                    `time` VARCHAR(80) NOT NULL,
                    `username` VARCHAR(100) NOT NULL
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                // case
                $sql[] = "CREATE TABLE IF NOT EXISTS `case_history_tb` (
                    `name` VARCHAR(300) NOT NULL,
                    `numc` BIGINT UNSIGNED,
                    `loopc` BIGINT UNSIGNED,
                    `result` VARCHAR(25) NOT NULL,
                    `path` VARCHAR(200) NOT NULL,
                    `time` VARCHAR(80) NOT NULL,
                    `date` VARCHAR(80),
                    `fail_res` VARCHAR(300) NOT NULL,
                    `fail_act` VARCHAR(300),
                    `username` VARCHAR(100) NOT NULL
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                // assign
                $sql[] = "CREATE TABLE IF NOT EXISTS `assign_record_tb` (
                    `path` VARCHAR(200) NOT NULL primary key,
                    `date` TIMESTAMP,
                    `process` JSON NOT NULL,
                    `log` JSON NOT NULL,
                    `assign` VARCHAR(100) NOT NULL,
                    `status` VARCHAR(30)
                    )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
                foreach ($sql as $value) {
                    mysqli_query($link, $value);
                    echo ".";
                }
            }
        } else {
            echo 'System already install. Try to delete setupconfig.lock on public/';
        }
    
    }
}

<?php

if ( ! defined('BASEPATH') )
{
    defined('BASEPATH') OR exit('No direct script access allowed');
}

/*
| -------------------------------------------------------------------------
| log settings
| -------------------------------------------------------------------------
| For each test function
|
*/

$config['case_setting'] = array(
    'main' => 'ate_setting',
    'sipp' => 'settings',
    'global' => 'globalSettings',
    'webSocket'=> 'webSocket',
    'case_class' => 'case_list.txt',
    'description' => '#desc',
    'checklist' => 'Expectations',
    'manualresult' => 'ManualList',
    'siplog' => 'sipReport',
    'main' => 'main',
    'macpcap' => 'macFilter.pcap',
    'result' => 'Result'
);

$config['base_setting'] = array(
    'db_device' => 'device_tb',
    'db_user' => 'user_tb',
    'db_suite_history' => 'suite_history_tb',
    'db_case_history' => 'case_history_tb',
    'db_assign' => 'assign_record_tb',
    'cache' => 'cache',
    'suite_path' => 'suitePath',
    'neo_user' => 'user',
    'sipp_folder' => 'sipp_test',
    'public' => 'public',
    'history' => 'History'
);

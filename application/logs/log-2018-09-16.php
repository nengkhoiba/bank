<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2018-09-16 09:24:55 --> Config Class Initialized
INFO - 2018-09-16 09:24:55 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:24:55 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:24:55 --> Utf8 Class Initialized
INFO - 2018-09-16 09:24:55 --> URI Class Initialized
INFO - 2018-09-16 09:24:55 --> Router Class Initialized
INFO - 2018-09-16 09:24:56 --> Output Class Initialized
INFO - 2018-09-16 09:24:56 --> Security Class Initialized
DEBUG - 2018-09-16 09:24:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:24:56 --> Input Class Initialized
INFO - 2018-09-16 09:24:56 --> Language Class Initialized
INFO - 2018-09-16 09:24:57 --> Loader Class Initialized
INFO - 2018-09-16 09:24:58 --> Helper loaded: url_helper
INFO - 2018-09-16 09:24:58 --> Helper loaded: text_helper
INFO - 2018-09-16 09:24:58 --> Helper loaded: form_helper
INFO - 2018-09-16 09:24:59 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:25:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:25:01 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:25:01 --> Form Validation Class Initialized
INFO - 2018-09-16 09:25:01 --> Controller Class Initialized
INFO - 2018-09-16 09:25:01 --> Model "Login_model" initialized
INFO - 2018-09-16 09:25:02 --> Helper loaded: security_helper
DEBUG - 2018-09-16 09:25:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:25:02 --> File loaded: F:\wamp\www\bank\application\views\admin/login.php
INFO - 2018-09-16 09:25:02 --> Final output sent to browser
DEBUG - 2018-09-16 09:25:02 --> Total execution time: 7.3142
INFO - 2018-09-16 09:25:31 --> Config Class Initialized
INFO - 2018-09-16 09:25:31 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:25:31 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:25:31 --> Utf8 Class Initialized
INFO - 2018-09-16 09:25:31 --> URI Class Initialized
INFO - 2018-09-16 09:25:31 --> Router Class Initialized
INFO - 2018-09-16 09:25:31 --> Output Class Initialized
INFO - 2018-09-16 09:25:31 --> Security Class Initialized
DEBUG - 2018-09-16 09:25:31 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:25:31 --> Input Class Initialized
INFO - 2018-09-16 09:25:31 --> Language Class Initialized
INFO - 2018-09-16 09:25:31 --> Loader Class Initialized
INFO - 2018-09-16 09:25:31 --> Helper loaded: url_helper
INFO - 2018-09-16 09:25:31 --> Helper loaded: text_helper
INFO - 2018-09-16 09:25:31 --> Helper loaded: form_helper
INFO - 2018-09-16 09:25:32 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:25:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:25:32 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:25:32 --> Form Validation Class Initialized
INFO - 2018-09-16 09:25:32 --> Controller Class Initialized
INFO - 2018-09-16 09:25:32 --> Model "Login_model" initialized
INFO - 2018-09-16 09:25:32 --> Helper loaded: security_helper
DEBUG - 2018-09-16 09:25:32 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:25:33 --> Language file loaded: language/english/form_validation_lang.php
ERROR - 2018-09-16 09:25:33 --> Query error: Unknown column 'role.role' in 'field list' - Invalid query: SELECT 
		emp.ID AS EmpID,
		role.role AS Role,
		role.ID AS RoleID,
		empLogin.password AS Password,
		emp.name AS EmpName,
		emp.Branch_id AS Branch_id,
		(select ID FROM financial_year WHERE YEAR(Start_date)-1 < YEAR(NOW()) AND YEAR(End_date)+1 > YEAR(NOW()) LIMIT 1) AS Financial_id
		FROM emp_login empLogin
		LEFT JOIN role role ON role.ID=empLogin.role_id
		LEFT JOIN emp emp ON emp.ID=empLogin.ID
		WHERE empLogin.username='admin@bank.com' 
		AND empLogin.password='1'
		AND empLogin.isActive=1;
INFO - 2018-09-16 09:25:33 --> Language file loaded: language/english/db_lang.php
INFO - 2018-09-16 09:26:53 --> Config Class Initialized
INFO - 2018-09-16 09:26:53 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:26:53 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:26:53 --> Utf8 Class Initialized
INFO - 2018-09-16 09:26:53 --> URI Class Initialized
INFO - 2018-09-16 09:26:53 --> Router Class Initialized
INFO - 2018-09-16 09:26:53 --> Output Class Initialized
INFO - 2018-09-16 09:26:53 --> Security Class Initialized
DEBUG - 2018-09-16 09:26:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:26:53 --> Input Class Initialized
INFO - 2018-09-16 09:26:53 --> Language Class Initialized
INFO - 2018-09-16 09:26:53 --> Loader Class Initialized
INFO - 2018-09-16 09:26:53 --> Helper loaded: url_helper
INFO - 2018-09-16 09:26:53 --> Helper loaded: text_helper
INFO - 2018-09-16 09:26:53 --> Helper loaded: form_helper
INFO - 2018-09-16 09:26:53 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:26:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:26:54 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:26:54 --> Form Validation Class Initialized
INFO - 2018-09-16 09:26:54 --> Controller Class Initialized
INFO - 2018-09-16 09:26:54 --> Model "Login_model" initialized
INFO - 2018-09-16 09:26:54 --> Helper loaded: security_helper
DEBUG - 2018-09-16 09:26:54 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:26:54 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2018-09-16 09:26:55 --> Config Class Initialized
INFO - 2018-09-16 09:26:55 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:26:55 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:26:55 --> Utf8 Class Initialized
INFO - 2018-09-16 09:26:55 --> URI Class Initialized
INFO - 2018-09-16 09:26:55 --> Router Class Initialized
INFO - 2018-09-16 09:26:55 --> Output Class Initialized
INFO - 2018-09-16 09:26:55 --> Security Class Initialized
DEBUG - 2018-09-16 09:26:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:26:55 --> Input Class Initialized
INFO - 2018-09-16 09:26:55 --> Language Class Initialized
INFO - 2018-09-16 09:26:55 --> Loader Class Initialized
INFO - 2018-09-16 09:26:55 --> Helper loaded: url_helper
INFO - 2018-09-16 09:26:55 --> Helper loaded: text_helper
INFO - 2018-09-16 09:26:55 --> Helper loaded: form_helper
INFO - 2018-09-16 09:26:55 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:26:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:26:56 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:26:56 --> Form Validation Class Initialized
INFO - 2018-09-16 09:26:56 --> Controller Class Initialized
INFO - 2018-09-16 09:26:56 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:26:56 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:26:56 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:26:56 --> File loaded: F:\wamp\www\bank\application\views\admin/dashboard.php
INFO - 2018-09-16 09:26:56 --> Final output sent to browser
DEBUG - 2018-09-16 09:26:56 --> Total execution time: 1.5090
INFO - 2018-09-16 09:27:23 --> Config Class Initialized
INFO - 2018-09-16 09:27:23 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:23 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:23 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:23 --> URI Class Initialized
INFO - 2018-09-16 09:27:23 --> Router Class Initialized
INFO - 2018-09-16 09:27:23 --> Output Class Initialized
INFO - 2018-09-16 09:27:23 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:23 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:23 --> Input Class Initialized
INFO - 2018-09-16 09:27:23 --> Language Class Initialized
INFO - 2018-09-16 09:27:23 --> Loader Class Initialized
INFO - 2018-09-16 09:27:23 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:23 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:23 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:23 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:24 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:24 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:24 --> Controller Class Initialized
INFO - 2018-09-16 09:27:24 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:27:24 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:27:24 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:27:24 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:27:24 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:24 --> Total execution time: 1.3680
INFO - 2018-09-16 09:27:24 --> Config Class Initialized
INFO - 2018-09-16 09:27:24 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:24 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:24 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:24 --> URI Class Initialized
INFO - 2018-09-16 09:27:24 --> Router Class Initialized
INFO - 2018-09-16 09:27:24 --> Output Class Initialized
INFO - 2018-09-16 09:27:25 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:25 --> Input Class Initialized
INFO - 2018-09-16 09:27:25 --> Language Class Initialized
INFO - 2018-09-16 09:27:25 --> Loader Class Initialized
INFO - 2018-09-16 09:27:25 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:25 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:25 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:25 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:26 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:26 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:26 --> Controller Class Initialized
INFO - 2018-09-16 09:27:26 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:27:26 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:27:26 --> Helper loaded: security_helper
INFO - 2018-09-16 09:27:26 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:27:26 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:26 --> Total execution time: 1.6564
INFO - 2018-09-16 09:27:28 --> Config Class Initialized
INFO - 2018-09-16 09:27:28 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:28 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:28 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:28 --> URI Class Initialized
INFO - 2018-09-16 09:27:28 --> Router Class Initialized
INFO - 2018-09-16 09:27:28 --> Output Class Initialized
INFO - 2018-09-16 09:27:28 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:28 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:28 --> Input Class Initialized
INFO - 2018-09-16 09:27:28 --> Language Class Initialized
INFO - 2018-09-16 09:27:28 --> Loader Class Initialized
INFO - 2018-09-16 09:27:28 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:28 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:28 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:28 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:29 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:29 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:29 --> Controller Class Initialized
INFO - 2018-09-16 09:27:29 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:27:29 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:27:29 --> Helper loaded: security_helper
INFO - 2018-09-16 09:27:29 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:29 --> Total execution time: 1.5646
INFO - 2018-09-16 09:27:33 --> Config Class Initialized
INFO - 2018-09-16 09:27:33 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:33 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:33 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:33 --> URI Class Initialized
INFO - 2018-09-16 09:27:33 --> Router Class Initialized
INFO - 2018-09-16 09:27:33 --> Output Class Initialized
INFO - 2018-09-16 09:27:33 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:33 --> Input Class Initialized
INFO - 2018-09-16 09:27:33 --> Language Class Initialized
INFO - 2018-09-16 09:27:34 --> Loader Class Initialized
INFO - 2018-09-16 09:27:34 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:34 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:34 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:34 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:35 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:35 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:35 --> Controller Class Initialized
INFO - 2018-09-16 09:27:35 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:27:35 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:27:35 --> Helper loaded: security_helper
INFO - 2018-09-16 09:27:35 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:35 --> Total execution time: 1.6629
INFO - 2018-09-16 09:27:42 --> Config Class Initialized
INFO - 2018-09-16 09:27:42 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:42 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:42 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:42 --> URI Class Initialized
INFO - 2018-09-16 09:27:42 --> Router Class Initialized
INFO - 2018-09-16 09:27:42 --> Output Class Initialized
INFO - 2018-09-16 09:27:42 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:42 --> Input Class Initialized
INFO - 2018-09-16 09:27:42 --> Language Class Initialized
INFO - 2018-09-16 09:27:42 --> Loader Class Initialized
INFO - 2018-09-16 09:27:42 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:42 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:42 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:42 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:43 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:43 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:43 --> Controller Class Initialized
INFO - 2018-09-16 09:27:43 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:27:43 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:27:43 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:27:43 --> File loaded: F:\wamp\www\bank\application\views\admin/branchmaster.php
INFO - 2018-09-16 09:27:43 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:43 --> Total execution time: 1.5499
INFO - 2018-09-16 09:27:44 --> Config Class Initialized
INFO - 2018-09-16 09:27:44 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:44 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:44 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:44 --> URI Class Initialized
INFO - 2018-09-16 09:27:44 --> Router Class Initialized
INFO - 2018-09-16 09:27:44 --> Output Class Initialized
INFO - 2018-09-16 09:27:44 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:44 --> Input Class Initialized
INFO - 2018-09-16 09:27:44 --> Language Class Initialized
INFO - 2018-09-16 09:27:44 --> Loader Class Initialized
INFO - 2018-09-16 09:27:44 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:44 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:44 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:44 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:45 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:45 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:45 --> Controller Class Initialized
INFO - 2018-09-16 09:27:45 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:27:45 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:27:45 --> Helper loaded: security_helper
INFO - 2018-09-16 09:27:46 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/Branch_table.php
INFO - 2018-09-16 09:27:46 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:46 --> Total execution time: 1.7591
INFO - 2018-09-16 09:27:52 --> Config Class Initialized
INFO - 2018-09-16 09:27:52 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:52 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:52 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:52 --> URI Class Initialized
INFO - 2018-09-16 09:27:52 --> Router Class Initialized
INFO - 2018-09-16 09:27:52 --> Output Class Initialized
INFO - 2018-09-16 09:27:52 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:52 --> Input Class Initialized
INFO - 2018-09-16 09:27:52 --> Language Class Initialized
INFO - 2018-09-16 09:27:52 --> Loader Class Initialized
INFO - 2018-09-16 09:27:52 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:52 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:52 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:52 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:53 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:53 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:53 --> Controller Class Initialized
INFO - 2018-09-16 09:27:53 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:27:53 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:27:53 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:27:53 --> File loaded: F:\wamp\www\bank\application\views\admin/role_page_master.php
INFO - 2018-09-16 09:27:53 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:53 --> Total execution time: 1.4591
INFO - 2018-09-16 09:27:54 --> Config Class Initialized
INFO - 2018-09-16 09:27:54 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:27:54 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:27:54 --> Utf8 Class Initialized
INFO - 2018-09-16 09:27:54 --> URI Class Initialized
INFO - 2018-09-16 09:27:54 --> Router Class Initialized
INFO - 2018-09-16 09:27:54 --> Output Class Initialized
INFO - 2018-09-16 09:27:54 --> Security Class Initialized
DEBUG - 2018-09-16 09:27:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:27:54 --> Input Class Initialized
INFO - 2018-09-16 09:27:54 --> Language Class Initialized
INFO - 2018-09-16 09:27:54 --> Loader Class Initialized
INFO - 2018-09-16 09:27:54 --> Helper loaded: url_helper
INFO - 2018-09-16 09:27:54 --> Helper loaded: text_helper
INFO - 2018-09-16 09:27:54 --> Helper loaded: form_helper
INFO - 2018-09-16 09:27:54 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:27:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:27:55 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:27:55 --> Form Validation Class Initialized
INFO - 2018-09-16 09:27:55 --> Controller Class Initialized
INFO - 2018-09-16 09:27:55 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:27:55 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:27:55 --> Helper loaded: security_helper
INFO - 2018-09-16 09:27:56 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dropDown/Select_optionList.php
INFO - 2018-09-16 09:27:56 --> Final output sent to browser
DEBUG - 2018-09-16 09:27:56 --> Total execution time: 1.7680
INFO - 2018-09-16 09:28:16 --> Config Class Initialized
INFO - 2018-09-16 09:28:16 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:28:16 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:28:16 --> Utf8 Class Initialized
INFO - 2018-09-16 09:28:16 --> URI Class Initialized
INFO - 2018-09-16 09:28:16 --> Router Class Initialized
INFO - 2018-09-16 09:28:16 --> Output Class Initialized
INFO - 2018-09-16 09:28:16 --> Security Class Initialized
DEBUG - 2018-09-16 09:28:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:28:16 --> Input Class Initialized
INFO - 2018-09-16 09:28:16 --> Language Class Initialized
INFO - 2018-09-16 09:28:16 --> Loader Class Initialized
INFO - 2018-09-16 09:28:16 --> Helper loaded: url_helper
INFO - 2018-09-16 09:28:16 --> Helper loaded: text_helper
INFO - 2018-09-16 09:28:16 --> Helper loaded: form_helper
INFO - 2018-09-16 09:28:16 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:28:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:28:17 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:28:17 --> Form Validation Class Initialized
INFO - 2018-09-16 09:28:17 --> Controller Class Initialized
INFO - 2018-09-16 09:28:18 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:28:18 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:28:18 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:28:18 --> File loaded: F:\wamp\www\bank\application\views\admin/account/accountledger.php
INFO - 2018-09-16 09:28:18 --> Final output sent to browser
DEBUG - 2018-09-16 09:28:18 --> Total execution time: 1.7213
INFO - 2018-09-16 09:28:18 --> Config Class Initialized
INFO - 2018-09-16 09:28:18 --> Config Class Initialized
INFO - 2018-09-16 09:28:18 --> Hooks Class Initialized
INFO - 2018-09-16 09:28:18 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:28:18 --> UTF-8 Support Enabled
DEBUG - 2018-09-16 09:28:18 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:28:18 --> Utf8 Class Initialized
INFO - 2018-09-16 09:28:18 --> Utf8 Class Initialized
INFO - 2018-09-16 09:28:18 --> URI Class Initialized
INFO - 2018-09-16 09:28:18 --> URI Class Initialized
INFO - 2018-09-16 09:28:18 --> Router Class Initialized
INFO - 2018-09-16 09:28:18 --> Router Class Initialized
INFO - 2018-09-16 09:28:18 --> Output Class Initialized
INFO - 2018-09-16 09:28:18 --> Output Class Initialized
INFO - 2018-09-16 09:28:18 --> Security Class Initialized
INFO - 2018-09-16 09:28:18 --> Security Class Initialized
DEBUG - 2018-09-16 09:28:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-09-16 09:28:18 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:28:18 --> Input Class Initialized
INFO - 2018-09-16 09:28:18 --> Input Class Initialized
INFO - 2018-09-16 09:28:18 --> Language Class Initialized
INFO - 2018-09-16 09:28:18 --> Language Class Initialized
INFO - 2018-09-16 09:28:19 --> Loader Class Initialized
INFO - 2018-09-16 09:28:19 --> Loader Class Initialized
INFO - 2018-09-16 09:28:19 --> Helper loaded: url_helper
INFO - 2018-09-16 09:28:19 --> Helper loaded: url_helper
INFO - 2018-09-16 09:28:19 --> Helper loaded: text_helper
INFO - 2018-09-16 09:28:19 --> Helper loaded: text_helper
INFO - 2018-09-16 09:28:19 --> Helper loaded: form_helper
INFO - 2018-09-16 09:28:19 --> Helper loaded: form_helper
INFO - 2018-09-16 09:28:19 --> Database Driver Class Initialized
INFO - 2018-09-16 09:28:19 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:28:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-09-16 09:28:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:28:20 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:28:20 --> Form Validation Class Initialized
INFO - 2018-09-16 09:28:20 --> Controller Class Initialized
INFO - 2018-09-16 09:28:20 --> Helper loaded: date_helper
INFO - 2018-09-16 09:28:20 --> Model "Account_model" initialized
DEBUG - 2018-09-16 09:28:20 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:28:20 --> Helper loaded: security_helper
INFO - 2018-09-16 09:28:20 --> File loaded: F:\wamp\www\bank\application\views\datafragment/account/dropDown/Select_GrpUnder.php
INFO - 2018-09-16 09:28:20 --> Final output sent to browser
DEBUG - 2018-09-16 09:28:20 --> Total execution time: 1.9098
INFO - 2018-09-16 09:28:20 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:28:20 --> Form Validation Class Initialized
INFO - 2018-09-16 09:28:20 --> Controller Class Initialized
INFO - 2018-09-16 09:28:20 --> Helper loaded: date_helper
INFO - 2018-09-16 09:28:20 --> Model "Account_model" initialized
DEBUG - 2018-09-16 09:28:20 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:28:20 --> Helper loaded: security_helper
INFO - 2018-09-16 09:28:20 --> File loaded: F:\wamp\www\bank\application\views\datafragment/account/dataTable/AccountLedger_table.php
INFO - 2018-09-16 09:28:21 --> Final output sent to browser
DEBUG - 2018-09-16 09:28:21 --> Total execution time: 2.3856
INFO - 2018-09-16 09:28:47 --> Config Class Initialized
INFO - 2018-09-16 09:28:47 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:28:47 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:28:47 --> Utf8 Class Initialized
INFO - 2018-09-16 09:28:47 --> URI Class Initialized
INFO - 2018-09-16 09:28:47 --> Router Class Initialized
INFO - 2018-09-16 09:28:47 --> Output Class Initialized
INFO - 2018-09-16 09:28:47 --> Security Class Initialized
DEBUG - 2018-09-16 09:28:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:28:47 --> Input Class Initialized
INFO - 2018-09-16 09:28:47 --> Language Class Initialized
INFO - 2018-09-16 09:28:47 --> Loader Class Initialized
INFO - 2018-09-16 09:28:47 --> Helper loaded: url_helper
INFO - 2018-09-16 09:28:47 --> Helper loaded: text_helper
INFO - 2018-09-16 09:28:47 --> Helper loaded: form_helper
INFO - 2018-09-16 09:28:47 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:28:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:28:48 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:28:48 --> Form Validation Class Initialized
INFO - 2018-09-16 09:28:48 --> Controller Class Initialized
INFO - 2018-09-16 09:28:48 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:28:48 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:28:48 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:28:48 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:28:48 --> Final output sent to browser
DEBUG - 2018-09-16 09:28:48 --> Total execution time: 1.4492
INFO - 2018-09-16 09:28:48 --> Config Class Initialized
INFO - 2018-09-16 09:28:48 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:28:49 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:28:49 --> Utf8 Class Initialized
INFO - 2018-09-16 09:28:49 --> URI Class Initialized
INFO - 2018-09-16 09:28:49 --> Router Class Initialized
INFO - 2018-09-16 09:28:49 --> Output Class Initialized
INFO - 2018-09-16 09:28:49 --> Security Class Initialized
DEBUG - 2018-09-16 09:28:49 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:28:49 --> Input Class Initialized
INFO - 2018-09-16 09:28:49 --> Language Class Initialized
INFO - 2018-09-16 09:28:49 --> Loader Class Initialized
INFO - 2018-09-16 09:28:49 --> Helper loaded: url_helper
INFO - 2018-09-16 09:28:49 --> Helper loaded: text_helper
INFO - 2018-09-16 09:28:49 --> Helper loaded: form_helper
INFO - 2018-09-16 09:28:49 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:28:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:28:50 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:28:50 --> Form Validation Class Initialized
INFO - 2018-09-16 09:28:50 --> Controller Class Initialized
INFO - 2018-09-16 09:28:50 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:28:50 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:28:50 --> Helper loaded: security_helper
INFO - 2018-09-16 09:28:50 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:28:50 --> Final output sent to browser
DEBUG - 2018-09-16 09:28:50 --> Total execution time: 1.7288
INFO - 2018-09-16 09:28:57 --> Config Class Initialized
INFO - 2018-09-16 09:28:57 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:28:57 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:28:57 --> Utf8 Class Initialized
INFO - 2018-09-16 09:28:57 --> URI Class Initialized
INFO - 2018-09-16 09:28:57 --> Router Class Initialized
INFO - 2018-09-16 09:28:57 --> Output Class Initialized
INFO - 2018-09-16 09:28:57 --> Security Class Initialized
DEBUG - 2018-09-16 09:28:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:28:57 --> Input Class Initialized
INFO - 2018-09-16 09:28:57 --> Language Class Initialized
INFO - 2018-09-16 09:28:57 --> Loader Class Initialized
INFO - 2018-09-16 09:28:57 --> Helper loaded: url_helper
INFO - 2018-09-16 09:28:57 --> Helper loaded: text_helper
INFO - 2018-09-16 09:28:57 --> Helper loaded: form_helper
INFO - 2018-09-16 09:28:57 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:28:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:28:58 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:28:58 --> Form Validation Class Initialized
INFO - 2018-09-16 09:28:58 --> Controller Class Initialized
INFO - 2018-09-16 09:28:58 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:28:58 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:28:58 --> Helper loaded: security_helper
INFO - 2018-09-16 09:28:58 --> Final output sent to browser
DEBUG - 2018-09-16 09:28:58 --> Total execution time: 1.6218
INFO - 2018-09-16 09:29:06 --> Config Class Initialized
INFO - 2018-09-16 09:29:06 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:29:06 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:29:06 --> Utf8 Class Initialized
INFO - 2018-09-16 09:29:06 --> URI Class Initialized
INFO - 2018-09-16 09:29:06 --> Router Class Initialized
INFO - 2018-09-16 09:29:07 --> Output Class Initialized
INFO - 2018-09-16 09:29:07 --> Security Class Initialized
DEBUG - 2018-09-16 09:29:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:29:07 --> Input Class Initialized
INFO - 2018-09-16 09:29:07 --> Language Class Initialized
INFO - 2018-09-16 09:29:07 --> Loader Class Initialized
INFO - 2018-09-16 09:29:07 --> Helper loaded: url_helper
INFO - 2018-09-16 09:29:07 --> Helper loaded: text_helper
INFO - 2018-09-16 09:29:07 --> Helper loaded: form_helper
INFO - 2018-09-16 09:29:07 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:29:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:29:08 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:29:08 --> Form Validation Class Initialized
INFO - 2018-09-16 09:29:08 --> Controller Class Initialized
INFO - 2018-09-16 09:29:08 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:29:08 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:29:08 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:29:08 --> File loaded: F:\wamp\www\bank\application\views\admin/manageshg.php
INFO - 2018-09-16 09:29:08 --> Final output sent to browser
DEBUG - 2018-09-16 09:29:08 --> Total execution time: 1.6756
INFO - 2018-09-16 09:29:08 --> Config Class Initialized
INFO - 2018-09-16 09:29:08 --> Config Class Initialized
INFO - 2018-09-16 09:29:08 --> Hooks Class Initialized
INFO - 2018-09-16 09:29:08 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:29:08 --> UTF-8 Support Enabled
DEBUG - 2018-09-16 09:29:08 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:29:08 --> Utf8 Class Initialized
INFO - 2018-09-16 09:29:08 --> Utf8 Class Initialized
INFO - 2018-09-16 09:29:08 --> URI Class Initialized
INFO - 2018-09-16 09:29:08 --> URI Class Initialized
INFO - 2018-09-16 09:29:09 --> Router Class Initialized
INFO - 2018-09-16 09:29:09 --> Router Class Initialized
INFO - 2018-09-16 09:29:09 --> Output Class Initialized
INFO - 2018-09-16 09:29:09 --> Output Class Initialized
INFO - 2018-09-16 09:29:09 --> Security Class Initialized
INFO - 2018-09-16 09:29:09 --> Security Class Initialized
DEBUG - 2018-09-16 09:29:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-09-16 09:29:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:29:09 --> Input Class Initialized
INFO - 2018-09-16 09:29:09 --> Input Class Initialized
INFO - 2018-09-16 09:29:09 --> Language Class Initialized
INFO - 2018-09-16 09:29:09 --> Language Class Initialized
INFO - 2018-09-16 09:29:09 --> Loader Class Initialized
INFO - 2018-09-16 09:29:09 --> Loader Class Initialized
INFO - 2018-09-16 09:29:09 --> Helper loaded: url_helper
INFO - 2018-09-16 09:29:09 --> Helper loaded: url_helper
INFO - 2018-09-16 09:29:09 --> Helper loaded: text_helper
INFO - 2018-09-16 09:29:09 --> Helper loaded: text_helper
INFO - 2018-09-16 09:29:09 --> Helper loaded: form_helper
INFO - 2018-09-16 09:29:09 --> Helper loaded: form_helper
INFO - 2018-09-16 09:29:09 --> Database Driver Class Initialized
INFO - 2018-09-16 09:29:09 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:29:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-09-16 09:29:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:29:10 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:29:10 --> Form Validation Class Initialized
INFO - 2018-09-16 09:29:10 --> Controller Class Initialized
INFO - 2018-09-16 09:29:10 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:29:10 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:29:10 --> Helper loaded: security_helper
INFO - 2018-09-16 09:29:10 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/Memlist_group_table.php
INFO - 2018-09-16 09:29:10 --> Final output sent to browser
DEBUG - 2018-09-16 09:29:10 --> Total execution time: 1.7635
INFO - 2018-09-16 09:29:10 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:29:10 --> Form Validation Class Initialized
INFO - 2018-09-16 09:29:10 --> Controller Class Initialized
INFO - 2018-09-16 09:29:10 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:29:10 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:29:10 --> Helper loaded: security_helper
INFO - 2018-09-16 09:29:11 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/Mem_shg_group_select_table.php
INFO - 2018-09-16 09:29:11 --> Final output sent to browser
DEBUG - 2018-09-16 09:29:11 --> Total execution time: 2.3044
INFO - 2018-09-16 09:29:44 --> Config Class Initialized
INFO - 2018-09-16 09:29:44 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:29:44 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:29:44 --> Utf8 Class Initialized
INFO - 2018-09-16 09:29:44 --> URI Class Initialized
INFO - 2018-09-16 09:29:44 --> Router Class Initialized
INFO - 2018-09-16 09:29:44 --> Output Class Initialized
INFO - 2018-09-16 09:29:44 --> Security Class Initialized
DEBUG - 2018-09-16 09:29:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:29:45 --> Input Class Initialized
INFO - 2018-09-16 09:29:45 --> Language Class Initialized
INFO - 2018-09-16 09:29:45 --> Loader Class Initialized
INFO - 2018-09-16 09:29:45 --> Helper loaded: url_helper
INFO - 2018-09-16 09:29:45 --> Helper loaded: text_helper
INFO - 2018-09-16 09:29:45 --> Helper loaded: form_helper
INFO - 2018-09-16 09:29:45 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:29:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:29:45 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:29:45 --> Form Validation Class Initialized
INFO - 2018-09-16 09:29:46 --> Controller Class Initialized
INFO - 2018-09-16 09:29:46 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:29:46 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:29:46 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:29:46 --> File loaded: F:\wamp\www\bank\application\views\admin/manageshg.php
INFO - 2018-09-16 09:29:46 --> Final output sent to browser
DEBUG - 2018-09-16 09:29:46 --> Total execution time: 1.2902
INFO - 2018-09-16 09:29:46 --> Config Class Initialized
INFO - 2018-09-16 09:29:46 --> Config Class Initialized
INFO - 2018-09-16 09:29:46 --> Hooks Class Initialized
INFO - 2018-09-16 09:29:46 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:29:46 --> UTF-8 Support Enabled
DEBUG - 2018-09-16 09:29:46 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:29:46 --> Utf8 Class Initialized
INFO - 2018-09-16 09:29:46 --> Utf8 Class Initialized
INFO - 2018-09-16 09:29:46 --> URI Class Initialized
INFO - 2018-09-16 09:29:46 --> URI Class Initialized
INFO - 2018-09-16 09:29:46 --> Router Class Initialized
INFO - 2018-09-16 09:29:46 --> Router Class Initialized
INFO - 2018-09-16 09:29:46 --> Output Class Initialized
INFO - 2018-09-16 09:29:46 --> Output Class Initialized
INFO - 2018-09-16 09:29:46 --> Security Class Initialized
INFO - 2018-09-16 09:29:46 --> Security Class Initialized
DEBUG - 2018-09-16 09:29:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2018-09-16 09:29:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:29:46 --> Input Class Initialized
INFO - 2018-09-16 09:29:46 --> Input Class Initialized
INFO - 2018-09-16 09:29:46 --> Language Class Initialized
INFO - 2018-09-16 09:29:46 --> Language Class Initialized
INFO - 2018-09-16 09:29:46 --> Loader Class Initialized
INFO - 2018-09-16 09:29:46 --> Loader Class Initialized
INFO - 2018-09-16 09:29:46 --> Helper loaded: url_helper
INFO - 2018-09-16 09:29:46 --> Helper loaded: url_helper
INFO - 2018-09-16 09:29:46 --> Helper loaded: text_helper
INFO - 2018-09-16 09:29:46 --> Helper loaded: text_helper
INFO - 2018-09-16 09:29:46 --> Helper loaded: form_helper
INFO - 2018-09-16 09:29:46 --> Helper loaded: form_helper
INFO - 2018-09-16 09:29:46 --> Database Driver Class Initialized
INFO - 2018-09-16 09:29:46 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:29:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2018-09-16 09:29:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:29:47 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:29:47 --> Form Validation Class Initialized
INFO - 2018-09-16 09:29:47 --> Controller Class Initialized
INFO - 2018-09-16 09:29:47 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:29:47 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:29:47 --> Helper loaded: security_helper
INFO - 2018-09-16 09:29:48 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/Memlist_group_table.php
INFO - 2018-09-16 09:29:48 --> Final output sent to browser
DEBUG - 2018-09-16 09:29:48 --> Total execution time: 1.6930
INFO - 2018-09-16 09:29:48 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:29:48 --> Form Validation Class Initialized
INFO - 2018-09-16 09:29:48 --> Controller Class Initialized
INFO - 2018-09-16 09:29:48 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:29:48 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:29:48 --> Helper loaded: security_helper
INFO - 2018-09-16 09:29:48 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/Mem_shg_group_select_table.php
INFO - 2018-09-16 09:29:48 --> Final output sent to browser
DEBUG - 2018-09-16 09:29:48 --> Total execution time: 2.0863
INFO - 2018-09-16 09:39:00 --> Config Class Initialized
INFO - 2018-09-16 09:39:00 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:39:00 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:39:00 --> Utf8 Class Initialized
INFO - 2018-09-16 09:39:00 --> URI Class Initialized
INFO - 2018-09-16 09:39:00 --> Router Class Initialized
INFO - 2018-09-16 09:39:00 --> Output Class Initialized
INFO - 2018-09-16 09:39:00 --> Security Class Initialized
DEBUG - 2018-09-16 09:39:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:39:00 --> Input Class Initialized
INFO - 2018-09-16 09:39:00 --> Language Class Initialized
INFO - 2018-09-16 09:39:00 --> Loader Class Initialized
INFO - 2018-09-16 09:39:00 --> Helper loaded: url_helper
INFO - 2018-09-16 09:39:00 --> Helper loaded: text_helper
INFO - 2018-09-16 09:39:00 --> Helper loaded: form_helper
INFO - 2018-09-16 09:39:00 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:39:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:39:01 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:39:01 --> Form Validation Class Initialized
INFO - 2018-09-16 09:39:01 --> Controller Class Initialized
ERROR - 2018-09-16 09:39:01 --> Severity: Parsing Error --> syntax error, unexpected '}' F:\wamp\www\bank\application\views\admin\customerprofile.php 118
INFO - 2018-09-16 09:41:29 --> Config Class Initialized
INFO - 2018-09-16 09:41:29 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:41:29 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:41:29 --> Utf8 Class Initialized
INFO - 2018-09-16 09:41:29 --> URI Class Initialized
INFO - 2018-09-16 09:41:29 --> Router Class Initialized
INFO - 2018-09-16 09:41:29 --> Output Class Initialized
INFO - 2018-09-16 09:41:29 --> Security Class Initialized
DEBUG - 2018-09-16 09:41:29 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:41:29 --> Input Class Initialized
INFO - 2018-09-16 09:41:29 --> Language Class Initialized
INFO - 2018-09-16 09:41:29 --> Loader Class Initialized
INFO - 2018-09-16 09:41:29 --> Helper loaded: url_helper
INFO - 2018-09-16 09:41:29 --> Helper loaded: text_helper
INFO - 2018-09-16 09:41:29 --> Helper loaded: form_helper
INFO - 2018-09-16 09:41:29 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:41:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:41:30 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:41:30 --> Form Validation Class Initialized
INFO - 2018-09-16 09:41:30 --> Controller Class Initialized
INFO - 2018-09-16 09:41:30 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:41:30 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
ERROR - 2018-09-16 09:41:30 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 25
ERROR - 2018-09-16 09:41:30 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 26
ERROR - 2018-09-16 09:41:30 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 27
ERROR - 2018-09-16 09:41:30 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 28
ERROR - 2018-09-16 09:41:30 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 29
ERROR - 2018-09-16 09:41:31 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 30
ERROR - 2018-09-16 09:41:31 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 33
ERROR - 2018-09-16 09:41:31 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 34
ERROR - 2018-09-16 09:41:31 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 35
ERROR - 2018-09-16 09:41:31 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 36
ERROR - 2018-09-16 09:41:31 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 68
ERROR - 2018-09-16 09:41:31 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 106
INFO - 2018-09-16 09:41:31 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:41:31 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:41:31 --> Final output sent to browser
DEBUG - 2018-09-16 09:41:31 --> Total execution time: 1.5401
INFO - 2018-09-16 09:41:31 --> Config Class Initialized
INFO - 2018-09-16 09:41:31 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:41:31 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:41:31 --> Utf8 Class Initialized
INFO - 2018-09-16 09:41:31 --> URI Class Initialized
INFO - 2018-09-16 09:41:31 --> Router Class Initialized
INFO - 2018-09-16 09:41:31 --> Output Class Initialized
INFO - 2018-09-16 09:41:31 --> Security Class Initialized
DEBUG - 2018-09-16 09:41:31 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:41:31 --> Input Class Initialized
INFO - 2018-09-16 09:41:31 --> Language Class Initialized
INFO - 2018-09-16 09:41:31 --> Loader Class Initialized
INFO - 2018-09-16 09:41:31 --> Helper loaded: url_helper
INFO - 2018-09-16 09:41:31 --> Helper loaded: text_helper
INFO - 2018-09-16 09:41:31 --> Helper loaded: form_helper
INFO - 2018-09-16 09:41:32 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:41:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:41:32 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:41:32 --> Form Validation Class Initialized
INFO - 2018-09-16 09:41:32 --> Controller Class Initialized
INFO - 2018-09-16 09:41:32 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:41:32 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:41:32 --> Helper loaded: security_helper
INFO - 2018-09-16 09:41:33 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:41:33 --> Final output sent to browser
DEBUG - 2018-09-16 09:41:33 --> Total execution time: 1.5523
INFO - 2018-09-16 09:41:35 --> Config Class Initialized
INFO - 2018-09-16 09:41:35 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:41:35 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:41:35 --> Utf8 Class Initialized
INFO - 2018-09-16 09:41:35 --> URI Class Initialized
INFO - 2018-09-16 09:41:35 --> Router Class Initialized
INFO - 2018-09-16 09:41:35 --> Output Class Initialized
INFO - 2018-09-16 09:41:35 --> Security Class Initialized
DEBUG - 2018-09-16 09:41:35 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:41:35 --> Input Class Initialized
INFO - 2018-09-16 09:41:35 --> Language Class Initialized
INFO - 2018-09-16 09:41:35 --> Loader Class Initialized
INFO - 2018-09-16 09:41:35 --> Helper loaded: url_helper
INFO - 2018-09-16 09:41:35 --> Helper loaded: text_helper
INFO - 2018-09-16 09:41:35 --> Helper loaded: form_helper
INFO - 2018-09-16 09:41:35 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:41:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:41:36 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:41:36 --> Form Validation Class Initialized
INFO - 2018-09-16 09:41:36 --> Controller Class Initialized
INFO - 2018-09-16 09:41:36 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:41:36 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:41:36 --> Helper loaded: security_helper
INFO - 2018-09-16 09:41:36 --> Final output sent to browser
DEBUG - 2018-09-16 09:41:36 --> Total execution time: 1.4792
INFO - 2018-09-16 09:43:41 --> Config Class Initialized
INFO - 2018-09-16 09:43:41 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:43:41 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:43:41 --> Utf8 Class Initialized
INFO - 2018-09-16 09:43:41 --> URI Class Initialized
INFO - 2018-09-16 09:43:41 --> Router Class Initialized
INFO - 2018-09-16 09:43:41 --> Output Class Initialized
INFO - 2018-09-16 09:43:41 --> Security Class Initialized
DEBUG - 2018-09-16 09:43:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:43:41 --> Input Class Initialized
INFO - 2018-09-16 09:43:41 --> Language Class Initialized
INFO - 2018-09-16 09:43:41 --> Loader Class Initialized
INFO - 2018-09-16 09:43:41 --> Helper loaded: url_helper
INFO - 2018-09-16 09:43:41 --> Helper loaded: text_helper
INFO - 2018-09-16 09:43:41 --> Helper loaded: form_helper
INFO - 2018-09-16 09:43:42 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:43:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:43:42 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:43:42 --> Form Validation Class Initialized
INFO - 2018-09-16 09:43:42 --> Controller Class Initialized
INFO - 2018-09-16 09:43:42 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:43:42 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
ERROR - 2018-09-16 09:43:42 --> Severity: Notice --> Undefined variable: row F:\wamp\www\bank\application\views\admin\customerprofile.php 102
INFO - 2018-09-16 09:43:42 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:43:42 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:43:42 --> Final output sent to browser
DEBUG - 2018-09-16 09:43:43 --> Total execution time: 1.3047
INFO - 2018-09-16 09:43:43 --> Config Class Initialized
INFO - 2018-09-16 09:43:43 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:43:43 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:43:43 --> Utf8 Class Initialized
INFO - 2018-09-16 09:43:43 --> URI Class Initialized
INFO - 2018-09-16 09:43:43 --> Router Class Initialized
INFO - 2018-09-16 09:43:43 --> Output Class Initialized
INFO - 2018-09-16 09:43:43 --> Security Class Initialized
DEBUG - 2018-09-16 09:43:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:43:43 --> Input Class Initialized
INFO - 2018-09-16 09:43:43 --> Language Class Initialized
INFO - 2018-09-16 09:43:43 --> Loader Class Initialized
INFO - 2018-09-16 09:43:43 --> Helper loaded: url_helper
INFO - 2018-09-16 09:43:43 --> Helper loaded: text_helper
INFO - 2018-09-16 09:43:43 --> Helper loaded: form_helper
INFO - 2018-09-16 09:43:43 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:43:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:43:44 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:43:44 --> Form Validation Class Initialized
INFO - 2018-09-16 09:43:44 --> Controller Class Initialized
INFO - 2018-09-16 09:43:44 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:43:44 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:43:44 --> Helper loaded: security_helper
INFO - 2018-09-16 09:43:44 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:43:44 --> Final output sent to browser
DEBUG - 2018-09-16 09:43:44 --> Total execution time: 1.6089
INFO - 2018-09-16 09:43:45 --> Config Class Initialized
INFO - 2018-09-16 09:43:46 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:43:46 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:43:46 --> Utf8 Class Initialized
INFO - 2018-09-16 09:43:46 --> URI Class Initialized
INFO - 2018-09-16 09:43:46 --> Router Class Initialized
INFO - 2018-09-16 09:43:46 --> Output Class Initialized
INFO - 2018-09-16 09:43:46 --> Security Class Initialized
DEBUG - 2018-09-16 09:43:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:43:46 --> Input Class Initialized
INFO - 2018-09-16 09:43:46 --> Language Class Initialized
INFO - 2018-09-16 09:43:46 --> Loader Class Initialized
INFO - 2018-09-16 09:43:46 --> Helper loaded: url_helper
INFO - 2018-09-16 09:43:46 --> Helper loaded: text_helper
INFO - 2018-09-16 09:43:46 --> Helper loaded: form_helper
INFO - 2018-09-16 09:43:46 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:43:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:43:47 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:43:47 --> Form Validation Class Initialized
INFO - 2018-09-16 09:43:47 --> Controller Class Initialized
INFO - 2018-09-16 09:43:47 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:43:47 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:43:47 --> Helper loaded: security_helper
INFO - 2018-09-16 09:43:47 --> Final output sent to browser
DEBUG - 2018-09-16 09:43:47 --> Total execution time: 1.4592
INFO - 2018-09-16 09:45:12 --> Config Class Initialized
INFO - 2018-09-16 09:45:12 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:45:12 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:45:12 --> Utf8 Class Initialized
INFO - 2018-09-16 09:45:12 --> URI Class Initialized
INFO - 2018-09-16 09:45:12 --> Router Class Initialized
INFO - 2018-09-16 09:45:12 --> Output Class Initialized
INFO - 2018-09-16 09:45:12 --> Security Class Initialized
DEBUG - 2018-09-16 09:45:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:45:12 --> Input Class Initialized
INFO - 2018-09-16 09:45:12 --> Language Class Initialized
INFO - 2018-09-16 09:45:12 --> Loader Class Initialized
INFO - 2018-09-16 09:45:12 --> Helper loaded: url_helper
INFO - 2018-09-16 09:45:12 --> Helper loaded: text_helper
INFO - 2018-09-16 09:45:12 --> Helper loaded: form_helper
INFO - 2018-09-16 09:45:12 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:45:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:45:13 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:45:13 --> Form Validation Class Initialized
INFO - 2018-09-16 09:45:13 --> Controller Class Initialized
INFO - 2018-09-16 09:45:13 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:45:13 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:45:13 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:45:13 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:45:13 --> Final output sent to browser
DEBUG - 2018-09-16 09:45:13 --> Total execution time: 1.6589
INFO - 2018-09-16 09:45:14 --> Config Class Initialized
INFO - 2018-09-16 09:45:14 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:45:14 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:45:14 --> Utf8 Class Initialized
INFO - 2018-09-16 09:45:14 --> URI Class Initialized
INFO - 2018-09-16 09:45:14 --> Router Class Initialized
INFO - 2018-09-16 09:45:14 --> Output Class Initialized
INFO - 2018-09-16 09:45:14 --> Security Class Initialized
DEBUG - 2018-09-16 09:45:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:45:14 --> Input Class Initialized
INFO - 2018-09-16 09:45:14 --> Language Class Initialized
INFO - 2018-09-16 09:45:14 --> Loader Class Initialized
INFO - 2018-09-16 09:45:14 --> Helper loaded: url_helper
INFO - 2018-09-16 09:45:14 --> Helper loaded: text_helper
INFO - 2018-09-16 09:45:14 --> Helper loaded: form_helper
INFO - 2018-09-16 09:45:14 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:45:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:45:15 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:45:15 --> Form Validation Class Initialized
INFO - 2018-09-16 09:45:15 --> Controller Class Initialized
INFO - 2018-09-16 09:45:15 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:45:15 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:45:15 --> Helper loaded: security_helper
INFO - 2018-09-16 09:45:15 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:45:15 --> Final output sent to browser
DEBUG - 2018-09-16 09:45:15 --> Total execution time: 1.6335
INFO - 2018-09-16 09:45:17 --> Config Class Initialized
INFO - 2018-09-16 09:45:17 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:45:17 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:45:17 --> Utf8 Class Initialized
INFO - 2018-09-16 09:45:17 --> URI Class Initialized
INFO - 2018-09-16 09:45:17 --> Router Class Initialized
INFO - 2018-09-16 09:45:17 --> Output Class Initialized
INFO - 2018-09-16 09:45:17 --> Security Class Initialized
DEBUG - 2018-09-16 09:45:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:45:17 --> Input Class Initialized
INFO - 2018-09-16 09:45:17 --> Language Class Initialized
INFO - 2018-09-16 09:45:17 --> Loader Class Initialized
INFO - 2018-09-16 09:45:17 --> Helper loaded: url_helper
INFO - 2018-09-16 09:45:17 --> Helper loaded: text_helper
INFO - 2018-09-16 09:45:17 --> Helper loaded: form_helper
INFO - 2018-09-16 09:45:17 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:45:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:45:18 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:45:18 --> Form Validation Class Initialized
INFO - 2018-09-16 09:45:18 --> Controller Class Initialized
INFO - 2018-09-16 09:45:18 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:45:18 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:45:18 --> Helper loaded: security_helper
INFO - 2018-09-16 09:45:18 --> Final output sent to browser
DEBUG - 2018-09-16 09:45:18 --> Total execution time: 1.4085
INFO - 2018-09-16 09:46:20 --> Config Class Initialized
INFO - 2018-09-16 09:46:20 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:46:20 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:46:20 --> Utf8 Class Initialized
INFO - 2018-09-16 09:46:20 --> URI Class Initialized
INFO - 2018-09-16 09:46:20 --> Router Class Initialized
INFO - 2018-09-16 09:46:20 --> Output Class Initialized
INFO - 2018-09-16 09:46:20 --> Security Class Initialized
DEBUG - 2018-09-16 09:46:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:46:20 --> Input Class Initialized
INFO - 2018-09-16 09:46:20 --> Language Class Initialized
INFO - 2018-09-16 09:46:20 --> Loader Class Initialized
INFO - 2018-09-16 09:46:20 --> Helper loaded: url_helper
INFO - 2018-09-16 09:46:20 --> Helper loaded: text_helper
INFO - 2018-09-16 09:46:20 --> Helper loaded: form_helper
INFO - 2018-09-16 09:46:20 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:46:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:46:21 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:46:21 --> Form Validation Class Initialized
INFO - 2018-09-16 09:46:21 --> Controller Class Initialized
INFO - 2018-09-16 09:46:21 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:46:21 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:46:21 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:46:21 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:46:21 --> Final output sent to browser
DEBUG - 2018-09-16 09:46:21 --> Total execution time: 1.3625
INFO - 2018-09-16 09:46:22 --> Config Class Initialized
INFO - 2018-09-16 09:46:22 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:46:22 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:46:22 --> Utf8 Class Initialized
INFO - 2018-09-16 09:46:22 --> URI Class Initialized
INFO - 2018-09-16 09:46:22 --> Router Class Initialized
INFO - 2018-09-16 09:46:22 --> Output Class Initialized
INFO - 2018-09-16 09:46:22 --> Security Class Initialized
DEBUG - 2018-09-16 09:46:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:46:22 --> Input Class Initialized
INFO - 2018-09-16 09:46:22 --> Language Class Initialized
INFO - 2018-09-16 09:46:22 --> Loader Class Initialized
INFO - 2018-09-16 09:46:22 --> Helper loaded: url_helper
INFO - 2018-09-16 09:46:22 --> Helper loaded: text_helper
INFO - 2018-09-16 09:46:22 --> Helper loaded: form_helper
INFO - 2018-09-16 09:46:22 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:46:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:46:23 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:46:23 --> Form Validation Class Initialized
INFO - 2018-09-16 09:46:23 --> Controller Class Initialized
INFO - 2018-09-16 09:46:23 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:46:23 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:46:23 --> Helper loaded: security_helper
INFO - 2018-09-16 09:46:23 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:46:23 --> Final output sent to browser
DEBUG - 2018-09-16 09:46:23 --> Total execution time: 1.7179
INFO - 2018-09-16 09:46:25 --> Config Class Initialized
INFO - 2018-09-16 09:46:25 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:46:25 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:46:25 --> Utf8 Class Initialized
INFO - 2018-09-16 09:46:25 --> URI Class Initialized
INFO - 2018-09-16 09:46:25 --> Router Class Initialized
INFO - 2018-09-16 09:46:25 --> Output Class Initialized
INFO - 2018-09-16 09:46:25 --> Security Class Initialized
DEBUG - 2018-09-16 09:46:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:46:25 --> Input Class Initialized
INFO - 2018-09-16 09:46:25 --> Language Class Initialized
INFO - 2018-09-16 09:46:25 --> Loader Class Initialized
INFO - 2018-09-16 09:46:25 --> Helper loaded: url_helper
INFO - 2018-09-16 09:46:25 --> Helper loaded: text_helper
INFO - 2018-09-16 09:46:25 --> Helper loaded: form_helper
INFO - 2018-09-16 09:46:25 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:46:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:46:26 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:46:26 --> Form Validation Class Initialized
INFO - 2018-09-16 09:46:26 --> Controller Class Initialized
INFO - 2018-09-16 09:46:26 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:46:26 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:46:26 --> Helper loaded: security_helper
INFO - 2018-09-16 09:46:26 --> Final output sent to browser
DEBUG - 2018-09-16 09:46:26 --> Total execution time: 1.5020
INFO - 2018-09-16 09:46:55 --> Config Class Initialized
INFO - 2018-09-16 09:46:55 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:46:55 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:46:55 --> Utf8 Class Initialized
INFO - 2018-09-16 09:46:55 --> URI Class Initialized
INFO - 2018-09-16 09:46:55 --> Router Class Initialized
INFO - 2018-09-16 09:46:55 --> Output Class Initialized
INFO - 2018-09-16 09:46:55 --> Security Class Initialized
DEBUG - 2018-09-16 09:46:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:46:55 --> Input Class Initialized
INFO - 2018-09-16 09:46:55 --> Language Class Initialized
INFO - 2018-09-16 09:46:55 --> Loader Class Initialized
INFO - 2018-09-16 09:46:55 --> Helper loaded: url_helper
INFO - 2018-09-16 09:46:55 --> Helper loaded: text_helper
INFO - 2018-09-16 09:46:55 --> Helper loaded: form_helper
INFO - 2018-09-16 09:46:55 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:46:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:46:56 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:46:56 --> Form Validation Class Initialized
INFO - 2018-09-16 09:46:56 --> Controller Class Initialized
INFO - 2018-09-16 09:46:56 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:46:56 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:46:56 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:46:56 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:46:56 --> Final output sent to browser
DEBUG - 2018-09-16 09:46:56 --> Total execution time: 1.2902
INFO - 2018-09-16 09:46:56 --> Config Class Initialized
INFO - 2018-09-16 09:46:56 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:46:56 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:46:56 --> Utf8 Class Initialized
INFO - 2018-09-16 09:46:56 --> URI Class Initialized
INFO - 2018-09-16 09:46:57 --> Router Class Initialized
INFO - 2018-09-16 09:46:57 --> Output Class Initialized
INFO - 2018-09-16 09:46:57 --> Security Class Initialized
DEBUG - 2018-09-16 09:46:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:46:57 --> Input Class Initialized
INFO - 2018-09-16 09:46:57 --> Language Class Initialized
INFO - 2018-09-16 09:46:57 --> Loader Class Initialized
INFO - 2018-09-16 09:46:57 --> Helper loaded: url_helper
INFO - 2018-09-16 09:46:57 --> Helper loaded: text_helper
INFO - 2018-09-16 09:46:57 --> Helper loaded: form_helper
INFO - 2018-09-16 09:46:57 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:46:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:46:58 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:46:58 --> Form Validation Class Initialized
INFO - 2018-09-16 09:46:58 --> Controller Class Initialized
INFO - 2018-09-16 09:46:58 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:46:58 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:46:58 --> Helper loaded: security_helper
INFO - 2018-09-16 09:46:58 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:46:58 --> Final output sent to browser
DEBUG - 2018-09-16 09:46:58 --> Total execution time: 1.5641
INFO - 2018-09-16 09:46:59 --> Config Class Initialized
INFO - 2018-09-16 09:46:59 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:46:59 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:46:59 --> Utf8 Class Initialized
INFO - 2018-09-16 09:46:59 --> URI Class Initialized
INFO - 2018-09-16 09:46:59 --> Router Class Initialized
INFO - 2018-09-16 09:46:59 --> Output Class Initialized
INFO - 2018-09-16 09:46:59 --> Security Class Initialized
DEBUG - 2018-09-16 09:46:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:46:59 --> Input Class Initialized
INFO - 2018-09-16 09:46:59 --> Language Class Initialized
INFO - 2018-09-16 09:46:59 --> Loader Class Initialized
INFO - 2018-09-16 09:46:59 --> Helper loaded: url_helper
INFO - 2018-09-16 09:46:59 --> Helper loaded: text_helper
INFO - 2018-09-16 09:46:59 --> Helper loaded: form_helper
INFO - 2018-09-16 09:46:59 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:47:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:47:00 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:47:00 --> Form Validation Class Initialized
INFO - 2018-09-16 09:47:00 --> Controller Class Initialized
INFO - 2018-09-16 09:47:00 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:47:00 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:47:00 --> Helper loaded: security_helper
INFO - 2018-09-16 09:47:01 --> Final output sent to browser
DEBUG - 2018-09-16 09:47:01 --> Total execution time: 1.7043
INFO - 2018-09-16 09:47:18 --> Config Class Initialized
INFO - 2018-09-16 09:47:18 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:47:18 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:47:18 --> Utf8 Class Initialized
INFO - 2018-09-16 09:47:18 --> URI Class Initialized
INFO - 2018-09-16 09:47:18 --> Router Class Initialized
INFO - 2018-09-16 09:47:18 --> Output Class Initialized
INFO - 2018-09-16 09:47:18 --> Security Class Initialized
DEBUG - 2018-09-16 09:47:18 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:47:18 --> Input Class Initialized
INFO - 2018-09-16 09:47:18 --> Language Class Initialized
INFO - 2018-09-16 09:47:18 --> Loader Class Initialized
INFO - 2018-09-16 09:47:18 --> Helper loaded: url_helper
INFO - 2018-09-16 09:47:18 --> Helper loaded: text_helper
INFO - 2018-09-16 09:47:18 --> Helper loaded: form_helper
INFO - 2018-09-16 09:47:18 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:47:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:47:19 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:47:19 --> Form Validation Class Initialized
INFO - 2018-09-16 09:47:19 --> Controller Class Initialized
INFO - 2018-09-16 09:47:19 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:47:19 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:47:19 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:47:19 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:47:19 --> Final output sent to browser
DEBUG - 2018-09-16 09:47:19 --> Total execution time: 1.3137
INFO - 2018-09-16 09:47:19 --> Config Class Initialized
INFO - 2018-09-16 09:47:19 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:47:20 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:47:20 --> Utf8 Class Initialized
INFO - 2018-09-16 09:47:20 --> URI Class Initialized
INFO - 2018-09-16 09:47:20 --> Router Class Initialized
INFO - 2018-09-16 09:47:20 --> Output Class Initialized
INFO - 2018-09-16 09:47:20 --> Security Class Initialized
DEBUG - 2018-09-16 09:47:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:47:20 --> Input Class Initialized
INFO - 2018-09-16 09:47:20 --> Language Class Initialized
INFO - 2018-09-16 09:47:20 --> Loader Class Initialized
INFO - 2018-09-16 09:47:20 --> Helper loaded: url_helper
INFO - 2018-09-16 09:47:20 --> Helper loaded: text_helper
INFO - 2018-09-16 09:47:20 --> Helper loaded: form_helper
INFO - 2018-09-16 09:47:20 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:47:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:47:21 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:47:21 --> Form Validation Class Initialized
INFO - 2018-09-16 09:47:21 --> Controller Class Initialized
INFO - 2018-09-16 09:47:21 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:47:21 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:47:21 --> Helper loaded: security_helper
INFO - 2018-09-16 09:47:21 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:47:21 --> Final output sent to browser
DEBUG - 2018-09-16 09:47:21 --> Total execution time: 1.5708
INFO - 2018-09-16 09:47:23 --> Config Class Initialized
INFO - 2018-09-16 09:47:23 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:47:23 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:47:23 --> Utf8 Class Initialized
INFO - 2018-09-16 09:47:23 --> URI Class Initialized
INFO - 2018-09-16 09:47:23 --> Router Class Initialized
INFO - 2018-09-16 09:47:23 --> Output Class Initialized
INFO - 2018-09-16 09:47:23 --> Security Class Initialized
DEBUG - 2018-09-16 09:47:23 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:47:23 --> Input Class Initialized
INFO - 2018-09-16 09:47:23 --> Language Class Initialized
INFO - 2018-09-16 09:47:23 --> Loader Class Initialized
INFO - 2018-09-16 09:47:23 --> Helper loaded: url_helper
INFO - 2018-09-16 09:47:23 --> Helper loaded: text_helper
INFO - 2018-09-16 09:47:23 --> Helper loaded: form_helper
INFO - 2018-09-16 09:47:23 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:47:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:47:24 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:47:24 --> Form Validation Class Initialized
INFO - 2018-09-16 09:47:24 --> Controller Class Initialized
INFO - 2018-09-16 09:47:24 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:47:24 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:47:24 --> Helper loaded: security_helper
INFO - 2018-09-16 09:47:24 --> Final output sent to browser
DEBUG - 2018-09-16 09:47:24 --> Total execution time: 1.4891
INFO - 2018-09-16 09:48:16 --> Config Class Initialized
INFO - 2018-09-16 09:48:16 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:48:16 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:48:16 --> Utf8 Class Initialized
INFO - 2018-09-16 09:48:16 --> URI Class Initialized
INFO - 2018-09-16 09:48:16 --> Router Class Initialized
INFO - 2018-09-16 09:48:16 --> Output Class Initialized
INFO - 2018-09-16 09:48:16 --> Security Class Initialized
DEBUG - 2018-09-16 09:48:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:48:16 --> Input Class Initialized
INFO - 2018-09-16 09:48:16 --> Language Class Initialized
ERROR - 2018-09-16 09:48:16 --> 404 Page Not Found: Data_controller/save_pdf_download
INFO - 2018-09-16 09:48:21 --> Config Class Initialized
INFO - 2018-09-16 09:48:21 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:48:21 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:48:21 --> Utf8 Class Initialized
INFO - 2018-09-16 09:48:21 --> URI Class Initialized
INFO - 2018-09-16 09:48:21 --> Router Class Initialized
INFO - 2018-09-16 09:48:21 --> Output Class Initialized
INFO - 2018-09-16 09:48:21 --> Security Class Initialized
DEBUG - 2018-09-16 09:48:21 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:48:21 --> Input Class Initialized
INFO - 2018-09-16 09:48:21 --> Language Class Initialized
INFO - 2018-09-16 09:48:21 --> Loader Class Initialized
INFO - 2018-09-16 09:48:21 --> Helper loaded: url_helper
INFO - 2018-09-16 09:48:21 --> Helper loaded: text_helper
INFO - 2018-09-16 09:48:21 --> Helper loaded: form_helper
INFO - 2018-09-16 09:48:21 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:48:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:48:22 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:48:22 --> Form Validation Class Initialized
INFO - 2018-09-16 09:48:22 --> Controller Class Initialized
INFO - 2018-09-16 09:48:22 --> Final output sent to browser
DEBUG - 2018-09-16 09:48:22 --> Total execution time: 1.5748
INFO - 2018-09-16 09:48:25 --> Config Class Initialized
INFO - 2018-09-16 09:48:25 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:48:25 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:48:25 --> Utf8 Class Initialized
INFO - 2018-09-16 09:48:25 --> URI Class Initialized
INFO - 2018-09-16 09:48:25 --> Router Class Initialized
INFO - 2018-09-16 09:48:25 --> Output Class Initialized
INFO - 2018-09-16 09:48:25 --> Security Class Initialized
DEBUG - 2018-09-16 09:48:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:48:25 --> Input Class Initialized
INFO - 2018-09-16 09:48:25 --> Language Class Initialized
INFO - 2018-09-16 09:48:25 --> Loader Class Initialized
INFO - 2018-09-16 09:48:25 --> Helper loaded: url_helper
INFO - 2018-09-16 09:48:25 --> Helper loaded: text_helper
INFO - 2018-09-16 09:48:25 --> Helper loaded: form_helper
INFO - 2018-09-16 09:48:25 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:48:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:48:26 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:48:26 --> Form Validation Class Initialized
INFO - 2018-09-16 09:48:26 --> Controller Class Initialized
INFO - 2018-09-16 09:48:26 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:48:26 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:48:26 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:48:26 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:48:26 --> Final output sent to browser
DEBUG - 2018-09-16 09:48:27 --> Total execution time: 1.3539
INFO - 2018-09-16 09:48:27 --> Config Class Initialized
INFO - 2018-09-16 09:48:27 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:48:27 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:48:27 --> Utf8 Class Initialized
INFO - 2018-09-16 09:48:27 --> URI Class Initialized
INFO - 2018-09-16 09:48:27 --> Router Class Initialized
INFO - 2018-09-16 09:48:27 --> Output Class Initialized
INFO - 2018-09-16 09:48:27 --> Security Class Initialized
DEBUG - 2018-09-16 09:48:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:48:27 --> Input Class Initialized
INFO - 2018-09-16 09:48:27 --> Language Class Initialized
INFO - 2018-09-16 09:48:27 --> Loader Class Initialized
INFO - 2018-09-16 09:48:27 --> Helper loaded: url_helper
INFO - 2018-09-16 09:48:27 --> Helper loaded: text_helper
INFO - 2018-09-16 09:48:27 --> Helper loaded: form_helper
INFO - 2018-09-16 09:48:27 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:48:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:48:28 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:48:28 --> Form Validation Class Initialized
INFO - 2018-09-16 09:48:28 --> Controller Class Initialized
INFO - 2018-09-16 09:48:28 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:48:28 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:48:28 --> Helper loaded: security_helper
INFO - 2018-09-16 09:48:28 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:48:29 --> Final output sent to browser
DEBUG - 2018-09-16 09:48:29 --> Total execution time: 1.7177
INFO - 2018-09-16 09:48:30 --> Config Class Initialized
INFO - 2018-09-16 09:48:30 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:48:30 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:48:30 --> Utf8 Class Initialized
INFO - 2018-09-16 09:48:30 --> URI Class Initialized
INFO - 2018-09-16 09:48:30 --> Router Class Initialized
INFO - 2018-09-16 09:48:30 --> Output Class Initialized
INFO - 2018-09-16 09:48:30 --> Security Class Initialized
DEBUG - 2018-09-16 09:48:30 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:48:30 --> Input Class Initialized
INFO - 2018-09-16 09:48:30 --> Language Class Initialized
INFO - 2018-09-16 09:48:30 --> Loader Class Initialized
INFO - 2018-09-16 09:48:30 --> Helper loaded: url_helper
INFO - 2018-09-16 09:48:30 --> Helper loaded: text_helper
INFO - 2018-09-16 09:48:30 --> Helper loaded: form_helper
INFO - 2018-09-16 09:48:30 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:48:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:48:31 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:48:31 --> Form Validation Class Initialized
INFO - 2018-09-16 09:48:31 --> Controller Class Initialized
INFO - 2018-09-16 09:48:31 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:48:31 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:48:31 --> Helper loaded: security_helper
INFO - 2018-09-16 09:48:31 --> Final output sent to browser
DEBUG - 2018-09-16 09:48:31 --> Total execution time: 1.4328
INFO - 2018-09-16 09:50:13 --> Config Class Initialized
INFO - 2018-09-16 09:50:13 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:50:13 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:50:13 --> Utf8 Class Initialized
INFO - 2018-09-16 09:50:13 --> URI Class Initialized
INFO - 2018-09-16 09:50:13 --> Router Class Initialized
INFO - 2018-09-16 09:50:13 --> Output Class Initialized
INFO - 2018-09-16 09:50:13 --> Security Class Initialized
DEBUG - 2018-09-16 09:50:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:50:13 --> Input Class Initialized
INFO - 2018-09-16 09:50:13 --> Language Class Initialized
INFO - 2018-09-16 09:50:13 --> Loader Class Initialized
INFO - 2018-09-16 09:50:13 --> Helper loaded: url_helper
INFO - 2018-09-16 09:50:13 --> Helper loaded: text_helper
INFO - 2018-09-16 09:50:13 --> Helper loaded: form_helper
INFO - 2018-09-16 09:50:13 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:50:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:50:14 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:50:14 --> Form Validation Class Initialized
INFO - 2018-09-16 09:50:14 --> Controller Class Initialized
INFO - 2018-09-16 09:50:14 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:50:14 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:50:14 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:50:14 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:50:14 --> Final output sent to browser
DEBUG - 2018-09-16 09:50:15 --> Total execution time: 1.3846
INFO - 2018-09-16 09:50:15 --> Config Class Initialized
INFO - 2018-09-16 09:50:15 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:50:15 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:50:15 --> Utf8 Class Initialized
INFO - 2018-09-16 09:50:15 --> URI Class Initialized
INFO - 2018-09-16 09:50:15 --> Router Class Initialized
INFO - 2018-09-16 09:50:15 --> Output Class Initialized
INFO - 2018-09-16 09:50:15 --> Security Class Initialized
DEBUG - 2018-09-16 09:50:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:50:15 --> Input Class Initialized
INFO - 2018-09-16 09:50:15 --> Language Class Initialized
INFO - 2018-09-16 09:50:15 --> Loader Class Initialized
INFO - 2018-09-16 09:50:15 --> Helper loaded: url_helper
INFO - 2018-09-16 09:50:15 --> Helper loaded: text_helper
INFO - 2018-09-16 09:50:15 --> Helper loaded: form_helper
INFO - 2018-09-16 09:50:15 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:50:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:50:16 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:50:16 --> Form Validation Class Initialized
INFO - 2018-09-16 09:50:16 --> Controller Class Initialized
INFO - 2018-09-16 09:50:16 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:50:16 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:50:16 --> Helper loaded: security_helper
INFO - 2018-09-16 09:50:16 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:50:16 --> Final output sent to browser
DEBUG - 2018-09-16 09:50:16 --> Total execution time: 1.5640
INFO - 2018-09-16 09:50:18 --> Config Class Initialized
INFO - 2018-09-16 09:50:18 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:50:18 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:50:18 --> Utf8 Class Initialized
INFO - 2018-09-16 09:50:18 --> URI Class Initialized
INFO - 2018-09-16 09:50:19 --> Router Class Initialized
INFO - 2018-09-16 09:50:19 --> Output Class Initialized
INFO - 2018-09-16 09:50:19 --> Security Class Initialized
DEBUG - 2018-09-16 09:50:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:50:19 --> Input Class Initialized
INFO - 2018-09-16 09:50:19 --> Language Class Initialized
INFO - 2018-09-16 09:50:19 --> Loader Class Initialized
INFO - 2018-09-16 09:50:19 --> Helper loaded: url_helper
INFO - 2018-09-16 09:50:19 --> Helper loaded: text_helper
INFO - 2018-09-16 09:50:19 --> Helper loaded: form_helper
INFO - 2018-09-16 09:50:19 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:50:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:50:20 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:50:20 --> Form Validation Class Initialized
INFO - 2018-09-16 09:50:20 --> Controller Class Initialized
INFO - 2018-09-16 09:50:20 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:50:20 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:50:20 --> Helper loaded: security_helper
INFO - 2018-09-16 09:50:20 --> Final output sent to browser
DEBUG - 2018-09-16 09:50:20 --> Total execution time: 2.0106
INFO - 2018-09-16 09:50:50 --> Config Class Initialized
INFO - 2018-09-16 09:50:50 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:50:51 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:50:51 --> Utf8 Class Initialized
INFO - 2018-09-16 09:50:51 --> URI Class Initialized
INFO - 2018-09-16 09:50:51 --> Router Class Initialized
INFO - 2018-09-16 09:50:51 --> Output Class Initialized
INFO - 2018-09-16 09:50:51 --> Security Class Initialized
DEBUG - 2018-09-16 09:50:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:50:51 --> Input Class Initialized
INFO - 2018-09-16 09:50:51 --> Language Class Initialized
INFO - 2018-09-16 09:50:51 --> Loader Class Initialized
INFO - 2018-09-16 09:50:51 --> Helper loaded: url_helper
INFO - 2018-09-16 09:50:51 --> Helper loaded: text_helper
INFO - 2018-09-16 09:50:51 --> Helper loaded: form_helper
INFO - 2018-09-16 09:50:51 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:50:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:50:52 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:50:52 --> Form Validation Class Initialized
INFO - 2018-09-16 09:50:52 --> Controller Class Initialized
INFO - 2018-09-16 09:50:52 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:50:52 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:50:52 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:50:52 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:50:52 --> Final output sent to browser
DEBUG - 2018-09-16 09:50:52 --> Total execution time: 1.3802
INFO - 2018-09-16 09:50:52 --> Config Class Initialized
INFO - 2018-09-16 09:50:52 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:50:52 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:50:52 --> Utf8 Class Initialized
INFO - 2018-09-16 09:50:52 --> URI Class Initialized
INFO - 2018-09-16 09:50:52 --> Router Class Initialized
INFO - 2018-09-16 09:50:52 --> Output Class Initialized
INFO - 2018-09-16 09:50:52 --> Security Class Initialized
DEBUG - 2018-09-16 09:50:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:50:53 --> Input Class Initialized
INFO - 2018-09-16 09:50:53 --> Language Class Initialized
INFO - 2018-09-16 09:50:53 --> Loader Class Initialized
INFO - 2018-09-16 09:50:53 --> Helper loaded: url_helper
INFO - 2018-09-16 09:50:53 --> Helper loaded: text_helper
INFO - 2018-09-16 09:50:53 --> Helper loaded: form_helper
INFO - 2018-09-16 09:50:53 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:50:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:50:54 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:50:54 --> Form Validation Class Initialized
INFO - 2018-09-16 09:50:54 --> Controller Class Initialized
INFO - 2018-09-16 09:50:54 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:50:54 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:50:54 --> Helper loaded: security_helper
INFO - 2018-09-16 09:50:54 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:50:54 --> Final output sent to browser
DEBUG - 2018-09-16 09:50:54 --> Total execution time: 1.7949
INFO - 2018-09-16 09:50:55 --> Config Class Initialized
INFO - 2018-09-16 09:50:55 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:50:55 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:50:55 --> Utf8 Class Initialized
INFO - 2018-09-16 09:50:55 --> URI Class Initialized
INFO - 2018-09-16 09:50:55 --> Router Class Initialized
INFO - 2018-09-16 09:50:55 --> Output Class Initialized
INFO - 2018-09-16 09:50:55 --> Security Class Initialized
DEBUG - 2018-09-16 09:50:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:50:55 --> Input Class Initialized
INFO - 2018-09-16 09:50:55 --> Language Class Initialized
INFO - 2018-09-16 09:50:55 --> Loader Class Initialized
INFO - 2018-09-16 09:50:55 --> Helper loaded: url_helper
INFO - 2018-09-16 09:50:55 --> Helper loaded: text_helper
INFO - 2018-09-16 09:50:55 --> Helper loaded: form_helper
INFO - 2018-09-16 09:50:55 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:50:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:50:56 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:50:56 --> Form Validation Class Initialized
INFO - 2018-09-16 09:50:56 --> Controller Class Initialized
INFO - 2018-09-16 09:50:56 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:50:56 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:50:56 --> Helper loaded: security_helper
INFO - 2018-09-16 09:50:57 --> Final output sent to browser
DEBUG - 2018-09-16 09:50:57 --> Total execution time: 1.4973
INFO - 2018-09-16 09:51:34 --> Config Class Initialized
INFO - 2018-09-16 09:51:34 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:51:34 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:51:34 --> Utf8 Class Initialized
INFO - 2018-09-16 09:51:34 --> URI Class Initialized
INFO - 2018-09-16 09:51:34 --> Router Class Initialized
INFO - 2018-09-16 09:51:34 --> Output Class Initialized
INFO - 2018-09-16 09:51:34 --> Security Class Initialized
DEBUG - 2018-09-16 09:51:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:51:34 --> Input Class Initialized
INFO - 2018-09-16 09:51:34 --> Language Class Initialized
INFO - 2018-09-16 09:51:34 --> Loader Class Initialized
INFO - 2018-09-16 09:51:34 --> Helper loaded: url_helper
INFO - 2018-09-16 09:51:34 --> Helper loaded: text_helper
INFO - 2018-09-16 09:51:35 --> Helper loaded: form_helper
INFO - 2018-09-16 09:51:35 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:51:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:51:35 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:51:35 --> Form Validation Class Initialized
INFO - 2018-09-16 09:51:36 --> Controller Class Initialized
INFO - 2018-09-16 09:51:36 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:51:36 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:51:36 --> Helper loaded: security_helper
INFO - 2018-09-16 09:51:36 --> Final output sent to browser
DEBUG - 2018-09-16 09:51:36 --> Total execution time: 1.5740
INFO - 2018-09-16 09:51:40 --> Config Class Initialized
INFO - 2018-09-16 09:51:40 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:51:40 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:51:40 --> Utf8 Class Initialized
INFO - 2018-09-16 09:51:40 --> URI Class Initialized
INFO - 2018-09-16 09:51:40 --> Router Class Initialized
INFO - 2018-09-16 09:51:40 --> Output Class Initialized
INFO - 2018-09-16 09:51:40 --> Security Class Initialized
DEBUG - 2018-09-16 09:51:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:51:40 --> Input Class Initialized
INFO - 2018-09-16 09:51:40 --> Language Class Initialized
INFO - 2018-09-16 09:51:40 --> Loader Class Initialized
INFO - 2018-09-16 09:51:40 --> Helper loaded: url_helper
INFO - 2018-09-16 09:51:40 --> Helper loaded: text_helper
INFO - 2018-09-16 09:51:40 --> Helper loaded: form_helper
INFO - 2018-09-16 09:51:41 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:51:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:51:41 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:51:41 --> Form Validation Class Initialized
INFO - 2018-09-16 09:51:41 --> Controller Class Initialized
INFO - 2018-09-16 09:51:41 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:51:41 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:51:41 --> Helper loaded: security_helper
INFO - 2018-09-16 09:51:42 --> Final output sent to browser
DEBUG - 2018-09-16 09:51:42 --> Total execution time: 1.5761
INFO - 2018-09-16 09:54:56 --> Config Class Initialized
INFO - 2018-09-16 09:54:56 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:54:56 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:54:56 --> Utf8 Class Initialized
INFO - 2018-09-16 09:54:56 --> URI Class Initialized
INFO - 2018-09-16 09:54:56 --> Router Class Initialized
INFO - 2018-09-16 09:54:56 --> Output Class Initialized
INFO - 2018-09-16 09:54:56 --> Security Class Initialized
DEBUG - 2018-09-16 09:54:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:54:56 --> Input Class Initialized
INFO - 2018-09-16 09:54:56 --> Language Class Initialized
INFO - 2018-09-16 09:54:56 --> Loader Class Initialized
INFO - 2018-09-16 09:54:56 --> Helper loaded: url_helper
INFO - 2018-09-16 09:54:56 --> Helper loaded: text_helper
INFO - 2018-09-16 09:54:56 --> Helper loaded: form_helper
INFO - 2018-09-16 09:54:56 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:54:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:54:58 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:54:58 --> Form Validation Class Initialized
INFO - 2018-09-16 09:54:58 --> Controller Class Initialized
INFO - 2018-09-16 09:54:58 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:54:58 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:54:58 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:54:58 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:54:58 --> Final output sent to browser
DEBUG - 2018-09-16 09:54:58 --> Total execution time: 1.6578
INFO - 2018-09-16 09:54:58 --> Config Class Initialized
INFO - 2018-09-16 09:54:58 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:54:58 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:54:58 --> Utf8 Class Initialized
INFO - 2018-09-16 09:54:58 --> URI Class Initialized
INFO - 2018-09-16 09:54:58 --> Router Class Initialized
INFO - 2018-09-16 09:54:58 --> Output Class Initialized
INFO - 2018-09-16 09:54:58 --> Security Class Initialized
DEBUG - 2018-09-16 09:54:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:54:58 --> Input Class Initialized
INFO - 2018-09-16 09:54:58 --> Language Class Initialized
INFO - 2018-09-16 09:54:58 --> Loader Class Initialized
INFO - 2018-09-16 09:54:58 --> Helper loaded: url_helper
INFO - 2018-09-16 09:54:58 --> Helper loaded: text_helper
INFO - 2018-09-16 09:54:58 --> Helper loaded: form_helper
INFO - 2018-09-16 09:54:58 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:54:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:54:59 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:54:59 --> Form Validation Class Initialized
INFO - 2018-09-16 09:54:59 --> Controller Class Initialized
INFO - 2018-09-16 09:54:59 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:54:59 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:54:59 --> Helper loaded: security_helper
INFO - 2018-09-16 09:55:00 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:55:00 --> Final output sent to browser
DEBUG - 2018-09-16 09:55:00 --> Total execution time: 1.6944
INFO - 2018-09-16 09:55:01 --> Config Class Initialized
INFO - 2018-09-16 09:55:01 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:55:01 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:55:01 --> Utf8 Class Initialized
INFO - 2018-09-16 09:55:01 --> URI Class Initialized
INFO - 2018-09-16 09:55:01 --> Router Class Initialized
INFO - 2018-09-16 09:55:01 --> Output Class Initialized
INFO - 2018-09-16 09:55:01 --> Security Class Initialized
DEBUG - 2018-09-16 09:55:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:55:01 --> Input Class Initialized
INFO - 2018-09-16 09:55:01 --> Language Class Initialized
INFO - 2018-09-16 09:55:01 --> Loader Class Initialized
INFO - 2018-09-16 09:55:01 --> Helper loaded: url_helper
INFO - 2018-09-16 09:55:01 --> Helper loaded: text_helper
INFO - 2018-09-16 09:55:01 --> Helper loaded: form_helper
INFO - 2018-09-16 09:55:01 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:55:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:55:02 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:55:02 --> Form Validation Class Initialized
INFO - 2018-09-16 09:55:02 --> Controller Class Initialized
INFO - 2018-09-16 09:55:02 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:55:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:55:02 --> Helper loaded: security_helper
INFO - 2018-09-16 09:55:02 --> Final output sent to browser
DEBUG - 2018-09-16 09:55:02 --> Total execution time: 1.4499
INFO - 2018-09-16 09:55:32 --> Config Class Initialized
INFO - 2018-09-16 09:55:32 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:55:32 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:55:32 --> Utf8 Class Initialized
INFO - 2018-09-16 09:55:32 --> URI Class Initialized
INFO - 2018-09-16 09:55:32 --> Router Class Initialized
INFO - 2018-09-16 09:55:32 --> Output Class Initialized
INFO - 2018-09-16 09:55:32 --> Security Class Initialized
DEBUG - 2018-09-16 09:55:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:55:32 --> Input Class Initialized
INFO - 2018-09-16 09:55:32 --> Language Class Initialized
INFO - 2018-09-16 09:55:32 --> Loader Class Initialized
INFO - 2018-09-16 09:55:32 --> Helper loaded: url_helper
INFO - 2018-09-16 09:55:32 --> Helper loaded: text_helper
INFO - 2018-09-16 09:55:32 --> Helper loaded: form_helper
INFO - 2018-09-16 09:55:32 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:55:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:55:33 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:55:33 --> Form Validation Class Initialized
INFO - 2018-09-16 09:55:33 --> Controller Class Initialized
INFO - 2018-09-16 09:55:33 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:55:33 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:55:33 --> Helper loaded: security_helper
INFO - 2018-09-16 09:55:34 --> Final output sent to browser
DEBUG - 2018-09-16 09:55:34 --> Total execution time: 1.4572
INFO - 2018-09-16 09:55:35 --> Config Class Initialized
INFO - 2018-09-16 09:55:35 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:55:35 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:55:35 --> Utf8 Class Initialized
INFO - 2018-09-16 09:55:36 --> URI Class Initialized
INFO - 2018-09-16 09:55:36 --> Router Class Initialized
INFO - 2018-09-16 09:55:36 --> Output Class Initialized
INFO - 2018-09-16 09:55:36 --> Security Class Initialized
DEBUG - 2018-09-16 09:55:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:55:36 --> Input Class Initialized
INFO - 2018-09-16 09:55:36 --> Language Class Initialized
INFO - 2018-09-16 09:55:36 --> Loader Class Initialized
INFO - 2018-09-16 09:55:36 --> Helper loaded: url_helper
INFO - 2018-09-16 09:55:36 --> Helper loaded: text_helper
INFO - 2018-09-16 09:55:36 --> Helper loaded: form_helper
INFO - 2018-09-16 09:55:36 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:55:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:55:37 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:55:37 --> Form Validation Class Initialized
INFO - 2018-09-16 09:55:37 --> Controller Class Initialized
INFO - 2018-09-16 09:55:37 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:55:37 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:55:37 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:55:37 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:55:37 --> Final output sent to browser
DEBUG - 2018-09-16 09:55:37 --> Total execution time: 1.3347
INFO - 2018-09-16 09:55:37 --> Config Class Initialized
INFO - 2018-09-16 09:55:37 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:55:37 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:55:37 --> Utf8 Class Initialized
INFO - 2018-09-16 09:55:37 --> URI Class Initialized
INFO - 2018-09-16 09:55:37 --> Router Class Initialized
INFO - 2018-09-16 09:55:37 --> Output Class Initialized
INFO - 2018-09-16 09:55:37 --> Security Class Initialized
DEBUG - 2018-09-16 09:55:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:55:37 --> Input Class Initialized
INFO - 2018-09-16 09:55:37 --> Language Class Initialized
INFO - 2018-09-16 09:55:37 --> Loader Class Initialized
INFO - 2018-09-16 09:55:37 --> Helper loaded: url_helper
INFO - 2018-09-16 09:55:37 --> Helper loaded: text_helper
INFO - 2018-09-16 09:55:37 --> Helper loaded: form_helper
INFO - 2018-09-16 09:55:38 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:55:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:55:38 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:55:38 --> Form Validation Class Initialized
INFO - 2018-09-16 09:55:38 --> Controller Class Initialized
INFO - 2018-09-16 09:55:38 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:55:38 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:55:38 --> Helper loaded: security_helper
INFO - 2018-09-16 09:55:39 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:55:39 --> Final output sent to browser
DEBUG - 2018-09-16 09:55:39 --> Total execution time: 1.6015
INFO - 2018-09-16 09:55:40 --> Config Class Initialized
INFO - 2018-09-16 09:55:40 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:55:40 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:55:40 --> Utf8 Class Initialized
INFO - 2018-09-16 09:55:40 --> URI Class Initialized
INFO - 2018-09-16 09:55:40 --> Router Class Initialized
INFO - 2018-09-16 09:55:40 --> Output Class Initialized
INFO - 2018-09-16 09:55:40 --> Security Class Initialized
DEBUG - 2018-09-16 09:55:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:55:40 --> Input Class Initialized
INFO - 2018-09-16 09:55:40 --> Language Class Initialized
INFO - 2018-09-16 09:55:40 --> Loader Class Initialized
INFO - 2018-09-16 09:55:40 --> Helper loaded: url_helper
INFO - 2018-09-16 09:55:40 --> Helper loaded: text_helper
INFO - 2018-09-16 09:55:40 --> Helper loaded: form_helper
INFO - 2018-09-16 09:55:40 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:55:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:55:41 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:55:41 --> Form Validation Class Initialized
INFO - 2018-09-16 09:55:41 --> Controller Class Initialized
INFO - 2018-09-16 09:55:41 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:55:41 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:55:41 --> Helper loaded: security_helper
INFO - 2018-09-16 09:55:41 --> Final output sent to browser
DEBUG - 2018-09-16 09:55:41 --> Total execution time: 1.5726
INFO - 2018-09-16 09:57:12 --> Config Class Initialized
INFO - 2018-09-16 09:57:12 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:57:12 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:57:12 --> Utf8 Class Initialized
INFO - 2018-09-16 09:57:12 --> URI Class Initialized
INFO - 2018-09-16 09:57:12 --> Router Class Initialized
INFO - 2018-09-16 09:57:12 --> Output Class Initialized
INFO - 2018-09-16 09:57:12 --> Security Class Initialized
DEBUG - 2018-09-16 09:57:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:57:12 --> Input Class Initialized
INFO - 2018-09-16 09:57:12 --> Language Class Initialized
INFO - 2018-09-16 09:57:12 --> Loader Class Initialized
INFO - 2018-09-16 09:57:13 --> Helper loaded: url_helper
INFO - 2018-09-16 09:57:13 --> Helper loaded: text_helper
INFO - 2018-09-16 09:57:13 --> Helper loaded: form_helper
INFO - 2018-09-16 09:57:13 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:57:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:57:13 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:57:13 --> Form Validation Class Initialized
INFO - 2018-09-16 09:57:13 --> Controller Class Initialized
INFO - 2018-09-16 09:57:14 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 09:57:14 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 09:57:14 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 09:57:14 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 09:57:14 --> Final output sent to browser
DEBUG - 2018-09-16 09:57:14 --> Total execution time: 1.3911
INFO - 2018-09-16 09:57:14 --> Config Class Initialized
INFO - 2018-09-16 09:57:14 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:57:14 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:57:14 --> Utf8 Class Initialized
INFO - 2018-09-16 09:57:14 --> URI Class Initialized
INFO - 2018-09-16 09:57:14 --> Router Class Initialized
INFO - 2018-09-16 09:57:14 --> Output Class Initialized
INFO - 2018-09-16 09:57:14 --> Security Class Initialized
DEBUG - 2018-09-16 09:57:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:57:14 --> Input Class Initialized
INFO - 2018-09-16 09:57:14 --> Language Class Initialized
INFO - 2018-09-16 09:57:14 --> Loader Class Initialized
INFO - 2018-09-16 09:57:14 --> Helper loaded: url_helper
INFO - 2018-09-16 09:57:14 --> Helper loaded: text_helper
INFO - 2018-09-16 09:57:14 --> Helper loaded: form_helper
INFO - 2018-09-16 09:57:14 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:57:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:57:15 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:57:15 --> Form Validation Class Initialized
INFO - 2018-09-16 09:57:15 --> Controller Class Initialized
INFO - 2018-09-16 09:57:15 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:57:15 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:57:15 --> Helper loaded: security_helper
INFO - 2018-09-16 09:57:16 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 09:57:16 --> Final output sent to browser
DEBUG - 2018-09-16 09:57:16 --> Total execution time: 1.6593
INFO - 2018-09-16 09:57:17 --> Config Class Initialized
INFO - 2018-09-16 09:57:17 --> Hooks Class Initialized
DEBUG - 2018-09-16 09:57:17 --> UTF-8 Support Enabled
INFO - 2018-09-16 09:57:17 --> Utf8 Class Initialized
INFO - 2018-09-16 09:57:17 --> URI Class Initialized
INFO - 2018-09-16 09:57:17 --> Router Class Initialized
INFO - 2018-09-16 09:57:17 --> Output Class Initialized
INFO - 2018-09-16 09:57:17 --> Security Class Initialized
DEBUG - 2018-09-16 09:57:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 09:57:17 --> Input Class Initialized
INFO - 2018-09-16 09:57:17 --> Language Class Initialized
INFO - 2018-09-16 09:57:17 --> Loader Class Initialized
INFO - 2018-09-16 09:57:17 --> Helper loaded: url_helper
INFO - 2018-09-16 09:57:17 --> Helper loaded: text_helper
INFO - 2018-09-16 09:57:17 --> Helper loaded: form_helper
INFO - 2018-09-16 09:57:17 --> Database Driver Class Initialized
DEBUG - 2018-09-16 09:57:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 09:57:18 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 09:57:18 --> Form Validation Class Initialized
INFO - 2018-09-16 09:57:18 --> Controller Class Initialized
INFO - 2018-09-16 09:57:18 --> Model "Data_model" initialized
DEBUG - 2018-09-16 09:57:18 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 09:57:18 --> Helper loaded: security_helper
INFO - 2018-09-16 09:57:19 --> Final output sent to browser
DEBUG - 2018-09-16 09:57:19 --> Total execution time: 1.8473
INFO - 2018-09-16 10:00:34 --> Config Class Initialized
INFO - 2018-09-16 10:00:34 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:00:34 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:00:34 --> Utf8 Class Initialized
INFO - 2018-09-16 10:00:34 --> URI Class Initialized
INFO - 2018-09-16 10:00:34 --> Router Class Initialized
INFO - 2018-09-16 10:00:34 --> Output Class Initialized
INFO - 2018-09-16 10:00:34 --> Security Class Initialized
DEBUG - 2018-09-16 10:00:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:00:34 --> Input Class Initialized
INFO - 2018-09-16 10:00:34 --> Language Class Initialized
INFO - 2018-09-16 10:00:34 --> Loader Class Initialized
INFO - 2018-09-16 10:00:34 --> Helper loaded: url_helper
INFO - 2018-09-16 10:00:34 --> Helper loaded: text_helper
INFO - 2018-09-16 10:00:34 --> Helper loaded: form_helper
INFO - 2018-09-16 10:00:34 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:00:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:00:35 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:00:35 --> Form Validation Class Initialized
INFO - 2018-09-16 10:00:35 --> Controller Class Initialized
INFO - 2018-09-16 10:00:35 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 10:00:35 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 10:00:35 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 10:00:35 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 10:00:35 --> Final output sent to browser
DEBUG - 2018-09-16 10:00:36 --> Total execution time: 1.5413
INFO - 2018-09-16 10:00:36 --> Config Class Initialized
INFO - 2018-09-16 10:00:36 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:00:36 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:00:36 --> Utf8 Class Initialized
INFO - 2018-09-16 10:00:36 --> URI Class Initialized
INFO - 2018-09-16 10:00:36 --> Router Class Initialized
INFO - 2018-09-16 10:00:36 --> Output Class Initialized
INFO - 2018-09-16 10:00:36 --> Security Class Initialized
DEBUG - 2018-09-16 10:00:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:00:36 --> Input Class Initialized
INFO - 2018-09-16 10:00:36 --> Language Class Initialized
INFO - 2018-09-16 10:00:36 --> Loader Class Initialized
INFO - 2018-09-16 10:00:36 --> Helper loaded: url_helper
INFO - 2018-09-16 10:00:36 --> Helper loaded: text_helper
INFO - 2018-09-16 10:00:36 --> Helper loaded: form_helper
INFO - 2018-09-16 10:00:36 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:00:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:00:37 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:00:37 --> Form Validation Class Initialized
INFO - 2018-09-16 10:00:37 --> Controller Class Initialized
INFO - 2018-09-16 10:00:37 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:00:37 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:00:37 --> Helper loaded: security_helper
INFO - 2018-09-16 10:00:38 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 10:00:38 --> Final output sent to browser
DEBUG - 2018-09-16 10:00:38 --> Total execution time: 1.7486
INFO - 2018-09-16 10:00:39 --> Config Class Initialized
INFO - 2018-09-16 10:00:39 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:00:39 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:00:39 --> Utf8 Class Initialized
INFO - 2018-09-16 10:00:39 --> URI Class Initialized
INFO - 2018-09-16 10:00:39 --> Router Class Initialized
INFO - 2018-09-16 10:00:39 --> Output Class Initialized
INFO - 2018-09-16 10:00:39 --> Security Class Initialized
DEBUG - 2018-09-16 10:00:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:00:39 --> Input Class Initialized
INFO - 2018-09-16 10:00:39 --> Language Class Initialized
INFO - 2018-09-16 10:00:39 --> Loader Class Initialized
INFO - 2018-09-16 10:00:39 --> Helper loaded: url_helper
INFO - 2018-09-16 10:00:39 --> Helper loaded: text_helper
INFO - 2018-09-16 10:00:39 --> Helper loaded: form_helper
INFO - 2018-09-16 10:00:39 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:00:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:00:40 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:00:40 --> Form Validation Class Initialized
INFO - 2018-09-16 10:00:40 --> Controller Class Initialized
INFO - 2018-09-16 10:00:40 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:00:40 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:00:40 --> Helper loaded: security_helper
INFO - 2018-09-16 10:00:40 --> Final output sent to browser
DEBUG - 2018-09-16 10:00:40 --> Total execution time: 1.4863
INFO - 2018-09-16 10:00:54 --> Config Class Initialized
INFO - 2018-09-16 10:00:54 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:00:54 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:00:55 --> Utf8 Class Initialized
INFO - 2018-09-16 10:00:55 --> URI Class Initialized
INFO - 2018-09-16 10:00:55 --> Router Class Initialized
INFO - 2018-09-16 10:00:55 --> Output Class Initialized
INFO - 2018-09-16 10:00:55 --> Security Class Initialized
DEBUG - 2018-09-16 10:00:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:00:55 --> Input Class Initialized
INFO - 2018-09-16 10:00:55 --> Language Class Initialized
INFO - 2018-09-16 10:00:55 --> Loader Class Initialized
INFO - 2018-09-16 10:00:55 --> Helper loaded: url_helper
INFO - 2018-09-16 10:00:55 --> Helper loaded: text_helper
INFO - 2018-09-16 10:00:55 --> Helper loaded: form_helper
INFO - 2018-09-16 10:00:55 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:00:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:00:56 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:00:56 --> Form Validation Class Initialized
INFO - 2018-09-16 10:00:56 --> Controller Class Initialized
INFO - 2018-09-16 10:00:56 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 10:00:56 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 10:00:56 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 10:00:56 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 10:00:56 --> Final output sent to browser
DEBUG - 2018-09-16 10:00:56 --> Total execution time: 1.3565
INFO - 2018-09-16 10:00:56 --> Config Class Initialized
INFO - 2018-09-16 10:00:56 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:00:56 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:00:56 --> Utf8 Class Initialized
INFO - 2018-09-16 10:00:56 --> URI Class Initialized
INFO - 2018-09-16 10:00:56 --> Router Class Initialized
INFO - 2018-09-16 10:00:56 --> Output Class Initialized
INFO - 2018-09-16 10:00:56 --> Security Class Initialized
DEBUG - 2018-09-16 10:00:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:00:56 --> Input Class Initialized
INFO - 2018-09-16 10:00:56 --> Language Class Initialized
INFO - 2018-09-16 10:00:56 --> Loader Class Initialized
INFO - 2018-09-16 10:00:56 --> Helper loaded: url_helper
INFO - 2018-09-16 10:00:57 --> Helper loaded: text_helper
INFO - 2018-09-16 10:00:57 --> Helper loaded: form_helper
INFO - 2018-09-16 10:00:57 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:00:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:00:57 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:00:57 --> Form Validation Class Initialized
INFO - 2018-09-16 10:00:57 --> Controller Class Initialized
INFO - 2018-09-16 10:00:57 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:00:57 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:00:57 --> Helper loaded: security_helper
INFO - 2018-09-16 10:00:58 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 10:00:58 --> Final output sent to browser
DEBUG - 2018-09-16 10:00:58 --> Total execution time: 1.5943
INFO - 2018-09-16 10:00:59 --> Config Class Initialized
INFO - 2018-09-16 10:00:59 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:00:59 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:00:59 --> Utf8 Class Initialized
INFO - 2018-09-16 10:00:59 --> URI Class Initialized
INFO - 2018-09-16 10:00:59 --> Router Class Initialized
INFO - 2018-09-16 10:00:59 --> Output Class Initialized
INFO - 2018-09-16 10:00:59 --> Security Class Initialized
DEBUG - 2018-09-16 10:00:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:00:59 --> Input Class Initialized
INFO - 2018-09-16 10:00:59 --> Language Class Initialized
INFO - 2018-09-16 10:00:59 --> Loader Class Initialized
INFO - 2018-09-16 10:00:59 --> Helper loaded: url_helper
INFO - 2018-09-16 10:01:00 --> Helper loaded: text_helper
INFO - 2018-09-16 10:01:00 --> Helper loaded: form_helper
INFO - 2018-09-16 10:01:00 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:01:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:01:00 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:01:01 --> Form Validation Class Initialized
INFO - 2018-09-16 10:01:01 --> Controller Class Initialized
INFO - 2018-09-16 10:01:01 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:01:01 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:01:01 --> Helper loaded: security_helper
INFO - 2018-09-16 10:01:01 --> Final output sent to browser
DEBUG - 2018-09-16 10:01:01 --> Total execution time: 1.7066
INFO - 2018-09-16 10:01:45 --> Config Class Initialized
INFO - 2018-09-16 10:01:45 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:01:45 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:01:45 --> Utf8 Class Initialized
INFO - 2018-09-16 10:01:45 --> URI Class Initialized
INFO - 2018-09-16 10:01:45 --> Router Class Initialized
INFO - 2018-09-16 10:01:45 --> Output Class Initialized
INFO - 2018-09-16 10:01:45 --> Security Class Initialized
DEBUG - 2018-09-16 10:01:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:01:45 --> Input Class Initialized
INFO - 2018-09-16 10:01:45 --> Language Class Initialized
INFO - 2018-09-16 10:01:45 --> Loader Class Initialized
INFO - 2018-09-16 10:01:45 --> Helper loaded: url_helper
INFO - 2018-09-16 10:01:45 --> Helper loaded: text_helper
INFO - 2018-09-16 10:01:45 --> Helper loaded: form_helper
INFO - 2018-09-16 10:01:45 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:01:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:01:46 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:01:46 --> Form Validation Class Initialized
INFO - 2018-09-16 10:01:46 --> Controller Class Initialized
INFO - 2018-09-16 10:01:46 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 10:01:46 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 10:01:46 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 10:01:46 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 10:01:46 --> Final output sent to browser
DEBUG - 2018-09-16 10:01:46 --> Total execution time: 1.3618
INFO - 2018-09-16 10:01:46 --> Config Class Initialized
INFO - 2018-09-16 10:01:46 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:01:46 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:01:46 --> Utf8 Class Initialized
INFO - 2018-09-16 10:01:46 --> URI Class Initialized
INFO - 2018-09-16 10:01:46 --> Router Class Initialized
INFO - 2018-09-16 10:01:47 --> Output Class Initialized
INFO - 2018-09-16 10:01:47 --> Security Class Initialized
DEBUG - 2018-09-16 10:01:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:01:47 --> Input Class Initialized
INFO - 2018-09-16 10:01:47 --> Language Class Initialized
INFO - 2018-09-16 10:01:47 --> Loader Class Initialized
INFO - 2018-09-16 10:01:47 --> Helper loaded: url_helper
INFO - 2018-09-16 10:01:47 --> Helper loaded: text_helper
INFO - 2018-09-16 10:01:47 --> Helper loaded: form_helper
INFO - 2018-09-16 10:01:47 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:01:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:01:48 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:01:48 --> Form Validation Class Initialized
INFO - 2018-09-16 10:01:48 --> Controller Class Initialized
INFO - 2018-09-16 10:01:48 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:01:48 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:01:48 --> Helper loaded: security_helper
INFO - 2018-09-16 10:01:48 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 10:01:48 --> Final output sent to browser
DEBUG - 2018-09-16 10:01:48 --> Total execution time: 1.7326
INFO - 2018-09-16 10:01:49 --> Config Class Initialized
INFO - 2018-09-16 10:01:49 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:01:49 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:01:49 --> Utf8 Class Initialized
INFO - 2018-09-16 10:01:49 --> URI Class Initialized
INFO - 2018-09-16 10:01:49 --> Router Class Initialized
INFO - 2018-09-16 10:01:49 --> Output Class Initialized
INFO - 2018-09-16 10:01:49 --> Security Class Initialized
DEBUG - 2018-09-16 10:01:49 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:01:49 --> Input Class Initialized
INFO - 2018-09-16 10:01:49 --> Language Class Initialized
INFO - 2018-09-16 10:01:49 --> Loader Class Initialized
INFO - 2018-09-16 10:01:49 --> Helper loaded: url_helper
INFO - 2018-09-16 10:01:49 --> Helper loaded: text_helper
INFO - 2018-09-16 10:01:49 --> Helper loaded: form_helper
INFO - 2018-09-16 10:01:49 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:01:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:01:50 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:01:50 --> Form Validation Class Initialized
INFO - 2018-09-16 10:01:50 --> Controller Class Initialized
INFO - 2018-09-16 10:01:50 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:01:50 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:01:50 --> Helper loaded: security_helper
INFO - 2018-09-16 10:01:51 --> Final output sent to browser
DEBUG - 2018-09-16 10:01:51 --> Total execution time: 1.5538
INFO - 2018-09-16 10:02:13 --> Config Class Initialized
INFO - 2018-09-16 10:02:13 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:02:13 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:02:13 --> Utf8 Class Initialized
INFO - 2018-09-16 10:02:13 --> URI Class Initialized
INFO - 2018-09-16 10:02:13 --> Router Class Initialized
INFO - 2018-09-16 10:02:13 --> Output Class Initialized
INFO - 2018-09-16 10:02:13 --> Security Class Initialized
DEBUG - 2018-09-16 10:02:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:02:13 --> Input Class Initialized
INFO - 2018-09-16 10:02:13 --> Language Class Initialized
INFO - 2018-09-16 10:02:13 --> Loader Class Initialized
INFO - 2018-09-16 10:02:13 --> Helper loaded: url_helper
INFO - 2018-09-16 10:02:13 --> Helper loaded: text_helper
INFO - 2018-09-16 10:02:13 --> Helper loaded: form_helper
INFO - 2018-09-16 10:02:13 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:02:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:02:14 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:02:14 --> Form Validation Class Initialized
INFO - 2018-09-16 10:02:14 --> Controller Class Initialized
INFO - 2018-09-16 10:02:14 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 10:02:14 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 10:02:14 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 10:02:14 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 10:02:14 --> Final output sent to browser
DEBUG - 2018-09-16 10:02:14 --> Total execution time: 1.3453
INFO - 2018-09-16 10:02:14 --> Config Class Initialized
INFO - 2018-09-16 10:02:14 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:02:14 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:02:15 --> Utf8 Class Initialized
INFO - 2018-09-16 10:02:15 --> URI Class Initialized
INFO - 2018-09-16 10:02:15 --> Router Class Initialized
INFO - 2018-09-16 10:02:15 --> Output Class Initialized
INFO - 2018-09-16 10:02:15 --> Security Class Initialized
DEBUG - 2018-09-16 10:02:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:02:15 --> Input Class Initialized
INFO - 2018-09-16 10:02:15 --> Language Class Initialized
INFO - 2018-09-16 10:02:15 --> Loader Class Initialized
INFO - 2018-09-16 10:02:15 --> Helper loaded: url_helper
INFO - 2018-09-16 10:02:15 --> Helper loaded: text_helper
INFO - 2018-09-16 10:02:15 --> Helper loaded: form_helper
INFO - 2018-09-16 10:02:15 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:02:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:02:16 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:02:16 --> Form Validation Class Initialized
INFO - 2018-09-16 10:02:16 --> Controller Class Initialized
INFO - 2018-09-16 10:02:16 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:02:16 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:02:16 --> Helper loaded: security_helper
INFO - 2018-09-16 10:02:16 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 10:02:16 --> Final output sent to browser
DEBUG - 2018-09-16 10:02:16 --> Total execution time: 1.6640
INFO - 2018-09-16 10:02:17 --> Config Class Initialized
INFO - 2018-09-16 10:02:17 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:02:17 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:02:17 --> Utf8 Class Initialized
INFO - 2018-09-16 10:02:17 --> URI Class Initialized
INFO - 2018-09-16 10:02:17 --> Router Class Initialized
INFO - 2018-09-16 10:02:17 --> Output Class Initialized
INFO - 2018-09-16 10:02:17 --> Security Class Initialized
DEBUG - 2018-09-16 10:02:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:02:17 --> Input Class Initialized
INFO - 2018-09-16 10:02:18 --> Language Class Initialized
INFO - 2018-09-16 10:02:18 --> Loader Class Initialized
INFO - 2018-09-16 10:02:18 --> Helper loaded: url_helper
INFO - 2018-09-16 10:02:18 --> Helper loaded: text_helper
INFO - 2018-09-16 10:02:18 --> Helper loaded: form_helper
INFO - 2018-09-16 10:02:18 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:02:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:02:18 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:02:19 --> Form Validation Class Initialized
INFO - 2018-09-16 10:02:19 --> Controller Class Initialized
INFO - 2018-09-16 10:02:19 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:02:19 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:02:19 --> Helper loaded: security_helper
INFO - 2018-09-16 10:02:19 --> Final output sent to browser
DEBUG - 2018-09-16 10:02:19 --> Total execution time: 1.5151
INFO - 2018-09-16 10:05:54 --> Config Class Initialized
INFO - 2018-09-16 10:05:54 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:05:55 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:05:55 --> Utf8 Class Initialized
INFO - 2018-09-16 10:05:55 --> URI Class Initialized
INFO - 2018-09-16 10:05:55 --> Router Class Initialized
INFO - 2018-09-16 10:05:55 --> Output Class Initialized
INFO - 2018-09-16 10:05:55 --> Security Class Initialized
DEBUG - 2018-09-16 10:05:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:05:55 --> Input Class Initialized
INFO - 2018-09-16 10:05:55 --> Language Class Initialized
INFO - 2018-09-16 10:05:55 --> Loader Class Initialized
INFO - 2018-09-16 10:05:55 --> Helper loaded: url_helper
INFO - 2018-09-16 10:05:55 --> Helper loaded: text_helper
INFO - 2018-09-16 10:05:55 --> Helper loaded: form_helper
INFO - 2018-09-16 10:05:55 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:05:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:05:56 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:05:56 --> Form Validation Class Initialized
INFO - 2018-09-16 10:05:56 --> Controller Class Initialized
INFO - 2018-09-16 10:05:56 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 10:05:56 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 10:05:56 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 10:05:56 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 10:05:56 --> Final output sent to browser
DEBUG - 2018-09-16 10:05:56 --> Total execution time: 1.5089
INFO - 2018-09-16 10:05:56 --> Config Class Initialized
INFO - 2018-09-16 10:05:56 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:05:56 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:05:56 --> Utf8 Class Initialized
INFO - 2018-09-16 10:05:56 --> URI Class Initialized
INFO - 2018-09-16 10:05:56 --> Router Class Initialized
INFO - 2018-09-16 10:05:56 --> Output Class Initialized
INFO - 2018-09-16 10:05:56 --> Security Class Initialized
DEBUG - 2018-09-16 10:05:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:05:57 --> Input Class Initialized
INFO - 2018-09-16 10:05:57 --> Language Class Initialized
INFO - 2018-09-16 10:05:57 --> Loader Class Initialized
INFO - 2018-09-16 10:05:57 --> Helper loaded: url_helper
INFO - 2018-09-16 10:05:57 --> Helper loaded: text_helper
INFO - 2018-09-16 10:05:57 --> Helper loaded: form_helper
INFO - 2018-09-16 10:05:57 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:05:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:05:58 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:05:58 --> Form Validation Class Initialized
INFO - 2018-09-16 10:05:58 --> Controller Class Initialized
INFO - 2018-09-16 10:05:58 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:05:58 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:05:58 --> Helper loaded: security_helper
INFO - 2018-09-16 10:05:58 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 10:05:58 --> Final output sent to browser
DEBUG - 2018-09-16 10:05:58 --> Total execution time: 1.7813
INFO - 2018-09-16 10:06:00 --> Config Class Initialized
INFO - 2018-09-16 10:06:00 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:06:00 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:06:00 --> Utf8 Class Initialized
INFO - 2018-09-16 10:06:00 --> URI Class Initialized
INFO - 2018-09-16 10:06:00 --> Router Class Initialized
INFO - 2018-09-16 10:06:00 --> Output Class Initialized
INFO - 2018-09-16 10:06:00 --> Security Class Initialized
DEBUG - 2018-09-16 10:06:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:06:00 --> Input Class Initialized
INFO - 2018-09-16 10:06:00 --> Language Class Initialized
INFO - 2018-09-16 10:06:00 --> Loader Class Initialized
INFO - 2018-09-16 10:06:00 --> Helper loaded: url_helper
INFO - 2018-09-16 10:06:00 --> Helper loaded: text_helper
INFO - 2018-09-16 10:06:00 --> Helper loaded: form_helper
INFO - 2018-09-16 10:06:00 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:06:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:06:01 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:06:01 --> Form Validation Class Initialized
INFO - 2018-09-16 10:06:01 --> Controller Class Initialized
INFO - 2018-09-16 10:06:01 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:06:01 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:06:01 --> Helper loaded: security_helper
INFO - 2018-09-16 10:06:01 --> Final output sent to browser
DEBUG - 2018-09-16 10:06:01 --> Total execution time: 1.6036
INFO - 2018-09-16 10:07:01 --> Config Class Initialized
INFO - 2018-09-16 10:07:01 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:07:01 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:07:01 --> Utf8 Class Initialized
INFO - 2018-09-16 10:07:01 --> URI Class Initialized
INFO - 2018-09-16 10:07:01 --> Router Class Initialized
INFO - 2018-09-16 10:07:01 --> Output Class Initialized
INFO - 2018-09-16 10:07:01 --> Security Class Initialized
DEBUG - 2018-09-16 10:07:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:07:01 --> Input Class Initialized
INFO - 2018-09-16 10:07:01 --> Language Class Initialized
INFO - 2018-09-16 10:07:01 --> Loader Class Initialized
INFO - 2018-09-16 10:07:01 --> Helper loaded: url_helper
INFO - 2018-09-16 10:07:01 --> Helper loaded: text_helper
INFO - 2018-09-16 10:07:01 --> Helper loaded: form_helper
INFO - 2018-09-16 10:07:01 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:07:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:07:02 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:07:02 --> Form Validation Class Initialized
INFO - 2018-09-16 10:07:02 --> Controller Class Initialized
INFO - 2018-09-16 10:07:02 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 10:07:02 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 10:07:02 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 10:07:02 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 10:07:02 --> Final output sent to browser
DEBUG - 2018-09-16 10:07:02 --> Total execution time: 1.4686
INFO - 2018-09-16 10:07:03 --> Config Class Initialized
INFO - 2018-09-16 10:07:03 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:07:03 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:07:03 --> Utf8 Class Initialized
INFO - 2018-09-16 10:07:03 --> URI Class Initialized
INFO - 2018-09-16 10:07:03 --> Router Class Initialized
INFO - 2018-09-16 10:07:03 --> Output Class Initialized
INFO - 2018-09-16 10:07:03 --> Security Class Initialized
DEBUG - 2018-09-16 10:07:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:07:03 --> Input Class Initialized
INFO - 2018-09-16 10:07:03 --> Language Class Initialized
INFO - 2018-09-16 10:07:03 --> Loader Class Initialized
INFO - 2018-09-16 10:07:03 --> Helper loaded: url_helper
INFO - 2018-09-16 10:07:03 --> Helper loaded: text_helper
INFO - 2018-09-16 10:07:03 --> Helper loaded: form_helper
INFO - 2018-09-16 10:07:03 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:07:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:07:04 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:07:04 --> Form Validation Class Initialized
INFO - 2018-09-16 10:07:04 --> Controller Class Initialized
INFO - 2018-09-16 10:07:04 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:07:04 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:07:04 --> Helper loaded: security_helper
INFO - 2018-09-16 10:07:04 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 10:07:04 --> Final output sent to browser
DEBUG - 2018-09-16 10:07:04 --> Total execution time: 1.7990
INFO - 2018-09-16 10:07:06 --> Config Class Initialized
INFO - 2018-09-16 10:07:06 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:07:06 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:07:06 --> Utf8 Class Initialized
INFO - 2018-09-16 10:07:06 --> URI Class Initialized
INFO - 2018-09-16 10:07:06 --> Router Class Initialized
INFO - 2018-09-16 10:07:06 --> Output Class Initialized
INFO - 2018-09-16 10:07:06 --> Security Class Initialized
DEBUG - 2018-09-16 10:07:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:07:06 --> Input Class Initialized
INFO - 2018-09-16 10:07:06 --> Language Class Initialized
INFO - 2018-09-16 10:07:06 --> Loader Class Initialized
INFO - 2018-09-16 10:07:06 --> Helper loaded: url_helper
INFO - 2018-09-16 10:07:06 --> Helper loaded: text_helper
INFO - 2018-09-16 10:07:06 --> Helper loaded: form_helper
INFO - 2018-09-16 10:07:06 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:07:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:07:07 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:07:07 --> Form Validation Class Initialized
INFO - 2018-09-16 10:07:07 --> Controller Class Initialized
INFO - 2018-09-16 10:07:07 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:07:07 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:07:07 --> Helper loaded: security_helper
INFO - 2018-09-16 10:07:07 --> Final output sent to browser
DEBUG - 2018-09-16 10:07:07 --> Total execution time: 1.5180
INFO - 2018-09-16 10:07:43 --> Config Class Initialized
INFO - 2018-09-16 10:07:43 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:07:43 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:07:43 --> Utf8 Class Initialized
INFO - 2018-09-16 10:07:43 --> URI Class Initialized
INFO - 2018-09-16 10:07:43 --> Router Class Initialized
INFO - 2018-09-16 10:07:43 --> Output Class Initialized
INFO - 2018-09-16 10:07:43 --> Security Class Initialized
DEBUG - 2018-09-16 10:07:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:07:43 --> Input Class Initialized
INFO - 2018-09-16 10:07:43 --> Language Class Initialized
INFO - 2018-09-16 10:07:43 --> Loader Class Initialized
INFO - 2018-09-16 10:07:43 --> Helper loaded: url_helper
INFO - 2018-09-16 10:07:43 --> Helper loaded: text_helper
INFO - 2018-09-16 10:07:43 --> Helper loaded: form_helper
INFO - 2018-09-16 10:07:43 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:07:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:07:44 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:07:44 --> Form Validation Class Initialized
INFO - 2018-09-16 10:07:44 --> Controller Class Initialized
INFO - 2018-09-16 10:07:44 --> File loaded: F:\wamp\www\bank\application\views\global/header.php
INFO - 2018-09-16 10:07:44 --> File loaded: F:\wamp\www\bank\application\views\global/side_nav.php
INFO - 2018-09-16 10:07:44 --> File loaded: F:\wamp\www\bank\application\views\global/footer.php
INFO - 2018-09-16 10:07:44 --> File loaded: F:\wamp\www\bank\application\views\admin/customerprofile.php
INFO - 2018-09-16 10:07:44 --> Final output sent to browser
DEBUG - 2018-09-16 10:07:44 --> Total execution time: 1.3709
INFO - 2018-09-16 10:07:44 --> Config Class Initialized
INFO - 2018-09-16 10:07:44 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:07:44 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:07:44 --> Utf8 Class Initialized
INFO - 2018-09-16 10:07:44 --> URI Class Initialized
INFO - 2018-09-16 10:07:45 --> Router Class Initialized
INFO - 2018-09-16 10:07:45 --> Output Class Initialized
INFO - 2018-09-16 10:07:45 --> Security Class Initialized
DEBUG - 2018-09-16 10:07:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:07:45 --> Input Class Initialized
INFO - 2018-09-16 10:07:45 --> Language Class Initialized
INFO - 2018-09-16 10:07:45 --> Loader Class Initialized
INFO - 2018-09-16 10:07:45 --> Helper loaded: url_helper
INFO - 2018-09-16 10:07:45 --> Helper loaded: text_helper
INFO - 2018-09-16 10:07:45 --> Helper loaded: form_helper
INFO - 2018-09-16 10:07:45 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:07:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:07:46 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:07:46 --> Form Validation Class Initialized
INFO - 2018-09-16 10:07:46 --> Controller Class Initialized
INFO - 2018-09-16 10:07:46 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:07:46 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:07:46 --> Helper loaded: security_helper
INFO - 2018-09-16 10:07:46 --> File loaded: F:\wamp\www\bank\application\views\datafragment/dataTable/CustomerProfile_table.php
INFO - 2018-09-16 10:07:46 --> Final output sent to browser
DEBUG - 2018-09-16 10:07:46 --> Total execution time: 1.6455
INFO - 2018-09-16 10:07:47 --> Config Class Initialized
INFO - 2018-09-16 10:07:47 --> Hooks Class Initialized
DEBUG - 2018-09-16 10:07:47 --> UTF-8 Support Enabled
INFO - 2018-09-16 10:07:47 --> Utf8 Class Initialized
INFO - 2018-09-16 10:07:47 --> URI Class Initialized
INFO - 2018-09-16 10:07:47 --> Router Class Initialized
INFO - 2018-09-16 10:07:47 --> Output Class Initialized
INFO - 2018-09-16 10:07:47 --> Security Class Initialized
DEBUG - 2018-09-16 10:07:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2018-09-16 10:07:47 --> Input Class Initialized
INFO - 2018-09-16 10:07:47 --> Language Class Initialized
INFO - 2018-09-16 10:07:47 --> Loader Class Initialized
INFO - 2018-09-16 10:07:47 --> Helper loaded: url_helper
INFO - 2018-09-16 10:07:47 --> Helper loaded: text_helper
INFO - 2018-09-16 10:07:48 --> Helper loaded: form_helper
INFO - 2018-09-16 10:07:48 --> Database Driver Class Initialized
DEBUG - 2018-09-16 10:07:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2018-09-16 10:07:48 --> Session: Class initialized using 'files' driver.
INFO - 2018-09-16 10:07:48 --> Form Validation Class Initialized
INFO - 2018-09-16 10:07:49 --> Controller Class Initialized
INFO - 2018-09-16 10:07:49 --> Model "Data_model" initialized
DEBUG - 2018-09-16 10:07:49 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2018-09-16 10:07:49 --> Helper loaded: security_helper
INFO - 2018-09-16 10:07:49 --> Final output sent to browser
DEBUG - 2018-09-16 10:07:49 --> Total execution time: 1.7341

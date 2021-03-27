<?php

//Send email
		$email_data['get_studentinfo'] = $get_studentinfo;
		$email_data['full_name'] = $name;
		$body = $this->load->view('schedules/email', $email_data, true);
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => '',
			'smtp_pass' => '',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap'  => TRUE
		);
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('dlp.coordinator@dldchc-badas.org.bd', 'Distance Learning Programme (DLP)');
		
		$this->email->to($get_studentinfo['student_email']); 
		$this->email->subject('End of module exam schedule Available');
		$this->email->set_crlf('\r\n');
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-Type', 'text/html');
		$this->email->message($body); 
		$this->email->send();

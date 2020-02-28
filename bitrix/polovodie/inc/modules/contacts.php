<?

class contacts extends metamodule
{
    function __construct()
    {
        parent::__construct();

        //обязательно указываем наши шаблоны папок
        $this->cTemplates = array(
            'contacts',

        );
        //здесь настраиваем базовый шаблон для каждого шаблона папки, используемого модулем
        $this->moduleWrappers = array(
            'contacts' => 'inner.html',

        );
    }

    function __destruct()
    {
    }

    //базовый метод сайт-модуля
    function content($arParams = array())
    {
        global $control;
        global $config;
        global $sql;
        
        
        $html = $this->sprintt($page, $this->_tplDir() . "contacts.html");
        return $html;
    }
    
    
    function order($arParams = array())
    {
        global $control;
        global $config;
        global $sql;

        
        $cid = 347;
        $page = All::c_data_all($cid, 'contacts');
        $page->site_dir = $config['site_dir'];

        $page->showform = false;
        
        if ($control->oper == 'done') {
            $page->sended = 1;
            $page->showform = true;
        }		
		

		$recaptcha_secret = "6LeVa08UAAAAABgm0yumB1yCsXKiF3zTv-8nSqzt";			
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
		$response = json_decode($response, true);
		

		if ($_POST['fio']) {
			$page->showform = true;
			
			foreach ($_POST as $pkey => $pval) {
				$_POST[$pkey] = htmlspecialchars($pval);
			}

			//if ($_POST['check'] == '') {
			if($response["success"] === true){
				
				$block = array();
				foreach ($_POST as $key => $val) {
					$block[$key] = stripslashes($val);
				}

				$block['date'] = date('Y-m-d');
				$block['ip'] = $_SERVER['REMOTE_ADDR'];
				
				
				$allowed = array('7z', 'csv', 'doc', 'docx', 'gif', 'gz', 'gzip', 'jpeg', 'jpg', 'pdf', 'png', 'rar', 'tar', 'tgz', 'txt', 'xls', 'xlsx', 'zip');

				if (isset($_FILES['file']) && $_FILES['file']['error'] == 0 && in_array(strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)), $allowed) && filesize($_FILES['file']['tmp_name']) <= 20 * 1024 * 1024) {
					$filename_title = substr($_FILES['file']['name'], 0, strrpos($_FILES['file']['name'], "."));
					$filename = date('YmdHi').$control->all->translit($filename_title).substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], "."));
					$block['file'] = 'order/' . $filename;
					move_uploaded_file($_FILES['file']['tmp_name'], $config['DOCUMENT_ROOT'].'files/'.$block['file']);
					$attachment[] = $config['DOCUMENT_ROOT'].'files/'.$block['file'];
					$attachmentname[] = $filename;
				} else {
					$attachment = $attachmentname = null;
				}
				

				$control->all->insert_block('sitemessage', $cid, $block, 1);


				$admin = $sql->one_record("SELECT admin_email FROM prname_sadmin WHERE `admin_name`='admin'");
				$data = new stdClass();
				$data->block = $block;

				$message = $this->sprintt($data, $this->_tplDir() . "mail.html");
				$subject = 'Сообщение с сайта ' . $_SERVER['SERVER_NAME'];
				
				//$control->all->send_mail_from($admin, 'noreply@' . $_SERVER['SERVER_NAME'], $subject, $message, $attachment, $attachmentname);
				
				$mail_admin = explode( ',',$admin);						  
				foreach ($mail_admin as $addr ) {
					$control->all->send_mail_from($addr, 'noreply@' . $_SERVER['SERVER_NAME'], $subject, $message, $attachment, $attachmentname);										  
				}

				$url = $control->all->get_url($cid) . '_adone';
				$url = str_replace('<!--base_url//-->', $config['server_url'], $url);
				header('Location: ' . $url);
				die();

			} else {
				$page->error = 'Неверно введена рекапча';
				$page->post = $_POST;
			}

		}
			
		
        $html = $this->sprintt($page, $this->_tplDir() . "order.html");
        return $html;

    }


// Сюда будут заноситься автодополняемые методы
}

?>
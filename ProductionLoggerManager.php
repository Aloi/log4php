<?php
/* Copyright 2006 - 2007 � Cameron Manderson PTY LTD All Rights Reserved 
 * 
 * No part of this document may be reproduced or copied in any form by any
 * means without the written permission of Cameron Manderson of Cameron Manderson 
 * PTY LTD. The possession and use of this document is subject to the terms 
 * and conditions of a written licence agreement issued by Cameron Manderson PTY 
 * LTD. The terms and conditions in this document, and in any licence 
 * agreement with Cameron Manderson PTY LTD are governed by the laws of Victoria, 
 * Australia. Inquiries regarding this document should be directed to 
 * Cameron Manderson PTY LTD <legals@flintinteractive.com.au>
 * 
 * ProductionLoggerManager.php created on Sep 1, 2007
 * camm
 */

/**
 * LoggerManager
 *
 * TODO: Document class responsibilities 
 *
 * @package 
 * @author camm
 */
class LoggerManager {
	// Variable Declaration
	
	/** Instantiates the class ProductionLoggerManager */
	function getLogger($class) {
		static $log;
		if(empty($log)) $log = new DummyLog();
		return $log;
	}
}


/**
 * ProductionLoggerManager
 *
 * TODO: Document class responsibilities 
 *
 * @package 
 * @author camm
 */
class DummyLog {
    function debug($message) {}
    function info($message) {}
    function error($message) {
    	trigger_error($message, E_USER_ERROR);
    }
    function warn($message) {
        trigger_error($message, E_USER_WARNING);
    }
}
?>
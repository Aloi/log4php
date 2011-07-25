<?php
/* $Id: LoggerAppenderAtEnd.php,v 1.1 2006/12/14 11:07:14 cman Exp $
 * (c)Copyright 2006 Cameron Manderson. All rights reserved.
 * No part of this document may be reproduced or copied in any form by any
 * means without the written permission of Cameron Manderson. The possession
 * and use of this document is subject to the terms and conditions of the
 * written licence agreement issued by Cameron Manderson.
 *   
 * Cameron Manderson does not assume any responsibility for any alteration
 * to, or any error or other deficiency, in this document.
 * 
 * If the licence granted to you to possess and use this document terminates,
 * you must immediately return all copies and extracts of this document in
 * your possession or control to Cameron Manderson, or if Cameron Manderson
 * directs you to do so, you must destroy them and certify in writing to
 * Cameron Manderson that you have done so. 
 *
 * The terms and conditions in this document, and in any licence agreement
 * with Cameron are governed by the laws of Victoria, Australia.
 *
 * A copy of this licence is located online at: 
 * http://www.mink.net.au/legals/MELBDOCS-560728-v3-Consulting-Agreement-1.htm
 * 
 * Inquiries regarding this document should be directed to Cameron Manderson
 * <cam@mink. net.au>
 *
 * Author: cman
 * Date: Nov 14, 2006
 * Created file: LoggerAppenderAtEnd.php
 */

/**
 * @ignore 
 */
if (!defined('LOG4PHP_DIR')) define('LOG4PHP_DIR', dirname(__FILE__) . '/..');
 
/**
 */
require_once(LOG4PHP_DIR . '/LoggerAppenderSkeleton.php');
require_once(LOG4PHP_DIR . '/LoggerLog.php');

/**
 * LoggerAppenderEcho uses {@link PHP_MANUAL#echo echo} function to output events. 
 * 
 * <p>This appender requires a layout.</p>  
 *
 * @author VxR <vxr@vxr.it>
 * @version $Revision: 1.1 $
 * @package log4php
 * @subpackage appenders
 */
class LoggerAppenderAtEnd extends LoggerAppenderSkeleton {

    /**
     * @access private 
     */
    var $requiresLayout = true;

    /**
     * @var boolean used internally to mark first append 
     * @access private 
     */
    var $firstAppend    = true;
    
    var $output = '';
    
    /**
     * Constructor.
     *
     * @param string $name appender name
     */
    function LoggerAppenderAtEnd($name)
    {
        $this->LoggerAppenderSkeleton($name);
    }

    function activateOptions()
    {
        return;
    }
    
    function close()
    {
        if (!$this->firstAppend) {
            echo $this->output;
            echo $this->layout->getFooter();
        }
        $this->closed = true;    
    }

    function append($event)
    {
        LoggerLog::debug("LoggerAppenderEcho::append()");
        
        if ($this->layout !== null) {
            if ($this->firstAppend) {
//                echo $this->layout->getHeader();
				$this->output .= $this->layout->getHeader();
                $this->firstAppend = false;
            }
//            echo $this->layout->format($event);
			$this->output .= $this->layout->format($event);
        } 
    }
}
?>
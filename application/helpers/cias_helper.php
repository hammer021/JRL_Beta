<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.sendgrid.net";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = "apikey";
        $config['smtp_pass'] = "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";
        $config['smtp_crypto'] = "ssl";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI = &get_instance();
        $CI->load->library('email');
        $config['protocol'] = "mail";
        $config['smtp_host'] = "mail.eventios.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = "_mainaccount@eventios.com";
        $config['smtp_pass'] = "aBa1O#35I8aSf+";
        $config['smtp_crypto'] = "ssl";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        $CI = setProtocol();        
        $CI->email->from("_mainaccount@betavers.com", "BetaVers");
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

?>
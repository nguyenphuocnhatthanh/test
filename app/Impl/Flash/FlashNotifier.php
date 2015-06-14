<?php
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/17/2015
 * Time: 10:19 PM
 */

namespace App\Impl\Flash;
use Illuminate\Session\Store as Session;

class FlashNotifier {

    /**
     * @var Session
     */
    protected $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session){
        $this->session = $session;
    }

    public function success($key, $message){
       $this->message($key, $message, 'success');
    }

    public function error($key, $message){
        $this->message($key, $message, 'danger');
    }
    
    /**
     * Create Flash Session
     * @param $key
     * @param $message
     */
    public function message($key, $message, $level = 'info'){
        $this->session->flash($key, $message);
        $this->session->flash('flash.level', $level);
    }
}
<?php
namespace App\Listeners;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 2/15/2015
 * Time: 11:04 PM
 */

class EmailNotifier {
    public function whenUserUpgradedSubscription(){
        $this->emailAdmin();
    }

    private function emailAdmin() {
        var_dump('emailing the admin');
    }
}
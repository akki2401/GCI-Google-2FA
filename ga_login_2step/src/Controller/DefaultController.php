<?php /**
 * @file
 * Contains \Drupal\ga_login_2step\Controller\DefaultController.
 */

namespace Drupal\ga_login_2step\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Default controller for the ga_login_2step module.
 */
class DefaultController extends ControllerBase {

  public function ga_login_2step_entry_access(Drupal\Core\Session\AccountInterface $account, $url_hash) {
    $access = FALSE;
    // Generate a hash for this account.
    $hash = ga_login_2step_login_hash($account);
    $access = $hash === $url_hash;
    return $access;
  }

  public function ga_login_2step_begin_form(\Drupal\user\UserInterface $account) {
    return \Drupal::formBuilder()->getForm('ga_login_2step_form', $account);
  }

}

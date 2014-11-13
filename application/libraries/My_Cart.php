<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Cart extends CI_Cart {

  public function __construct() {
    parent::__construct();
  }

  public function insertOrUpdate($items = array()) {

    if (!is_array($items) OR count($items) == 0) {
      log_message('error', 'The insertOrUpdate method must be passed an array containing data.');
      return FALSE;
    }

    $save_cart = FALSE;
    if (isset($items['id'])) {
      if (($rowid = $this->_insertOrUpdate($items))) {
        $save_cart = TRUE;
      }
    } else {
      foreach ($items as $val) {
        if (is_array($val) AND isset($val['id'])) {
          if ($this->_insertOrUpdate($val)) {
            $save_cart = TRUE;
          }
        }
      }
    }

    // Save the cart data if the insert was successful
    if ($save_cart == TRUE) {
      $this->_save_cart();
      return isset($rowid) ? $rowid : TRUE;
    }

    return FALSE;

  }

  private function _insertOrUpdate($item) {
    $contents = $this->contents();
    $rowid = $this->getRowId($item['id']);

    if ($rowid == FALSE) {
      return $this->insert($item);

    } else {
      $newqty = $contents[$rowid]['qty'] + $item['qty'];
      $data = array(
        'rowid' => $rowid,
        'qty'   => $newqty
      );

      return $this->update($data);
    }
  }

  private function hasItem($id) {
    $contents = $this->contents();

    foreach ($contents as $item) {
      if ($item['id'] == $id) {
        return TRUE;
      }
    }

    return FALSE;
  }

  private function getRowId($id) {
    $contents = $this->contents();

    foreach ($contents as $item) {
      if ($item['id'] == $id) {
        return $item['rowid'];
      }
    }

    return FALSE;
  }
}

?>
<?php


namespace Dmkzwo\FormAutoreply;


/**
 * Class AutoreplyHelper
 *
 * @copyright  DMKZWO 2017
 * @author     Thomas Schabacher
 * @package    FormAutoreply
 */
class AutoreplyHelper extends \System {


  public function __construct() {

    parent::__construct();
    $this->import('Database');

  }


  /**
   * send autoreply email
   * @param array $arrPost
   * @param array $arrForm
   * @param object $form
   */
  public function myProcessFormData($arrPost, $arrForm, &$form) {

    if ($form->dz_add_autoreply) {

      $mailto = $arrPost[$form->dz_autoreply_email_field];
      $mailfrom = $form->dz_autoreply_mailfrom;
      $mailsubject = $form->dz_autoreply_mailsubject;

      $mailtext = $form->dz_autoreply_mailtext;

      if (strlen($mailto) && strlen($mailfrom) && strlen($mailsubject) && strlen($mailtext)) {

        $objEmail = new \Email();
        $objEmail->subject = $this->processPlaceholders($mailsubject, $arrPost);
        $objEmail->from = $mailfrom;
        $objEmail->text = $this->processPlaceholders($mailtext, $arrPost);

        $objEmail->sendTo($mailto);

      }


    }


  }


  /**
   * replace placeholders
   * @param string $text
   * @param array $arrPost
   * @return string
   */
  private function processPlaceholders($text, $arrPost) {

    // find placeholders

    preg_match_all('/(\{\{.*?\}\})/ims', $text, $matches);

    foreach ($matches[0] as $match) {
      $key = trim(str_replace(array('{{', '}}'), array('', ''), $match));
      if (array_key_exists($key, $arrPost)) {
        $value = $arrPost[$key];
        $text = str_replace($match, $value, $text);
      } else {
        $text = str_replace($match, '', $text);
      }
    }

    return $text;
  }



}
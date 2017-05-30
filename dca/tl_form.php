<?php


$GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace(';{store_legend:hide}', ';{dz_autoreply_legend:hide},dz_add_autoreply;{store_legend:hide}', $GLOBALS['TL_DCA']['tl_form']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_form']['palettes']['__selector__'][] = 'dz_add_autoreply';
$GLOBALS['TL_DCA']['tl_form']['subpalettes']['dz_add_autoreply'] = 'dz_autoreply_email_field,dz_autoreply_mailfrom,dz_autoreply_mailsubject,dz_autoreply_mailtext';


$GLOBALS['TL_DCA']['tl_form']['fields']['dz_add_autoreply'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_form']['dz_add_autoreply'],
  'exclude'                 => true,
  'inputType'               => 'checkbox',
  'eval'                    => array('submitOnChange'=>true),
  'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form']['fields']['dz_autoreply_email_field'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_form']['dz_autoreply_email_field'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'search'                  => true,
  'eval'                    => array('mandatory' => true, 'tl_class'=>'clr w50'),
  'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form']['fields']['dz_autoreply_mailfrom'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_form']['dz_autoreply_mailfrom'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'search'                  => true,
  'eval'                    => array('mandatory' => true, 'tl_class'=>'w50'),
  'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form']['fields']['dz_autoreply_mailsubject'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_form']['dz_autoreply_mailsubject'],
  'exclude'                 => true,
  'inputType'               => 'text',
  'search'                  => true,
  'eval'                    => array('mandatory' => true, 'tl_class'=>'clr long'),
  'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form']['fields']['dz_autoreply_mailtext'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_form']['dz_autoreply_mailtext'],
  'exclude'                 => true,
  'inputType'               => 'textarea',
  'search'                  => true,
  'eval'                    => array('mandatory' => true, 'tl_class'=>'clr long'),
  'sql'                     => "text NULL"
);
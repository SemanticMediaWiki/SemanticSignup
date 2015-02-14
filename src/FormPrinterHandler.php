<?php

namespace SES;

use Title;

/**
 * @license GNU GPL v2+
 * @since 1.1
 *
 * @author mwjames
 */
class FormPrinterHandler {

	/**
	 * @var Title|null
	 */
	private $form;

	/**
	 * @var mixed
	 */
	private $formPrinter;

	/**
	 * @var string
	 */
	private $formText = '';

	/**
	 * @var string
	 */
	private $dataText = '';

	/**
	 * @var boolean
	 */
	private $submitState = false;

	/**
	 * @since 1.1
	 */
	public function __construct( Title $form = null, $formPrinter = null ) {
		$this->form = $form;
		$this->formPrinter = $formPrinter;
	}

	/**
	 * @since 1.1
	 *
	 * @return boolean
	 */
	public function canUseForm() {
		return $this->form !== null && $this->form->exists();
	}

	/**
	 * @since 1.1
	 *
	 * @param boolean $submitState
	 */
	public function setSubmitState( $submitState ) {
		$this->submitState = $submitState;
	}

	/**
	 * @since 1.1
	 *
	 * @return string
	 */
	public function getFormText() {

		if ( $this->formText === '' ) {
			$this->createForm();
		}

		return $this->formText;
	}

	/**
	 * @since 1.1
	 *
	 * @return string
	 */
	public function getTemplateText() {

		if ( $this->dataText === '' ) {
			$this->createForm();
		}

		return $this->dataText;
	}

	private function createForm() {

		if ( !$this->canUseForm() || !is_object( $this->formPrinter ) ) {
			return;
		}

		$form = new \Article( $this->form );
		$form_definition = $form->getContent();

		list ( $form_text, $javascript_text, $data_text, $form_page_title, $generated_page_name ) =
			$this->formPrinter->formHTML( $form_definition, $this->submitState, false );

		$this->formText = $form_text;
		$this->dataText = $data_text;
	}

}

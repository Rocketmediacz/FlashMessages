<?php

/**
 * Copyright (c) 2014 David Zadražil (me@davidzadrazil.cz)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Scribe\Addons\FlashMessages;

use Scribe\Application\UI\Control;

/**
 * Class FlashMessagesControl
 *
 * @author David Zadražil <me@davidzadrazil.cz>
 */
class FlashMessagesControl extends Control
{

	/** @var string */
	private $templateFile = NULL;

	/* Translator */
	private $translator;



	/**
	 * @param null $templateFile
	 * @param null $translator
	 */
	public function __construct($templateFile = NULL, $translator = NULL)
	{
		parent::__construct();

		$this->translator = $translator;

		if (!$templateFile) {
			$templateFile = __DIR__ . '/FlashMessagesControl.latte';
		}

		$this->templateFile = $templateFile;
	}



	public function render()
	{
		$flashes = [];
		foreach ($this->parent->template->flashes as $flash) {
			$flashes[] = [
				'message' => isset($this->translator) ? $this->translator->translate($flash->message) : $flash->message,
				'type'    => $flash->type,
			];
		}

		$this->template->flashes = $flashes;
		$this->template->setFile($this->templateFile)->render();
	}

}
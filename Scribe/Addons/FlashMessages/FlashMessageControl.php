<?php

/**
 * Copyright (c) 2014 David Zadražil (me@davidzadrazil.cz)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Scribe\Addons\FlashMessages;

use Kdyby\Translation\Translator;
use Scribe\Application\UI\Control;

/**
 * Class FlashMessageControl
 *
 * @author David Zadražil <me@davidzadrazil.cz>
 */
class FlashMessageControl extends Control
{

	/** @var string */
	private $templateFile = NULL;

	/** @var \Kdyby\Translation\Translator */
	private $translator;



	/**
	 * @param \Kdyby\Translation\Translator $translator
	 * @param null $templateFile
	 */
	public function __construct(Translator $translator, $templateFile = NULL)
	{
		parent::__construct();

		$this->translator = $translator;

		if (!$templateFile) {
			$templateFile = __DIR__ . '/FlashMessageControl.latte';
		}

		$this->templateFile = $templateFile;
	}



	public function render()
	{
		$flashes = [];

		foreach ($this->parent->template->flashes as $flash) {
			$flashes[] = [
				'message' => $this->translator->translate($flash->message), // try to translate
				'type'    => $flash->type,
			];
		}

		$this->template->flashes = $flashes;
		$this->template->setFile($this->templateFile)->render();
	}

}
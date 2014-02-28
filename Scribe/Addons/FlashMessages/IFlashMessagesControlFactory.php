<?php

/**
 * Copyright (c) 2014 David Zadražil (me@davidzadrazil.cz)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Scribe\Addons\FlashMessages;

/**
 * Interface IFlashMessageControlFactory
 *
 * @author David Zadražil <me@davidzadrazil.cz>
 */
interface IFlashMessagesControlFactory
{

	/**
	 * @return FlashMessagesControl
	 */
	public function create();

}
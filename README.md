Quickstart
=============

This simple visual addon help to display and translate flash messages.

## Requirements ##

 - PHP 5.4.0 or higher
 - [Nette Framework 2.1][1]

## Installation ##
The best way is by Composer:
```sh
    $ composer require rocketmedia-cz/flashmessages:dev-master
```
Or you can simple download package and place it to vendor/others folder.

----------
and you must enable addon through your cofing.neon, just put these lines into it
```yms
services:
	flashmessages:
		implement: Scribe\Addons\FlashMessages\IFlashMessagesControlFactory
		parameters: [templateFile, translator]
		arguments: [%templateFile%, %translator%]
```
or if you won't change template file or use translator with magic function throught interface, you can use shorted version
```yms
services:
	flashmessages: Scribe\Addons\FlashMessages\IFlashMessagesControlFactory
```

## Setup ##
In presenter we can use @inject annotation from Nette version 2.1 - 
```php
/** @var \Scribe\Addons\FlashMessages\IFlashMessagesControlFactory @inject */
public $flashMessagesControl;

/**
 * @return \Scribe\Addons\FlashMessages\FlashMessagesControl
 */
protected function createComponentFlashMessages()
{
	return $this->flashMessagesControl->create();
}
```

If we want to change template file or translate our messages, we have to change parameters in *create()* function.
```php
return $this->flashMessagesControl->create('newTemplateFile.latte', $ourTranslator);
```

## Usage ##
Just initialize component in template and it is.
```tpl
{control flashMessages}
```
Default template is in snippet, so you can redraw snippet with flash messages
```php
$this->redrawControl('flashMessages');
```


----------
Created by [David Zadražil][2] for [Rocketmedia.cz][3].


  [1]: https://github.com/nette/nette
  [2]: https://github.com/DavidZadrazil
  [3]: http://rocketmedia.cz
<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2017 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material  is strictly forbidden unless prior   |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     12/03/2018
// Time:     17:02
// Project:  lib-servicemanager
//
declare(strict_types = 1);
namespace CodeInc\Instantiator\Exceptions;
use CodeInc\Instantiator\Instantiator;
use Throwable;


/**
 * Class InterfaceWithoutAliasException
 *
 * @package CodeInc\ServiceManager\Exceptions
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class InterfaceWithoutAliasException extends InstantiatorException {
	/**
	 * InterfaceWithoutAliasException constructor.
	 *
	 * @param string $interface
	 * @param Instantiator $instantiator
	 * @param int|null $code
	 * @param null|Throwable $previous
	 */
	public function __construct(string $interface, Instantiator $instantiator,
		?int $code = null, ?Throwable $previous = null)
	{
		parent::__construct(
			sprintf("Unable to return an instance for the interface (%s), no alias found. "
				."Use %s to map interfaces to classes or use %s to add a service implementing the "
				."requested interface.",
				$interface,
				get_class($instantiator)."::addAlias()",
				get_class($instantiator)."::addInstance()"),
			$instantiator,
			$code,
			$previous
		);
	}
}
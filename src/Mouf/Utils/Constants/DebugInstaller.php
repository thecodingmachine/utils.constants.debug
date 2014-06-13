<?php
/*
 * Copyright (c) 2013 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */
namespace Mouf\Utils\Constants;

use Mouf\Installer\PackageInstallerInterface;
use Mouf\MoufManager;

/**
 * An installer that creates a "DEBUG" constant in your config.php file.
 */
class DebugInstaller implements PackageInstallerInterface {

	/**
	 * (non-PHPdoc)
	 * @see \Mouf\Installer\PackageInstallerInterface::install()
	 */
	public static function install(MoufManager $moufManager) {
		$configManager = $moufManager->getConfigManager();

		$constants = $configManager->getMergedConstants();

		if (!isset($constants['DEBUG'])) {
			$configManager->registerConstant("DEBUG", "bool", true, "Set to true to enable debug/development mode.");
		}

		$configPhpConstants = $configManager->getDefinedConstants();
		$configPhpConstants['DEBUG'] = true;
		$configManager->setDefinedConstants($configPhpConstants);

		// Let's rewrite the MoufComponents.php file to save the component
		$moufManager->rewriteMouf();
	}
}

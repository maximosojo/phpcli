<?php

/**
 * @package    Maximosojo\PHPCli\Common
 *
 * @copyright  Copyright (c) 2015 - 2023 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Maximosojo\PHPCli\Common;

use function function_exists;

/**
 * Class Composer
 * @package Maximosojo\PHPCli\Common
 */
class Git
{
    /** @const Default git location */
    const DEFAULT_PATH = '';

    /**
     * Returns the location of git.
     *
     * @return string
     */
    public static function getGitLocation()
    {
        if (!function_exists('shell_exec') || stripos(PHP_OS, 'win') === 0) {
            return self::DEFAULT_PATH;
        }

        // check for global git pull
        $path = trim((string)shell_exec('command -v git'));

        return $path;
    }

    /**
     * Return the git executable file path
     *
     * @return string
     */
    public static function getGitExecutor()
    {
        $git = static::getGitLocation();

        return $git;
    }
}

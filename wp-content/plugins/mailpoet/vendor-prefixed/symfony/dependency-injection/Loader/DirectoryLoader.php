<?php
 namespace MailPoetVendor\Symfony\Component\DependencyInjection\Loader; if (!defined('ABSPATH')) exit; class DirectoryLoader extends \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\FileLoader { public function load($file, $type = null) { $file = \rtrim($file, '/'); $path = $this->locator->locate($file); $this->container->fileExists($path, \false); foreach (\scandir($path) as $dir) { if ('.' !== $dir[0]) { if (\is_dir($path . '/' . $dir)) { $dir .= '/'; } $this->setCurrentDir($path); $this->import($dir, null, \false, $path); } } } public function supports($resource, $type = null) { if ('directory' === $type) { return \true; } return null === $type && \is_string($resource) && '/' === \substr($resource, -1); } } 
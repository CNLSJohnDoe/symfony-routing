<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Tests\Loader;

abstract class AbstractAnnotationLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function getReader($methods = [])
    {
        $methods = array_unique(array_merge($methods, [
            'getClassAnnotations',
            'getClassAnnotation',
            'getMethodAnnotations',
            'getMethodAnnotation',
            'getPropertyAnnotations',
            'getPropertyAnnotation',
        ]));
        return $this->createPartialMock('Doctrine\Common\Annotations\Reader', $methods);
    }

    public function getClassLoader($reader)
    {
        return $this->getMockBuilder('Symfony\Component\Routing\Loader\AnnotationClassLoader')
            ->setConstructorArgs(array($reader))
            ->getMockForAbstractClass()
        ;
    }
}

<?php
declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2018 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Transformer\Router;

use phpDocumentor\Descriptor\DescriptorAbstract;

/**
 * Object containing a collection of routes.
 */
abstract class RouterAbstract extends \ArrayObject
{
    /**
     * Invokes the configure method.
     */
    public function __construct()
    {
        parent::__construct();

        $this->configure();
    }

    /**
     * Configuration function to add routing rules to a router.
     */
    abstract public function configure();

    /**
     * Tries to match the provided node with one of the rules in this router.
     *
     * @param string|DescriptorAbstract $node
     *
     * @return Rule|null
     */
    public function match($node)
    {
        /** @var Rule $rule */
        foreach ($this as $rule) {
            if ($rule->match($node)) {
                return $rule;
            }
        }

        return null;
    }
}

<?php

namespace Spl;

use Countable,
    IteratorAggregate;

/**
 * The foundational data structure of this library. It contains methods that
 * should be available to all other data structures in this library.
 *
 * If you look at the interfaces that extend Collection, you'll notice that
 * they often take parameters of Traversable instead of array. This was a
 * design choice to focus on objects instead of doing what is convenient. You
 * can always pass in an ArrayIterator instead.
 *
 * Note that Collection does not extend Serializable. This is because all
 * objects can be serialized and unserialized by PHP, and the interface is used
 * only for custom serializing. The final implementations of the data
 * structures in C will extend the Serializable interface.
 */
interface Collection extends Countable, IteratorAggregate /*, \Serializable  */ {

    /**
     * @param $item
     *
     * @return bool
     * @throws TypeException when $item is not the correct type.
     */
    function contains($item);

    /**
     * @return bool
     */
    function isEmpty();

}

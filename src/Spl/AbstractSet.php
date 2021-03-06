<?php

namespace Spl;

abstract class AbstractSet implements Set {
    /**
     * Algorithms such as set difference need to be able to return a new
     * set object that includes any hashing or sorting functions needed but
     * without any data in the structure. This method provides that ability.
     *
     * @return Set
     */
    protected abstract function cloneEmpty();

    /**
     * Creates a set that contains the items in the current set that are not
     * contained in the provided set.
     *
     * Formally:
     * A - B = {x : x ∈ A ∧ x ∉ B}
     *
     * @param Set $that
     * @return Set
     */
    function difference(Set $that) {
        $difference = $this->cloneEmpty();

        if ($that === $this) {
            return $difference;
        }

        foreach ($this as $item) {
            if (!$that->contains($item)) {
                $difference->add($item);
            }
        }

        return $difference;
    }

    /**
     * Creates a new set that contains the items that are in current set that
     * are also contained in the provided set.
     *
     * Formally:
     * A ∩ B = {x : x ∈ A ∧ x ∈ B}
     *
     * @param Set $that
     * @return Set
     */
    function intersection(Set $that) {
        $intersection = $this->cloneEmpty();

        foreach ($this as $item) {
            if ($that->contains($item)) {
                $intersection->add($item);
            }
        }

        return $intersection;
    }

    /**
     * Creates a new set which contains the items that exist in the provided
     * set and do not exist in the current set.
     *
     * Formally:
     * B \ A = {x: x ∈ A ∧ x ∉ B}
     *
     * @param Set $that
     * @return Set
     */
    function relativeComplement(Set $that) {
        $complement = $this->cloneEmpty();

        if ($that === $this) {
            return $complement;
        }

        foreach ($that as $item) {
            if (!$this->contains($item)) {
                $complement->add($item);
            }
        }

        return $complement;
    }

    /**
     * Creates a new set that contains the items of the current set and the
     * items of the provided set.
     *
     * Formally:
     * A ∪ B = {x: x ∈ A ∨ x ∈ B}
     *
     * @param Set $that
     * @return Set
     */
    function union(Set $that) {
        $union = $this->cloneEmpty();

        foreach ($this as $item) {
            $union->add($item);
        }

        if ($that === $this) {
            return $union;
        }

        foreach ($that as $item) {
            $union->add($item);
        }

        return $union;
    }

}

<?php

/**
 * This file is part of HAB OAI Repository.
 *
 * HAB OAI Repository is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * HAB OAI Repository is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with HAB OAI Repository.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    David Maus <david.maus@sub.uni-hamburg.de>
 * @copyright (c) 2017 by Herzog August Bibliothek Wolfenbüttel
 * @license   http://www.gnu.org/licenses/gpl.txt GNU General Public License v3 or higher
 */

namespace HAB\OAI\PMH\Model;

use Iterator;
use ArrayIterator;
use IteratorAggregate;

/**
 * Body of an Identify response.
 *
 * @author    David Maus <david.maus@sub.uni-hamburg.de>
 * @copyright (c) 2017 by Herzog August Bibliothek Wolfenbüttel
 * @license   http://www.gnu.org/licenses/gpl.txt GNU General Public License v3 or higher
 *
 * @template-implements IteratorAggregate<string,mixed>
 */
class Identity implements ResponseBodyInterface, IteratorAggregate
{
    /**
     * Identification properties.
     *
     * @var array<string,?array>
     */
    private $properties = array(
        'repositoryName'    => null,
        'baseURL'           => null,
        'protocolVersion'   => array('2.0'),
        'adminEmail'        => null,
        'earliestDatestamp' => null,
        'deletedRecord'     => null,
        'granularity'       => null,
        'compression'       => null,
        'description'       => null,
    );

    /**
     * {@inheritDoc}
     */
    public function accept (VisitorInterface $visitor) : void
    {
        // @phan-suppress-next-line PhanTypeMismatchArgument
        $visitor->visitIdentity($this);
    }

    /**
     * @return Iterator<string,?array>
     */
    public function getIterator () : Iterator
    {
        $properties = array_filter($this->properties, 'is_array');
        return new ArrayIterator($properties);
    }

    /**
     * @param mixed $value
     */
    public function add (string $name, $value) : void
    {
        if (array_key_exists($name, $this->properties)) {
            if ($this->properties[$name] === null) {
                $this->properties[$name] = array();
            }
            $this->properties[$name][] = $value;
        }
    }

    /**
     * @param mixed $value
     */
    public function __set (string $name, $value) : void
    {
        if (array_key_exists($name, $this->properties)) {
            if (!is_array($value)) {
                $value = array($value);
            }
            $this->properties[$name] = $value;
        }
    }
}

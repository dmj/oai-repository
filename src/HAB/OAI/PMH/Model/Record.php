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
 * @copyright (c) 2016-2019 by Herzog August Bibliothek Wolfenbüttel
 * @license   http://www.gnu.org/licenses/gpl.txt GNU General Public License v3 or higher
 */

namespace HAB\OAI\PMH\Model;

/**
 * Record default implementation.
 *
 * @author    David Maus <david.maus@sub.uni-hamburg.de>
 * @copyright (c) 2016-2019 by Herzog August Bibliothek Wolfenbüttel
 * @license   http://www.gnu.org/licenses/gpl.txt GNU General Public License v3 or higher
 */
class Record implements RecordInterface
{
    /**
     * Header.
     *
     * @var Header
     */
    private $header;

    /**
     * Metadata.
     *
     * @var Metadata
     */
    private $metadata;

    public function __construct (Header $header, Metadata $metadata)
    {
        $this->header = $header;
        $this->metadata = $metadata;
    }

    /**
     * Return header.
     *
     * @return HeaderInterface
     */
    public function getHeader () : HeaderInterface
    {
        return $this->header;
    }

    /**
     * Return metadata.
     *
     * @return Metadata
     */
    public function getMetadata () : Metadata
    {
        return $this->metadata;
    }

    /**
     * {@inheritDoc}
     */
    public function accept (VisitorInterface $visitor) : void
    {
        $visitor->visitRecord($this);
    }
}

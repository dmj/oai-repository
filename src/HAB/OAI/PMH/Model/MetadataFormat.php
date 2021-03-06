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
 * Metadata format default implementation.
 *
 * @author    David Maus <david.maus@sub.uni-hamburg.de>
 * @copyright (c) 2016-2019 by Herzog August Bibliothek Wolfenbüttel
 * @license   http://www.gnu.org/licenses/gpl.txt GNU General Public License v3 or higher
 */
class MetadataFormat implements MetadataFormatInterface
{
    /**
     * Namespace Uri.
     *
     * @var string
     */
    private $namespaceUri;

    /**
     * Schema Uri.
     *
     * @var string
     */
    private $schemaUri;

    /**
     * Prefix.
     *
     * @var string
     */
    private $prefix;

    public function __construct (string $prefix, string $namespaceUri, string $schemaUri)
    {
        $this->prefix = $prefix;
        $this->namespaceUri = $namespaceUri;
        $this->schemaUri = $schemaUri;
    }

    /**
     * Return prefix.
     *
     * @return string
     */
    public function getPrefix () : string
    {
        return $this->prefix;
    }

    /**
     * Return schema uri.
     *
     * @return string
     */
    public function getSchemaUri () : string
    {
        return $this->schemaUri;
    }

    /**
     * Return namespace uri.
     *
     * @return string
     */
    public function getNamespaceUri () : string
    {
        return $this->namespaceUri;
    }

    /**
     * {@inheritDoc}
     */
    public function accept (VisitorInterface $visitor) : void
    {
        $visitor->visitMetadataFormat($this);
    }
}

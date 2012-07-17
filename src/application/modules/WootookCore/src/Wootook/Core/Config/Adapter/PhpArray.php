<?php
/**
 * This file is part of Wootook
 *
 * @license http://www.gnu.org/licenses/agpl-3.0.txt
 * @see http://wootook.org/
 *
 * Copyright (c) 2011-Present, Grégory PLANCHAT <g.planchat@gmail.com>
 * All rights reserved.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *                                --> NOTICE <--
 *  This file is part of the core development branch, changing its contents will
 * make you unable to use the automatic updates manager. Please refer to the
 * documentation for further information about customizing Wootook.
 *
 */

namespace Wootook\Core\Config\Adapter;

use Wootook\Core\Base\Util,
    Wootook\Core\Exception as CoreException;

class PhpArray
    extends Adapter
{
    protected $_ioHelper = null;

    public function __construct($filename = null)
    {
        if ($filename !== null) {
            $this->load($filename);
        }

        $this->_ioHelper = new Util\FileSystem();
    }

    public function load($filename)
    {
        if (!$this->_ioHelper->fileExists($filename)) {
            throw new CoreException\DataAccessException(sprintf('Could not load config file "%s"', $filename));
        }
        $data = $this->_ioHelper->includeFile($filename);

        if (!is_array($data)) {
            throw new CoreException\DataAccessException('Configuration file could not be loaded.');
        }

        $this->_init($data);

        return $this;
    }

    public function save($filename)
    {
        file_put_contents($filename, '<' . '?p' . 'hp return ' . var_export($this->toArray(), true) . ';');

        return $this;
    }
}

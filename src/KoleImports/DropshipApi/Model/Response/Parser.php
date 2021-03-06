<?php
/*
Kole Imports Dropship API Client
Copyright (C) <2013>  <Jesse Reese>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

namespace KoleImports\DropshipApi\Model\Response;

use KoleImports\DropshipApi\Service\Serializer;

class Parser
{
	/**
	* @var response SimpleXMLObject
	*/
	private $response;


	public function toArray($response, $array = array ())
	{
		foreach ((array) $response as $index => $node)
		{
			$array[$index] = (is_object($node)) ? self::toArray($node): $node;
		}

		foreach($array as $item => $value)
		{
			foreach($value as $key)
			{
				$responseArray = json_decode(json_encode($key), true);

				$data = array('response'=>$responseArray);

				return $data;
			}
		}
	}
}

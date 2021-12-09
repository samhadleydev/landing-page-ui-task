<?php

/**
 * RT_WP_Block_Parser
 * Helper object for including dynamic styles into head of the document,
 * with possibilities of extending it.
 *
 * 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package Rishi
 */
class RT_WP_Block_Parser extends WP_Block_Parser
{
	function parse($document)
	{
		$result = parent::parse($document);

		foreach ($result as $index => $first_level_block) {
			$result[$index]['firstLevelBlock'] = true;
		}

		return $result;
	}
}

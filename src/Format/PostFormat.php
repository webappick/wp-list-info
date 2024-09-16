<?php

namespace WebAppick\WPListInfo\Format;


use WebAppick\WPListInfo\Abstracts\FormattingAbstract;
use WebAppick\WPListInfo\Factories\WPListInfo;

/**
 * Class PostFormat
 *
 * @package CTXFeed
 * @subpackage WebAppick\WPListInfo\Formatters
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 *@license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category MyCategory
 */
class PostFormat extends FormattingAbstract {
	
	/**
	 *  Format the data according to the structure
	 *
	 * @param array        $data   Data to be formatted
	 * @param array        $format Output format
	 *
	 * @return mixed
	 */
	public function format( $data, $format) {
		// return the formatted data as [['id' => 1, 'name' => 'Post Title', 'code' => slug, 'image' => thumbnail_url], ...]]
		$formattedList = [];
		
		// If there is no data, return an empty list
		if ( empty( $data ) ) {
			return $formattedList;
		}
		
		// Loop through the list of posts objects
		foreach ( $data as $post_key=> $post ) {
			$postId = $post->ID;           // Post ID
			$postTitle = $post->post_title;         // Post Title
			$postSlug = $post->post_name;      // Post Slug
			$postImage = get_the_post_thumbnail_url($postId);      // Post Image URL
			
			// Add the formatted post to the list
			$formattedList[$post_key] = [
				'id'   => $postId,
				'name' => $postTitle,
				'code' => $postSlug,
				'image' => $postImage,
			];
			
			// If the format is not empty, add the formatted post info to the list.
			if ( ! empty( $format ) ) {
				foreach ($format as $key) {
					$formattedList[$post_key][$key] = WPListInfo::GetInfo($key, $post);
				}
			}
			
		}
		
		return $formattedList;
	}

}
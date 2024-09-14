<?php
/**
 * This class is used to get information about a post.
 *
 * @package WebAppick\WPListInfo\Services
 * @subpackage WebAppick\WPListInfo\Services
 * @category Library
 */

namespace WebAppick\WPListInfo\Services;

use WebAppick\WPListInfo\Abstracts\AbstractInfo;
use WebAppick\WPListInfo\Interfaces\InfoInterface;

/**
 * Class PostInfoService.
 *
 * @package WebAppick\WPListInfo\Services
 * @subpackage WebAppick\WPListInfo\Services
 * @author   Ohidul Islam <wahid0003@gmail.com>
 * @link     https://webappick.com
 * @license  https://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Library
 */
class PostInfoService extends AbstractInfo implements InfoInterface {
	
	/**
	 * Get the information of a post by ID.
	 *
	 * @param int    $id  Post ID.
	 * @param string $key Optional. The key of the information to get. Default is null.
     * @return mixed Information of the post.
	 */
	public function getInfo( $id, $key = null ) {
		// Validate the id or object first.
		if ( ! $this->validate( $id ) ) {
			return null;
		}
		
		// Get the post object.
		$post = $this->getObject( $id, 'post' );
		
		if ( ! $post ) {
			return null;
		}
		
		// Get the post's parent, if any.
		if ( $post->post_parent ) {
			$parent = get_post( $post->post_parent );
		} else {
			$parent = null;
		}
		
		$postInfo = array(
			'post_id'             => $post->ID,
			'post_title'          => $post->post_title,
			'post_slug'           => $post->post_name,
			'post_url'            => get_permalink( $post->ID ),
			'post_status'         => $post->post_status,
			'post_author'         => get_the_author_meta( 'display_name', $post->post_author ),
			'post_date'           => $post->post_date,
			'post_modified_date'  => $post->post_modified,
			'post_excerpt'        => $post->post_excerpt,
			'post_content'        => $post->post_content,
			'post_comment_count'  => $post->comment_count,
			'post_thumbnail_id'   => get_post_thumbnail_id( $post->ID ),
			'post_thumbnail_url'  => get_the_post_thumbnail_url( $post->ID, 'full' ),
			'post_parent_id'      => $post->post_parent,
			'post_parent_title'   => $parent ? $parent->post_title : null,
			'post_parent_url'     => $parent ? get_permalink( $parent->ID ) : null,
			'post_categories'     => wp_get_post_categories( $post->ID ),
			'post_tags'           => wp_get_post_tags( $post->ID, array( 'fields' => 'name' ) ),
			'post_meta'           => get_post_meta( $post->ID ),
			'post_type'           => $post->post_type,
			'post_ping_status'    => $post->ping_status,
			'post_comment_status' => $post->comment_status,
			'post_visibility'     => get_post_status( $post->ID ), // visibility is controlled by post status
		);
		
		// If a specific key is requested, return that.
		if ( ! empty( $key ) ) {
			return $postInfo[ $key ] ?? '';
		}
		
		return $postInfo;
	}

	/**
	 * @inheritDoc
	 */
	public function getKeys() {
		return array(
			'post_id',
			'post_title',
			'post_slug',
			'post_url',
			'post_status',
			'post_author',
			'post_date',
			'post_modified_date',
			'post_excerpt',
			'post_content',
			'post_comment_count',
			'post_thumbnail_id',
			'post_thumbnail_url',
			'post_parent_id',
			'post_parent_title',
			'post_parent_url',
			'post_categories',
			'post_tags',
			'post_meta',
			'post_type',
			'post_ping_status',
			'post_comment_status',
			'post_visibility',
		);
	}

}

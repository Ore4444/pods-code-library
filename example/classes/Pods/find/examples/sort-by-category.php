<?php
/**
 * Output post type Pod, associated with the default taxonomy categories, organized by category.
 */
$pods = pods( 'pod_name', array( 'limit' => -1 ) );

//collect posts by category
if ( $pods->total() > 0 ) {
	while ( $pods->fetch() ) {
		//get post ID
		$id = $pods->ID;

		//get categories
		$category = get_the_category( $id );

		//get first category's name
		$category = $category[ 0 ]->cat_name;

		//put ID and post into categories array
		$categories[ $category ] = array (
			'ID'    => $id,
			'title' => $pods->display( 'post_title' ),
		);

	}
}

//output each category
foreach ( $categories as $category_name => $category ) {

	//output the categroy name
	echo $category_name;

	//loop through items in category
	foreach ( $category as $post ) {

		//output title
		echo $post[ 'title' ];
		//get permalink with get_permalink( $post[ 'ID' ];
	}

}

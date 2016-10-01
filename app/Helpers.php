<?php

namespace App;

use Request;
use App\Post;

class Helpers {

	// protected function getPageNumberForArrows($backOrForward) 
	// {
	// 	if( $backOrForward )
	// 	{
	// 		if( isset($_GET['page']) )
	// 		{
	// 			$currentPageNumber = $_GET['page'];

	// 			return ( $currentPageNumber > 1 ) ? null : $currentPageNumber + 1;
	// 		} else {
	// 			return null;
	// 		}
	// 	} else {
	// 		if( isset($_GET['page']) )
	// 		{
	// 			$currentPageNumber = $_GET['page'];

	// 			return ( $currentPageNumber < 2 ) ? null : $currentPageNumber - 1;
	// 		} else {
	// 			return null;
	// 		}
	// 	}

	// 	return false;
	// }

	static public function pageCounter($page = null)
	{


		if( isset($_GET['page']) )
		{
			$pageNumberFromGet = $_GET['page'];
		} else {
			$pageNumberFromGet = null;
		}
		$totalNumberOfPosts = count(Post::all());
		$pageNumber = 1;
		$staticPageNumber = $page;

		if( $totalNumberOfPosts <= 20 ) {
			return;
		}

	
		echo "<div class='page-navigation'>";
		if ( $staticPageNumber ) {
			echo "<a href='" . Request::path() . "?page=" . ($staticPageNumber - 1) . "'><span class='page-navigation-item'>&laquo;</span></a>";
		} else {

		}

		do {
			if ( $pageNumber != 1 ) {
				echo "<span class='page-navigation-item'>
					 <a href='" . Request::path() . '?' . 'page=' . $pageNumber . "'>

				" . $pageNumber . "</a></span>";

			} else {
				echo "<span class='page-navigation-item page-navigation-item-1'>
				  <a href='" . Request::path() . "'>1</a></span>";
			}

			$totalNumberOfPosts = $totalNumberOfPosts - 20;
			$pageNumber++;

			$page++;

		} while ( $totalNumberOfPosts > 0 );



		if( $page == null )
		{
			echo "<span class='page-navigation-item'>&raquo;</span>";
			echo "</div>";
		} else {
			if( $staticPageNumber == $pageNumber - 1 ) {
				
			} else {
				($staticPageNumber == null) ? $staticPageNumber = 1 : $staticPageNumber = $staticPageNumber;
				echo "<a href='" . Request::path() . "?page=" . ($staticPageNumber + 1) . "'><span class='page-navigation-item'>&raquo;</span></a>";
			    echo "</div>";
			}
		}

	}

}
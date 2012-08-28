<?php
/**
 * Integrate debugging with debug bar plugin.
 *
 * @since 1.0
 * @author Ben Lobaugh
 */

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

add_filter( 'debug_bar_panels', 'contractor_directory_load_debug_bar' );
function contractor_directory_load_debug_bar($panels) {
	if (!class_exists('CONTRACTOR_DIRECTORYDebugBar') && class_exists('Debug_Bar_Panel')) {
		class CONTRACTOR_DIRECTORYDebugBar extends Debug_Bar_Panel {

			private static $debug_log = array();
                        
                        
			
			function init() {
                                // Title to display in left column of debug bar
				$this->title( __('Contractor Directory', CONTRACTOR_DIRECTORY_TEXTDOMAIN) );
                                
                                // Custom styling for the debug bar output
				wp_enqueue_style( 'bl-debug-bar-css', CONTRACTOR_DIRECTORY_PLUGIN_URL . 'css/debug-bar.css' );
                                
                                // Action hook called when new dbug info is submitted
                                add_action( 'contractor_directory_debug', array( &$this, 'logDebug' ), 10, 3 );
                                
			}

			function prerender() {
				$this->set_visible( true );
			}

			function render() {
				echo '<div id="bl-debug-bar">';
				if (count(self::$debug_log)) {// echo "<pre>";var_dump(self::$debug_log); echo '</pre>';
					echo '<ul>';
					foreach(self::$debug_log as $k => $v) {
						echo "<li class='bl-debug-{$v['format']}'>";
						echo "<div class='bl-debug-entry-title'>{$v['title']}</div>";
                                                
						if ( 'dump' != $v['format'] ) {
							echo '<div class="bl-debug-entry-data">';
							echo $v['data'];
							echo '</div>';
						} else {
                                                    dBug( $v['data'] );
                                                }
						echo '</li>';
					}
					echo '</ul>';
				}
				echo '</div>';
			}

			/**
			 * log debug statements for display in debug bar
			 *
                         * @since 1.0
			 * @param string $title - message to display in log
			 * @param string $data - optional data to display
			 * @param string $format - optional format (log|warning|error|notice|dump)
			 * @return void
			 * @author Ben Lobaugh
			 */
			public function logDebug($title, $data, $format) { 
				self::$debug_log[] = array(
					'title' => $title,
					'data' => $data,
					'format' => $format,
				);
			}
		}
		$panels[] = new CONTRACTOR_DIRECTORYDebugBar;
	}
	return $panels;
}



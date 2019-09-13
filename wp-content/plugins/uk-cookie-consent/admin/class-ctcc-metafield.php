<?php
/*
 * Cookie Consent metafield class
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists ( 'CTCC_Metafield' ) ) {

	class CTCC_Metafield {

		public function __construct() {
			//
		}
		
		/*
		 * Initialize the class and start calling our hooks and filters
		 * @since 2.0.0
		 */
		public function init() {

			add_action( 'add_meta_boxes', array ( $this, 'add_meta_box' ) );
			add_action( 'save_post', array ( $this, 'save_metabox_data' ) );	
			
		}
		
		public function metaboxes() {
	
			$metaboxes = array (
				array (
					'ID'			=> 'ctcc_gallery_metabox',
					'title'			=> __( 'Cookie Consent', 'uk-cookie-consent' ),
					'callback'		=> 'meta_box_callback',
					'screens'		=> array( 'page', 'post' ),
					'context'		=> 'side',
					'priority'		=> 'default',
					'fields'		=> array (
						array (
							'ID'		=> 'ctcc_exclude',
							'name'		=> 'ctcc_exclude',
							'title'		=> __( 'Exclude from cookie notice', 'uk-cookie-consent' ),
							'type'		=> 'checkbox',
							'class'		=> ''
						),
					),
				),
			);
			
			return $metaboxes;
			
		}

		/*
		 * Register the metabox
		 * @since 1.0.0
		 */
		public function add_meta_box() {
			
			$metaboxes = $this->metaboxes();

			foreach ( $metaboxes as $metabox ) {
				add_meta_box (
					$metabox['ID'],
					$metabox['title'],
					array ( $this, 'meta_box_callback' ),
					$metabox['screens'],
					$metabox['context'],
					$metabox['priority'],
					$metabox['fields']
				);
				
			}
			
		}
		
		/*
		 * Metabox callbacks
		 * @since 1.0.0
		*/
		public function meta_box_callback ( $post, $fields ) {

			wp_nonce_field ( 'save_metabox_data', 'ctcc_metabox_nonce' );
			
			if ( $fields['args'] ) {
				
				foreach ( $fields['args'] as $field ) {
					
					switch ( $field['type'] ) {
						
						case 'checkbox':
							$this -> metabox_checkbox_output ( $post, $field );
							break;
							
					}
						
				}
				
			}

		}
		
		/*
		 * Metabox callback for checkbox
		 * @since 1.0.0
		 */
		public function metabox_checkbox_output( $post, $field ) {
			
			$field_value = 0;
			
			// First check if we're on the post-new screen
			global $pagenow;
			if ( in_array ( $pagenow, array( 'post-new.php' ) ) ) {
				// This is a new post screen so we can apply the default value
				$field_value = $field['default'];
			} else {		
				$custom = get_post_custom ( $post->ID );
				if ( isset ( $custom[$field['ID']][0] ) ) {
					$field_value = $custom[$field['ID']][0];
				}
			}
			?>
			<div class="dm-work-metafield <?php echo $field['class']; ?>">
				
				<input type="checkbox" id="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>" value="1" <?php checked ( 1, $field_value ); ?>>
				<label for="<?php echo $field['name']; ?>"><?php echo $field['title']; ?></label>
				<?php if ( ! empty ( $field['label'] ) ) { ?>
					<?php echo $field['label']; ?>
				<?php } ?>
			</div>
			<?php
		}
		
		/*
		 * Save
		 * @since 1.0.0
		 */
		public function save_metabox_data( $post_id ) {

			// Check the nonce is set
			if ( ! isset ( $_POST['ctcc_metabox_nonce'] ) ) {
				return;
			}
			
			// Verify the nonce
			if ( ! wp_verify_nonce ( $_POST['ctcc_metabox_nonce'], 'save_metabox_data' ) ) {
				return;
			}
			
			// If this is an autosave, our form has not been submitted, so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			
			// Check the user's permissions.
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
			
			// Save all our metaboxes
			$metaboxes = $this -> metaboxes();
			foreach ( $metaboxes as $metabox ) {
				if ( $metabox['fields'] ) {
					foreach ( $metabox['fields'] as $field ) {
						
						if ( $field['type'] != 'divider' ) {
							
							if ( isset ( $_POST[$field['name']] ) ) {
								if ( $field['type'] == 'wysiwyg' ) {
									$data = $_POST[$field['name']];
								} else {
									$data = sanitize_text_field ( $_POST[$field['name']] );
								}
								update_post_meta ( $post_id, $field['ID'], $data );
							} else {
								delete_post_meta ( $post_id, $field['ID'] );
							}
						}
					}
				}
			}
			
		}
		
	}
	
}
<div class="pld-settings-section" data-settings-ref="design" style="display:none;">
			<div class="pld-field-wrap">
				<label><?php _e( 'Choose Template', 'posts-like-dislike' ); ?></label>
				<div class="pld-field">
					<select name="pld_settings[design_settings][template]" class="pld-form-field pld-template-dropdown">
						<?php
						/**
						 * Filters total number or templates
						 *
						 * @param int
						 *
						 * @since 1.0.0
						 */
						$pld_total_templates = apply_filters( 'pld_total_templates', 4 );
						for ( $i = 1; $i <= $pld_total_templates; $i++ ) {
							?>
							<option value="template-<?php echo $i; ?>" <?php selected( $pld_settings['design_settings']['template'], 'template-' . $i ); ?>><?php echo __( 'Template ', 'posts-like-dislike' ) . $i; ?></option>
							<?php
						}
						?>
						<option value="custom" <?php selected( $pld_settings['design_settings']['template'], 'custom' ); ?>><?php _e( 'Custom Template', 'posts-like-dislike' ); ?></option>
					</select>
					<div class="pld-template-previews-wrap">
						<?php for ( $i = 1; $i <= 4; $i++ ) {
							?>
							<div class="pld-each-template-preview" <?php if ( 'template-' . $i != $pld_settings['design_settings']['template'] ) { ?>style="display:none"<?php } ?> data-template-ref="template-<?php echo $i; ?>"><img src="<?php echo PLD_IMG_DIR . '/template-previews/template-' . $i . '.jpeg'; ?>"/></div>
							<?php
						}

						/**
						 * Fires on backend template preview
						 *
						 * Useful to add additional templates in backend
						 *
						 * @param array $pld_settings
						 *
						 * @since 1.0.0
						 *
						 */
						do_action( 'pld_template_previews',$pld_settings );
						?>

					</div>
				</div>
			</div>
			<div class="pld-custom-ref" <?php if ( $pld_settings['design_settings']['template'] != 'custom' ) { ?>style="display:none"<?php } ?>>
				<div class="pld-field-wrap">
					<label><?php _e( 'Like Icon', 'posts-like-dislike' ); ?></label>
					<div class="pld-field">
						<input type="text" name="pld_settings[design_settings][like_icon]" class="pld-form-field" value="<?php echo esc_url( $pld_settings['design_settings']['like_icon'] ) ?>"/>
						<input type="button" class="button-primary pld-file-uploader" value="<?php _e( 'Upload Icon', 'posts-like-dislike' ); ?>"/>
						<span class="pld-preview-holder">
							<?php if ( $pld_settings['design_settings']['dislike_icon'] != '' ) { ?>
								<img src="<?php echo esc_url( $pld_settings['design_settings']['like_icon'] ); ?>"/>
							<?php } ?>
						</span>
					</div>
				</div>
				<div class="pld-field-wrap">
					<label><?php _e( 'Dislike Icon', 'posts-like-dislike' ); ?></label>
					<div class="pld-field">
						<input type="text" name="pld_settings[design_settings][dislike_icon]" class="pld-form-field" value="<?php echo esc_url( $pld_settings['design_settings']['dislike_icon'] ) ?>"/>
						<input type="button" class="button-primary pld-file-uploader" value="<?php _e( 'Upload Icon', 'posts-like-dislike' ); ?>"/>
						<span class="pld-preview-holder"><?php if ( $pld_settings['design_settings']['dislike_icon'] != '' ) { ?><img src="<?php echo esc_url( $pld_settings['design_settings']['dislike_icon'] ); ?>"/><?php } ?></span>
					</div>
				</div>
			</div>
			<div class="pld-field-wrap pld-template-ref"  <?php if ( $pld_settings['design_settings']['template'] == 'custom' ) { ?>style="display:none"<?php } ?>>
				<label><?php _e( 'Icon Color', 'posts-like-dislike' ); ?></label>
				<div class="pld-field">
					<input type="text" name="pld_settings[design_settings][icon_color]" class="pld-form-field pld-colorpicker" value="<?php echo esc_attr( $pld_settings['design_settings']['icon_color'] ) ?>"/>
				</div>
			</div>
			<div class="pld-field-wrap">
				<label><?php _e( 'Count Color', 'posts-like-dislike' ); ?></label>
				<div class="pld-field">
					<input type="text" name="pld_settings[design_settings][count_color]" class="pld-form-field pld-colorpicker" value="<?php echo esc_attr( $pld_settings['design_settings']['count_color'] ) ?>"/>
				</div>
			</div>
		</div>
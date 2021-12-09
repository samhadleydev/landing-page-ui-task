<?php

/**
 * Group title
 *
 * @package Rishi
 */
/**
 * Implement group title
 */
class Rishi_Group_Title extends WP_Customize_Section
{
	/**
	 * Type of this section.
	 *
	 * @var string
	 */
	public $type = 'rt-group-title';

	/**
	 * Special categorization for the section.
	 *
	 * @var string
	 */
	public $kind = 'default';

	/**
	 * Output
	 */
	public function render()
	{
		$description = $this->description;
		$class = 'accordion-section rt-group-title';

		if ('divider' === $this->kind) {
			$class = 'accordion-section rt-group-divider';
		}

		if ('option' === $this->kind) {
			$class = 'accordion-section rt-option-title';
		}

?>

		<li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="<?php echo esc_attr($class); ?>">
			<h3><?php echo esc_html($this->title); ?></h3>

			<?php if (!empty($description)) { ?>
				<span class="description"><?php echo esc_html($description); ?></span>
			<?php } ?>
		</li>
<?php
	}
}

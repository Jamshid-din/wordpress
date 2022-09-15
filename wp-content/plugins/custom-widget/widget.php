<?php
namespace Solid_Dropdown;

use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Custom_Widget extends Widget_Base {

	public static $slug = 'custom-widget';

	public function get_name() { return self::$slug; }

	public function get_title() { return __('Custom Form', self::$slug); }

	public function get_icon() { return 'fa-wpforms'; }

	public function get_categories() { return [ 'basic' ]; }

	protected function _register_controls() {

		// $this->start_controls_section(
		// 	'content_section',
		// 	[
		// 		'label' => __( 'Custom Form', self::$slug ),
		// 		'tab' => \Elementor\Controls_Manager::BUTTON,
		// 	]
		// );

		// Use the repeater to define one one set of the items we want to repeat look like
		// $repeater = new Repeater();

		// $repeater->add_control(
		// 	'option_value',
		// 	[
		// 		'label' => __( 'Option Value', self::$slug ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'default' => __( "The Option's Value", self::$slug ),
		// 		'placeholder' => __( 'Value Attribute', self::$slug ),
		// 	]
		// );

		// $repeater->add_control(
		// 	'option_contents',
		// 	[
		// 		'label' => __( 'Option Contents', self::$slug ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'default' => __( "The Option's Contents", self::$slug ),
		// 		'placeholder' => __( 'Option Contents', self::$slug ),
		// 	]
		// );

		// Add the
		// $this->add_control(
		// 	'options_list',
		// 	[
		// 		'label' => __( 'Repeater List', self::$slug ),
		// 		'type' => \Elementor\Controls_Manager::REPEATER,
		// 		'fields' => $repeater->get_controls(),
		// 		'default' => [
		// 			[]
		// 		],
		// 		'title_field' => '{{{ option_contents }}}'
		// 	]
		// );

    /*
     * BUTTON TEXT
     */
    $this->start_controls_section(
      'button_settings',
      [
        'label' => __( 'Button Settings', 'your-plugin-textdomain' ),
      ]
    );
  
    $this->add_control(
      'button_text',
      [
        'label' => __( 'Button Text', 'your-plugin-textdomain' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Button Text', 'your-plugin-textdomain' ),
      ]
    );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'your-plugin-textdomain' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .my-btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'plugin-name' ),
				'selector' => '{{WRAPPER}} .my-btn'
			]
		);
  
    $this->add_responsive_control(
      'button_align',
      [
        'label' => __( 'Button Alignment', 'your-plugin-textdomain' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left'    => [
            'title' => __( 'Left', 'your-plugin-textdomain' ),
            'icon' => 'eicon-text-align-left',
          ],
          'center' => [
            'title' => __( 'Center', 'your-plugin-textdomain' ),
            'icon' => 'eicon-text-align-center',
          ],
          'right' => [
            'title' => __( 'Right', 'your-plugin-textdomain' ),
            'icon' => 'eicon-text-align-right',
          ],
        ],
        'default' => 'left',
        'selectors' => [
          '{{WRAPPER}} .elementor-content-toggle-button-wrapper' => 'text-align: {{VALUE}};'
        ],
      ]
    );
  
		$this->end_controls_section();
	}

  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
    <style>
      .input-div {
        display: flex;
        justify-content: center;
      }

      .my-input {
        height: 50px !important;
        width: 50px !important;
        text-transform: uppercase;
        border: 1px solid black;
      }
      .my-btn {
        margin: 24px;
        border-radius: 5px;
      }

    </style>
    <div class="elementor-content-toggle-button-wrapper">
      <form class="elementor-content-toggle-button-btn" action="POST">
        <div class="input-div">
          <input class="my-input" type="text" maxlength="1"/>
          <input class="my-input" type="text" maxlength="1"/>
          <input class="my-input" type="text" maxlength="1"/>
          <input class="my-input" type="text" maxlength="1"/>
          <input class="my-input" type="text" maxlength="1"/>
        </div>
        <button type="submit" class="my-btn" class=""><?php echo $settings['button_text']; ?></button>
      </form>
      <!-- <div class="elementor-content-toggle-button-content-box"><?php echo $settings['widget_content']; ?></div> -->
    </div>
    <?php
  }

	// protected function render() {
	// 	$options_list = $this->get_settings_for_display('options_list');
	// 	echo "<div>";
	// 	foreach ($options_list as $option_item) {
	// 		echo "<button value='{$option_item['option_value']}'>{$option_item['option_contents']}</button>";
	// 	}
	// 	echo "</div>";
	// }
}
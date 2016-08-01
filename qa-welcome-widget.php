<?php

/*
	Question2Answer Plugin: Welcome Widget
*/

class qa_welcome_widget {

	public function option_default($option)
	{
		switch ($option) {
			case 'qa_welcome_widget_enabled':
				return 1;
			case 'qa_welcome_widget_html':
				return '<p>HTML here</p>';
			case 'qa_welcome_widget_css':
				return '/* CSS here */';
			case 'qa_welcome_widget_js':
				return '// Javascript here';
			default:
				return;
		}
	}

	public function admin_form(&$qa_content)
	{
		// process the admin form if admin hit Save-Changes-button
		$ok = null;
		if (qa_clicked('qa_welocome_widget_save')) {
			qa_opt('qa_welcome_widget_enabled', (int)qa_post_text('qa_welcome_widget_enabled'));
			qa_opt('qa_welcome_widget_html', qa_post_text('qa_welcome_widget_html'));
			qa_opt('qa_welcome_widget_css', qa_post_text('qa_welcome_widget_css'));
			qa_opt('qa_welcome_widget_js', qa_post_text('qa_welcome_widget_js'));
			$ok = qa_lang('admin/options_saved');
		}

		// form fields to display frontend for admin
		$fields = array();

		$fields[] = array(
			'label' => qa_lang('qa_welcome_widget_lang/enabled'),
			'tags' => 'NAME="qa_welcome_widget_enabled"',
			'value' => qa_opt('qa_welcome_widget_enabled'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'label' => qa_lang('qa_welcome_widget_lang/custom_html'),
			'tags' => 'NAME="qa_welcome_widget_html"',
			'value' => qa_opt('qa_welcome_widget_html'),
			'type' => 'textarea',
			'rows' => 15
		);

		$fields[] = array(
			'label' => qa_lang('qa_welcome_widget_lang/custom_css'),
			'tags' => 'NAME="qa_welcome_widget_css"',
			'value' => qa_opt('qa_welcome_widget_css'),
			'type' => 'textarea',
			'rows' => 15
		);

		$fields[] = array(
			'label' => qa_lang('qa_welcome_widget_lang/custom_js'),
			'tags' => 'NAME="qa_welcome_widget_js"',
			'value' => qa_opt('qa_welcome_widget_js'),
			'type' => 'textarea',
			'rows' => 15
		);

		return array(
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $fields,
			'buttons' => array(
				array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'name="qa_welocome_widget_save"',
				),
			),
		);
	}

	function allow_template($template)
	{
		return ($template === 'qa');
	}

	function allow_region($region)
	{
		return ($region === 'full');
	}

	function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		if ($place === 'low' || $place === 'bottom' || !empty($request)) return;
		$themeobject->output($request, $region, $place);
	}
}
/*
	Omit PHP closing tag to help avoid accidental output
*/

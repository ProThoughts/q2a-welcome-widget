<?php

/*
	Question2Answer Plugin: Welcome Widget
*/

class qa_welcome_widget {

	public function option_default($option)
	{
		switch ($option) {
			case 'qa_welcome_widget_html':
				return '<p>ここにHTMLを書く</p>';
			default:
				return;
		}
	}

	public function admin_form(&$qa_content)
	{
		// process the admin form if admin hit Save-Changes-button
		$ok = null;
		if (qa_clicked('qa_welocome_widget_save')) {
			qa_opt('qa_welcome_widget_html', qa_post_text('qa_welcome_widget_html'));
			$ok = qa_lang('admin/options_saved');
		}

		// form fields to display frontend for admin
		$fields = array();

		$fields[] = array(
			'label' => qa_lang('qa_welcome_widget_lang/custom_html'),
			'tags' => 'NAME="qa_welcome_widget_html"',
			'value' => qa_opt('qa_welocome_widget_html'),
			'type' => 'textarea',
			'rows' => 20
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
		if ($place === 'low' || $place === 'bottom') return;
		$themeobject->output($request, $region, $place);
	}
}
/*
	Omit PHP closing tag to help avoid accidental output
*/

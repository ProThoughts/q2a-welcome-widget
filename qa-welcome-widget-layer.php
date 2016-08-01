<?php

class qa_html_theme_layer extends qa_html_theme_base
{
	public function head_css()
	{
		qa_html_theme_base::head_css();
		if (!qa_is_logged_in()
			&& $this->template === 'qa'
			&& qa_opt('qa_welcome_widget_enabled')) {
			$css = qa_opt('qa_welcome_widget_css');
			$this->output('<style>', $css, '</style>');
		}
	}
	public function footer()
	{
		qa_html_theme_base::footer();
		if (!qa_is_logged_in()
			&& $this->template === 'qa'
			&& qa_opt('qa_welcome_widget_enabled')) {
			$js = qa_opt('qa_welcome_widget_js');
			$this->output('<script>', $js, '</script>');
		}
   }
}

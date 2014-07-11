<?php

require_once TOOLKIT . '/class.event.php';


	require_once(TOOLKIT.'/class.sectionmanager.php');
	require_once(TOOLKIT.'/class.entrymanager.php');

	require_once(EXTENSIONS.'/sections_event/lib/class.se_perman.php');



	/**
	 * Processes any amount of sections and their relations.
	 */
	Final Class EventPasswordField extends Event
	{

		/**
		 * Sections values at current processing stage.
		 *
		 * @var array
		 */
		private $sections = array();

		/**
		 * Knows if errors occurred during current processing stage.
		 *
		 * @var array
		 */
		private $error = false;



		/*------------------------------------------------------------------------------------------------*/
		/* Public utilities */
		/*------------------------------------------------------------------------------------------------*/

		public static function about(){
			return array(
				'name' => 'Password Field'
			);
		}

		public static function allowEditorToParse(){
			return false;
		}

		public function load(){
			if( isset($_REQUEST['action']['password-field']) ){
				return $this->execute();
			}
		}

    public static function documentation()
    {
        return '
                <h3>Success and Failure XML Examples</h3>
                <p>When saved successfully, the following XML will be returned:</p>
                <pre class="XML"><code>&lt;password-field-test result="success" type="create | edit">
    &lt;message>Entry [created | edited] successfully.&lt;/message>
&lt;/password-field-test></code></pre>
                <p>When an error occurs during saving, due to either missing or invalid fields, the following XML will be returned:</p>
                <pre class="XML"><code>&lt;password-field-test result="error">
    &lt;message>Entry encountered errors when saving.&lt;/message>
    &lt;field-name type="invalid | missing" />
...&lt;/password-field-test></code></pre>
                <h3>Example Front-end Form Markup</h3>
                <p>This is an example of the form markup you can use on your frontend:</p>
                <pre class="XML"><code>&lt;form method="post" action="{$current-url}/" enctype="multipart/form-data">
    &lt;input name="MAX_FILE_SIZE" type="hidden" value="73400320" />
    &lt;label>Password
        &lt;input name="fields[password][pwd]" type="password" />
    &lt;/label>
	&lt;label>Confirm Password
        &lt;input name="fields[password][confirm]" type="password" />
    &lt;/label>
    &lt;input name="action[password-field-test]" type="submit" value="Submit" />
&lt;/form></code></pre>
                <p>To edit an existing entry, include the entry ID value of the entry in the form. This is best as a hidden field like so:</p>
                <pre class="XML"><code>&lt;input name="id" type="hidden" value="23" /></code></pre>
                <p>To redirect to a different location upon a successful save, include the redirect location in the form. This is best as a hidden field like so, where the value is the URL to redirect to:</p>
                <pre class="XML"><code>&lt;input name="redirect" type="hidden" value="http://localhost/symphony-2.4.0/success/" /></code></pre>';
    }

    public function execute()
    {
        $request = $this->getInputData( $_REQUEST );

			$sections_input = $request['sections'];

			// store the redirect
			$redirect = '';
			if( isset($sections_input['redirect']) ){
				$redirect = $sections_input['redirect'];
				unset($sections_input['redirect']);
			}
    }

}

<?php

/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[mailkey].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $subject: The message subject.
 * - $body: The message body in HTML format.
 * - $mailkey: The message identifier.
 * - $recipient: An email address or user object who is receiving the message.
 * - $css: Internal style sheets.
 *
 * @see template_preprocess_mimemail_message()
 */
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php if ($css): ?>
    <style type="text/css">
      <!--
      <?php print $css ?>
      -->
    </style>
    <?php endif; ?>
  </head>
  <body id="mimemail-body" <?php if ($mailkey): print 'class="'. $mailkey .'"'; endif; ?>>
    <div id="center">
      <div id="main">
      
       <div id="rsvp-email">
          <div id="rsvp-email-cover">
                  <div id="rsvp-header">
                  		<a href="http://www.swathywedsranjeesh.v3r.us" title="Swathy weds Ranjeesh">
                        	<img src="http://www.swathywedsranjeesh.v3r.us/sites/all/themes/wedding_bells/images/envelope-img/SwathyRanjeesh.png" alt="Swathy Weds Ranjeesh"/>
                        </a>
                  </div>
                  <div id="rsvp-content">
                          <?php print $body ?>
                  </div>
                  <div id="rsvp-seal"></div>
                  <div id="rsvp-cover-print"></div>
                  <div id="rsvp-website">
                  		Visit us at <a href="http://www.swathywedsranjeesh.v3r.us">http://www.swathywedsranjeesh.v3r.us</a>
                  </div>
          </div>
          <div id="footer">
          </div>
    </div>

      </div>
    </div>
  </body>
</html>

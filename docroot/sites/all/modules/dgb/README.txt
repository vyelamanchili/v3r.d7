// $Id$

Drupal Guestbook (DGB) provides a site and user guestbooks.

Requirements
--------------------------------------------------------------------------------
- This module is written for Drupal 6.0+.

Installation
--------------------------------------------------------------------------------
Copy the DGB module folder to your module directory and then enable on the
admin modules page.

Administration
--------------------------------------------------------------------------------
1. Configure the DGB module permissions.
2. Administer the DGB module settings in: admin/settings/dgb
3. Administer the DGB content in: admin/content/dgb

Documentation
--------------------------------------------------------------------------------
Please use Drupals Help module. DGB itself contains a little bit documentation.

- CAPTCHA

  Administer > CAPTCHA > General settings > Form protection

  Please use 'dgb_form_entry_form' as form_id to provide a CAPTCHA challenge on
  guestbook entry forms.

- Panels

  If you create a new panel page it is important to use the User context. Only
  with this context it is possible to use the
  content category "Drupal Guestbook (DGB)".

- Advanced validation

  It is possible to use an advanced validation functionality for the entry form
  fields 'E-mail' and 'Homepage'.
  These fields are used for anonymous posters and edit their entries.
  To use the advanced validation enable the Email Verification module and
  configure the corresponding DGB settings
  - E-mail settings -> E-mail validation
  - Posting settings -> Anonymous poster fields -> Webite validation

- Simple internal spam feature

  DGB allows to use a simple spam functionality without to use additional
  spam modules.
  It is possible to define keywords to filter entries. How to filter entries
  to unpublish? Follow these steps:

  1. Administer actions
     Make a new advanced action
     DGB: Unpublish entry containing keyword(s)
     available.
     To filter/unpublish entries contains URLs configure your needed
     keywords: www., http

  2. Administer triggers
     Assign the new advanced action to
     Trigger: After saving a new Drupal Guestbook entry
     and to
     Trigger: After saving a updated Drupal Guestbook entry.

- Theming

  You can use the following templates from the module theme folder for
  advanced theming:

  - dgb-entry.tpl.php
    Default theme implementation for an guestbook entry.
  - dgb-entry-comment.tpl.php
    Default theme implementation for an guestbook entry comment.
  - dgb-entry-submitted.tpl.php
    Default theme implementation for the submitted line of an entry.
  - dgb-entry-admin-overview.tpl.php
    Default theme implementation for the content administration page of
    the DGB entries.
  - dgb-latest-entries-block-list.tpl.php
    Default theme implementation for the entry list in
    the 'DGB latest entries' block.

  For more templates please see the theme functions of the module.

- If you are a documentation writer?

  You can help to write an DGB-documentation on drupal.org.


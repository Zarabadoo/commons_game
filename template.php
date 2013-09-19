<?php

/**
 * @file
 * Theme overrides.
 */

/**
 * Implements hook_preprocess_panels_pane().
 */
function commons_game_preprocess_panels_pane(&$variables, $hook) {
  // Wrap the achievements panes with the commons-pod style.
  if (strpos($variables['pane']->subtype, 'achievements-') !== FALSE) {
    $variables['attributes_array']['class'][] = 'commons-pod';
  }
}

/**
 * Implements hook_page_alter().
 */
function commons_game_page_alter(&$page) {
  // Wrap the achievements page content in a div with the commons-pod styling.
  if (isset($page['content']['system_main']['achievements'])) {
    $page['content']['system_main']['achievements']['#theme_wrappers'][] = 'container';
    $page['content']['system_main']['achievements']['#attributes']['class'] = array('commons-pod', 'clearfix');
  }
  if (isset($page['content']['system_main']['achievements']['leaderboard'])) {
    foreach ($page['content']['system_main']['achievements']['leaderboard'] as &$results) {
      $results['#theme_wrappers'][] = 'container';
      $results['#attributes']['class'][] = 'achievement-result-wrapper';
    }
  }
  if (isset($page['content']['system_main']['achievements']['leaderboard']['top']['#header'])) {
    $page['content']['system_main']['achievements']['leaderboard']['relative']['#header'] = $page['content']['system_main']['achievements']['leaderboard']['top']['#header'];
  }
}

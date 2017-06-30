<?php

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2011-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 *  |     2015 Dennis Roemmich <dennis@roemmich.eu>
 */

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$boot = function($extensionKey) {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'PwCommentsTeam.' . $extensionKey,
		'Pi1',
		array(
			'Comment' => 'index,new,create,upvote,downvote',
		),
		array(
			'Comment' => 'create,upvote,downvote',
		)
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'PwCommentsTeam.' . $extensionKey,
		'Pi2',
		array(
			'Comment' => 'sendAuthorMailWhenCommentHasBeenApproved',
		),
		array(
			'Comment' => 'sendAuthorMailWhenCommentHasBeenApproved',
		)
	);

	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['PwComments']['modules']
		= $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['extbase']['extensions']['PwComments']['plugins'];

		// After save hook
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] =
		'PwCommentsTeam\PwComments\Hooks\ProcessDatamap';
};

$boot($_EXTKEY);
unset($boot);
<?php
namespace PwCommentsTeam\PwComments\Domain\Model;

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2011-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 *  |     2015 Dennis Roemmich <dennis@roemmich.eu>
 */

/**
 * Vote model (for comments)
 *
 * @package PwCommentsTeam\PwComments
 */
class Vote extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	/** Constant for upvote */
	const TYPE_UPVOTE = 1;
	/** Constant for downvote */
	const TYPE_DOWNVOTE = 0;

	/**
	 * @var int
	 */
	protected $type;

	/**
	 * @var int unix timestamp
	 */
	protected $crdate;

	/**
	 * @var \PwCommentsTeam\PwComments\Domain\Model\FrontendUser
	 */
	protected $author = NULL;

	/**
	 * @var string
	 */
	protected $authorIdent;

	/**
	 * @var \PwCommentsTeam\PwComments\Domain\Model\Comment
	 */
	protected $comment;

	/**
	 * Get type
	 *
	 * @return int
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set type
	 *
	 * @param int $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Get creation date
	 *
	 * @return int
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * Set creation date
	 *
	 * @param int $crdate
	 * @return void
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}

	/**
	 * Get author (fe_user)
	 *
	 * @return \PwCommentsTeam\PwComments\Domain\Model\FrontendUser
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Set author (fe_user)
	 *
	 * @param \PwCommentsTeam\PwComments\Domain\Model\FrontendUser $author
	 * @return void
	 */
	public function setAuthor(\PwCommentsTeam\PwComments\Domain\Model\FrontendUser $author) {
		$this->author = $author;
	}

	/**
	 * Get author ident
	 *
	 * @return string
	 */
	public function getAuthorIdent() {
		return $this->authorIdent;
	}

	/**
	 * Set author ident
	 *
	 * @param string $authorIpAddress
	 * @return void
	 */
	public function setAuthorIdent($authorIpAddress) {
		$this->authorIdent = $authorIpAddress;
	}

	/**
	 * Is upvote?
	 *
	 * @return bool
	 */
	public function isUpvote() {
		return $this->getType() === self::TYPE_UPVOTE;
	}

	/**
	 * Is downvote?
	 *
	 * @return bool
	 */
	public function isDownvote() {
		return $this->getType() === self::TYPE_DOWNVOTE;
	}

	/**
	 * Get related comment
	 *
	 * @return \PwCommentsTeam\PwComments\Domain\Model\Comment
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * Set related comment
	 *
	 * @param \PwCommentsTeam\PwComments\Domain\Model\Comment $comment
	 * @return void
	 */
	public function setComment(\PwCommentsTeam\PwComments\Domain\Model\Comment $comment) {
		$this->comment = $comment;
	}
}
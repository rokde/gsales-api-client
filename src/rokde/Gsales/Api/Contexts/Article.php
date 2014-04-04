<?php
/**
 * Created by PhpStorm.
 * User: rok
 * Date: 02.04.14
 * Time: 15:22
 */

namespace Rokde\Gsales\Api\Contexts;


use Rokde\Gsales\Api\Types\Article\Base;
use Rokde\Gsales\Api\Types\ArticleType;
use Rokde\Gsales\Api\Types\Filter;
use Rokde\Gsales\Api\Types\Sort;

class Article extends Api {

	/**
	 * fetches a single article by id
	 *
	 * @param int $articleId
	 * @return \Rokde\Gsales\Api\Types\ArticleType
	 */
	public function get($articleId)
	{
		return $this->getEntity('getArticle', 'aticleid', $articleId);
	}

	/**
	 * returns a collection of articles, filtered, sorted, paginated
	 *
	 * @param Filter[] $filter
	 * @param Sort $sort
	 * @param int $limit
	 * @param int $offset
	 * @return \Rokde\Gsales\Api\Types\ArticleType[]
	 */
	public function all($filter = null, $sort = null, $limit = null, $offset = null)
	{
		return $this->getCollection('getArticles', $filter, $sort, $limit, $offset);
	}

	/**
	 * returns the number of newsletters returned by filter
	 *
	 * @param Filter[] $filter
	 * @return int
	 */
	public function count($filter = null)
	{
		return $this->getCollectionCount('getArticlesCount', $filter);
	}

	/**
	 * creates an article
	 *
	 * @param Base $article
	 * @return ArticleType
	 */
	public function create(Base $article)
	{
		return $this->call('createArticle', ['data' => $article]);
	}

	/**
	 * updates an article
	 *
	 * @param ArticleType $article
	 * @return ArticleType
	 */
	public function udpate(ArticleType $article)
	{
		$articleId = $article->getId();

		return $this->call('updateArticle', ['articleid' => $articleId, 'data' => $article]);
	}

	/**
	 * deletes an article
	 *
	 * @param int|ArticleType $article
	 * @return bool
	 */
	public function delete($article)
	{
		$articleId = ($article instanceof ArticleType) ? $article->getId() : $article;

		return $this->call('deleteArticle', ['articleid' => $articleId]);
	}
} 
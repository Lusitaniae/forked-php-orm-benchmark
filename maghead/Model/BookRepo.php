<?php
namespace AuthorBooks\Model;
require_once __DIR__ . '/BookSchemaProxy.php';
use Maghead\Schema\SchemaLoader;
use Maghead\Result;
use Maghead\Inflator;
use SQLBuilder\Bind;
use SQLBuilder\ArgumentArray;
use PDO;
use SQLBuilder\Universal\Query\InsertQuery;
use Maghead\BaseRepo;
class BookRepo
    extends BaseRepo
{
    const SCHEMA_CLASS = 'AuthorBooks\\Model\\BookSchema';
    const SCHEMA_PROXY_CLASS = 'AuthorBooks\\Model\\BookSchemaProxy';
    const COLLECTION_CLASS = 'AuthorBooks\\Model\\BookCollection';
    const MODEL_CLASS = 'AuthorBooks\\Model\\Book';
    const TABLE = 'book';
    const READ_SOURCE_ID = 'default';
    const WRITE_SOURCE_ID = 'default';
    const PRIMARY_KEY = 'id';
    const TABLE_ALIAS = 'm';
    const FIND_BY_PRIMARY_KEY_SQL = 'SELECT * FROM book WHERE id = ? LIMIT 1';
    const DELETE_BY_PRIMARY_KEY_SQL = 'DELETE FROM book WHERE id = ?';
    public static $columnNames = array (
      0 => 'id',
      1 => 'title',
      2 => 'subtitle',
      3 => 'isbn',
      4 => 'description',
      5 => 'view',
      6 => 'published',
      7 => 'publisher_id',
      8 => 'published_at',
      9 => 'is_hot',
      10 => 'is_selled',
    );
    public static $columnHash = array (
      'id' => 1,
      'title' => 1,
      'subtitle' => 1,
      'isbn' => 1,
      'description' => 1,
      'view' => 1,
      'published' => 1,
      'publisher_id' => 1,
      'published_at' => 1,
      'is_hot' => 1,
      'is_selled' => 1,
    );
    public static $mixinClasses = array (
    );
    protected $table = 'book';
    protected $findStm;
    protected $deleteStm;
    protected $findByIsbnStm;
    public static function getSchema()
    {
        static $schema;
        if ($schema) {
           return $schema;
        }
        return $schema = new \AuthorBooks\Model\BookSchemaProxy;
    }
    public function find($pkId)
    {
        if (!$this->findStm) {
           $this->findStm = $this->read->prepare(self::FIND_BY_PRIMARY_KEY_SQL);
           $this->findStm->setFetchMode(PDO::FETCH_CLASS, 'AuthorBooks\Model\Book');
        }
        return static::_stmFetch($this->findStm, [$pkId]);
    }
    public function findByIsbn($value)
    {
        if (!isset($this->findByIsbnStm)) {
            $this->findByIsbnStm = $this->read->prepare('SELECT * FROM book WHERE isbn = :isbn LIMIT 1');
            $this->findByIsbnStm->setFetchMode(PDO::FETCH_CLASS, \AuthorBooks\Model\Book);
        }
        return static::_stmFetch($this->findByIsbnStm, [':isbn' => $value ]);
    }
    public function deleteByPrimaryKey($pkId)
    {
        if (!$this->deleteStm) {
           $this->deleteStm = $this->write->prepare(self::DELETE_BY_PRIMARY_KEY_SQL);
        }
        return $this->deleteStm->execute([$pkId]);
    }
}

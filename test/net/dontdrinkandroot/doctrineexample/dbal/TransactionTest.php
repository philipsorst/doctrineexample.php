<?php


namespace net\dontdrinkandroot\dbal;


use net\dontdrinkandroot\doctrineexample\dbal\DoctrineDbalTestCase;

class TransactionTest extends DoctrineDbalTestCase
{

    public function testSimpleTransaction()
    {
        $this->connection->beginTransaction();
        try {
            // do db stuff
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

    public function testAnonymousTransaction()
    {
        $this->connection->transactional(
            function ($connection) {
                // do db stuff
            }
        );
    }

    public function testNestedTransaction()
    {
        $this->connection->beginTransaction(); // 0 => 1, "real" transaction started
        try {

            // do db stuff

            // nested transaction block, this might be in some other API/library code that is
            // unaware of the outer transaction.
            $this->connection->beginTransaction(); // 1 => 2
            try {

                // do db stuff

                $this->connection->commit(); // 2 => 1
            } catch (Exception $e) {
                $this->connection->rollback(); // 2 => 1, transaction marked for rollback only
                throw $e;
            }

            // do db stuff

            $this->connection->commit(); // 1 => 0, "real" transaction committed
        } catch (Exception $e) {
            $this->connection->rollback(); // 1 => 0, "real" transaction rollback
            throw $e;
        }
    }

}
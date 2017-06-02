<?php

namespace App\Repositories\Backend\Post;

/**
 * Interface HistoryContract.
 */
interface PostContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function findOrThrowException($id);

    /**
     * @param $input
     * @param null $resume_uid
     * @return mixed
     */
    public function create($input);

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @return mixed
     */
    public function getAll();
}

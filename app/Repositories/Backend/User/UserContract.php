<?php

namespace App\Repositories\Backend\User;

/**
 * Interface HistoryContract.
 */
interface UserContract
{
    /**
     * @param $input
     * @return mixed
     */
    public function create($input);

    public function getAll();
}

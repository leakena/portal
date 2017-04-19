<?php

namespace App\Repositories\Backend\PersonalInfo;

/**
 * Interface HistoryContract.
 */
interface PersonalInfoContract
{
    /**
     * @param $input
     * @return mixed
     */


    public function findOrThrowException($id);
    public function create($input);
    public function update($id, $input);
    public function destroy($id);
    public function getAll();
}

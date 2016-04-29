<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 4/29/2016
 * Time: 6:43 PM
 */

namespace App\Repositories\Contracts;


use App\Repositories\Criteria\Criteria;

interface CriteriaInterface
{
    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @param Criteria $criteria
     * @return $this
     */
    public function getByCriteria(Criteria $criteria);

    /**
     * @param Criteria $criteria
     * @return $this
     */
    public function pushCriteria(Criteria $criteria);

    /**
     * @return $this
     */
    public function  applyCriteria();
}
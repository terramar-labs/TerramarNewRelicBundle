<?php

namespace Terramar\Bundle\NewRelicBundle\Driver;

/**
 * Defines the contract any NewRelic Driver must follow
 */
interface DriverInterface
{
    /**
     * Add a metric to the transaction
     *
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function addMetric($name, $value);

    /**
     * Add a parameter to the current transaction
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function addParameter($key, $value);

    /**
     * Sets the current transaction's name
     *
     * @param string $name
     *
     * @return void
     */
    public function setTransactionName($name);

    /**
     * Immediately ends the current transaction
     *
     * Useful for long-running requests, such as file downloads, that should not be considered
     * as taking so long.
     *
     * @return void
     */
    public function endTransaction();

    /**
     * Do not generate metrics for this transaction.
     *
     * This is useful when you have transactions that are particularly slow for known reasons
     * and you do not want them always being reported as the transaction trace or skewing your
     * site averages.
     *
     * @return void
     */
    public function ignoreTransaction();

    /**
     * Consider the current transaction a background job.
     *
     * If true as an argument is given, mark the current transaction as a background job.
     * If false is passed as an argument, mark the transaction as a web transaction.
     * 
     * @param bool $isBackground
     *
     * @return void
     */
    public function setBackgroundJob($isBackground = true);
}

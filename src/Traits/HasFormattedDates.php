<?php

namespace Perfexdev360\SharedFeatures\Traits;

use Perfexdev360\SharedFeatures\Utilities\DateUtility;

trait HasFormattedDates
{
    /**
     * Get a standardized formatted string for the created_at attribute.
     *
     * @return string
     */
    public function getFormattedCreatedAtAttribute(): string
    {
        return DateUtility::format($this->created_at, 'Y-m-d H:i:s');
    }

    /**
     * Get a standardized formatted string for the updated_at attribute.
     *
     * @return string
     */
    public function getFormattedUpdatedAtAttribute(): string
    {
        return DateUtility::format($this->updated_at, 'Y-m-d H:i:s');
    }
}

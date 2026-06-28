<?php

namespace Perfexdev360\SharedFeatures\Utilities;

class DateUtility
{
    /**
     * Format a date string or DateTime object.
     *
     * @param string|\DateTimeInterface $date
     * @param string $format
     * @return string
     */
    public static function format($date, string $format = 'Y-m-d'): string
    {
        if (!$date instanceof \DateTimeInterface) {
            try {
                $date = new \DateTime($date);
            } catch (\Exception $e) {
                return ''; // Fallback for invalid dates
            }
        }

        return $date->format($format);
    }
}

<?php

if (!function_exists('perfex_format_date')) {
    /**
     * A global helper to format dates.
     *
     * @param string|DateTime $date
     * @param string $format
     * @return string
     */
    function perfex_format_date($date, $format = 'Y-m-d H:i:s')
    {
        if (!$date instanceof \DateTimeInterface) {
            $date = new \DateTime($date);
        }

        return $date->format($format);
    }
}

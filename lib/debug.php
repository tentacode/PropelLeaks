<?php

class Debug
{
  public static function printMemoryUsage($prefix = '')
  {
    $memoryUsage = round(memory_get_usage(true) / (1024 * 1024), 2);
    $memoryPeak = round(memory_get_peak_usage(true) / (1024 * 1024), 2);

    print sprintf("%s | %s | %s\n",
      str_pad($prefix, 20, ' ', STR_PAD_RIGHT),
      str_pad('usage '.$memoryUsage.' mo', 15, ' ', STR_PAD_RIGHT),
      'peak '.$memoryPeak.' mo'
    );
  }
}
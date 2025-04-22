<?php

return [
    'streak_thresholds' => [7, 14, 30, 60, 90],
    'completion_thresholds' => [10, 50, 100, 500, 1000],
    'diversity_thresholds' => [3, 5, 10, 15, 20],
    
    'check_interval' => 'daily',
    'notification_channels' => ['database', 'mail'],
];
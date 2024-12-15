<?php

namespace App\Helpers;

class Helper
{
    public static function formatUptime($uptime)
    {
        // Pecah waktu uptime menjadi array berdasarkan titik dua (:)
        $timeParts = explode(':', $uptime);

        // Tentukan jumlah elemen dalam array
        $count = count($timeParts);

        if ($count == 4) {
            // Format: dd:hh:mm:ss
            $days = (int)$timeParts[0];
            $hours = (int)$timeParts[1];
            $minutes = (int)$timeParts[2];
            $seconds = (int)$timeParts[3];
        } elseif ($count == 3) {
            // Format: hh:mm:ss
            $days = 0;
            $hours = (int)$timeParts[0];
            $minutes = (int)$timeParts[1];
            $seconds = (int)$timeParts[2];
        } else {
            // Format tidak dikenal, kembalikan uptime asli
            return $uptime;
        }

        // Format waktu menjadi string yang lebih ramah
        $formatted = [];
        if ($days > 0) {
            $formatted[] = $days . ' hari';
        }
        if ($hours > 0) {
            $formatted[] = $hours . ' jam';
        }
        if ($minutes > 0) {
            $formatted[] = $minutes . ' menit';
        }
        if ($seconds > 0) {
            $formatted[] = $seconds . ' detik';
        }

        return implode(', ', $formatted);
    }
}

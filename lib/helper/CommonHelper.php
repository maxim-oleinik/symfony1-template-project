<?php

    /**
     * Выбрать множественную форму склонения
     *
     * @param int    $num   - число
     * @param string $name1 - вариант 1 - "запись"
     * @param string $name2 - вариант 2 - "записи"
     * @param string $name3 - вариант 5 - "записей"
     * @return string
     */
    function pluralForm($num, $name1, $name2, $name3)
    {
        $num = abs((int)$num);
        if ($num > 100) $num %= 100;
        if ($num > 20) $num %= 10;

        switch ($num) {
            case 1:
                return $name1;
                break;
            case 2:
            case 3:
            case 4:
                return $name2;
                break;
            default:
                return $name3;
        }
    }

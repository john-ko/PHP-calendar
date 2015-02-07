<?php
/**
 * Calendar
 *
 * a simple calendar class
 *
 */
class Calendar
{
    private $time;
    private $month;
    private $year;

    private $DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
                        'Friday'];

    private $MONTHS = ['Janurary', 'Feburary', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November',
                        'December'];

    private $calendar;

    private $dateTime;

    public function __construct($month = null, $year = null)
    {
    	$this->time     = $this->getTime();
    	$this->dateTime = new DateTime();

        /* gets current month/year */
        $this->month = isset($month) ? $month : $this->getMonth();
        $this->year  = isset($year)  ? $year  : $this->getYear();
        $this->dateTime->setDate($this->year, $this->month, 1);
    }

    /**
     * getMonths
     *
     * returns an array with a list of the months
     *
     * @return array
     */
    public function getMonths()
    {
        return $this->MONTHS;
    }

    /**
     * getDays
     *
     * return an array with the days of the week
     * @return array
     */
    public function getDays()
    {
        return $this->DAYS;
    }

    /**
     * getCalendar
     *
     * pre 'null' fills a month then merges with the actual length of the
     * month to fix offsets.
     *
     * example: say Jan 1st starts on thursday (index 4 from a zero based
     * sun-sat array), the first week should look like this
     * ['', '', '', '', 1, 2, 3]
     *
     * @param int $month
     * @param int $year
     * @return array[][]
     */
    public function getCalendar($month = null, $year = null)
    {
        $lastDay = $this->getLastDay();

        $firstDay = $this->getFirstDay();

        /* pre-fills the month with null until the first day */
        $preFilledMonth = $this->getNullFilledArrayOffset($firstDay);

        /* postMonth is just the regular month */
        $postMonth = range(1, $lastDay);

        $combined = array_merge($preFilledMonth, $postMonth);

        /* sets and returns */
        return $this->calendar = array_chunk($combined, 7);
    }

    /**
     * getNullFilledArrayOffset
     *
     * if the month started on wednesday it will return
     * an array of size 3 filled with null ['', '', '']
     *
     * @param $offset int
     * @return array
     */
    private function getNullFilledArrayOffset($offset)
    {
        return ( $offset !=0 ) ? array_fill(0, $offset, '') : [];
    }

    /**
     * getFirstDay
     *
     * returns numerical format of the 1st day of the week
     * @return int
     */
    private function getFirstDay()
    {
        return (int) $this->dateTime->format('w');
    }

    /**
     * getLastDay
     *
     * gets last day of the month
     *
     * @return int
     */
    private function getLastDay()
    {
        return (int) $this->dateTime->format('t');
    }

    /**
     * getMonth
     *
     * returns numerical month
     *
     * @return bool|string
     */
    private function getMonth()
    {
        return date('m', $this->time);
    }

    /**
     * getYear
     *
     * returns numerical year
     *
     * @return bool|string
     */
    private function getYear()
    {
        return date('Y', $this->time);
    }

    /**
     * getTime
     *
     * returns time()
     *
     * @return int
     */
    private function getTime()
    {
        return time();
    }

}
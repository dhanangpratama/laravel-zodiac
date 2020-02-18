<?php

namespace DhanangPratama\Zodiac\Classes;
 
class Zodiac
{
    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * The array indexkey for a zodiac
     *
     * @var integer
     */
    protected $zodiacKey;

    /**
     * Zodiac
     *
     * @var string
     */
    protected $zodiac;

    /**
     * Predefined zodiac array
     *
     * @var array
     */
    protected $zodiacArray = array(
        array('name' => 'aries',
            'key' => 0, 'unicode' => '♈', 'start' => '03-21', 'end' => '04-20'
        ),
        array('name' => 'taurus',
            'key' => 1, 'unicode' => '♉', 'start' => '04-21', 'end' => '05-21'
        ),
        array('name' => 'gemini',
            'key' => 2, 'unicode' => '♊', 'start' => '05-22', 'end' => '06-21'
        ),
        array('name' => 'cancer',
            'key' => 3, 'unicode' => '♋', 'start' => '06-22', 'end' => '07-22'
        ),
        array('name' => 'leo',
            'key' => 4, 'unicode' => '♌', 'start' => '07-23', 'end' => '08-23'
        ),
        array('name' => 'virgo',
            'key' => 5, 'unicode' => '♍', 'start' => '08-24', 'end' => '09-23'
        ),
        array('name' => 'libra',
            'key' => 6, 'unicode' => '♎', 'start' => '09-24', 'end' => '10-23'
        ),
        array('name' => 'scorpio',
            'key' => 7, 'unicode' => '♏', 'start' => '10-24', 'end' => '11-22'
        ),
        array('name' => 'sagittarius',
            'key' => 8, 'unicode' => ' ♐', 'start' => '11-23', 'end' => '12-21'
        ),
        array('name' => 'capricorn',
            'key' => 9, 'unicode' => '♑', 'start' => '12-22', 'end' => '12-31'
        ),
        array('name' => 'aquarius',
            'key' => 10, 'unicode' => '♒', 'start' => '01-21', 'end' => '02-19'
        ),
        array('name' => 'pisces',
            'key' => 11, 'unicode' => '♓', 'start' => '02-20', 'end' => '03-20'
        ),
        array('name' => 'capricorn',
            'key' => 9, 'unicode' => '♑', 'start' => '01-01', 'end' => '01-20'
        ),
    );

    /**
     * Predefined chinese zodiac array
     *
     * @var array
     */
    protected $shioArray = array(
        array('name' => 'monkey', 'unicode' => '猴'),
        array('name' => 'rooster', 'unicode' => '雞'),
        array('name' => 'dog', 'unicode' => '狗'),
        array('name' => 'pig', 'unicode' => '豬'),
        array('name' => 'rat', 'unicode' => '鼠'),
        array('name' => 'ox', 'unicode' => '牛'),
        array('name' => 'tiger', 'unicode' => '兎'),
        array('name' => 'rabbit', 'unicode' => '兔'),
        array('name' => 'dragon', 'unicode' => '龍'),
        array('name' => 'serpent', 'unicode' => '蛇'),
        array('name' => 'horse', 'unicode' => '馬'),
        array('name' => 'goat', 'unicode' => '羊'),
    );

    public function setDate($date = null)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }

        $this->date = $date;  

        $this->zodiacKey = $this->findZodiac();
        if (null !== $this->zodiacKey) {
            $this->zodiac = $this->zodiacArray[$this->zodiacKey]['name'];
        }

        return $this;
    }

    /**
     * Returns the zodiac
     *
     * @return string
     */
    public function get($date = null)
    {
        $this->setDate($date);

        return [
            'date' => $this->date->format('Y-m-d'),
            'zodiac' => $this->zodiac,
            'shio' => $this->shioArray[$this->date->format('Y') % 12]['name'],
        ];
    }

    /**
     * Finds a zodiac
     *
     * @return mixed
     */
    protected function findZodiac()
    {
        $date = $this->date->getTimestamp();
        $year = $this->date->format('Y');
        foreach ($this->zodiacArray as $zodiac) {
            if ($date >= strtotime($year . '-' . $zodiac['start']) && $date <= strtotime($year . '-' . $zodiac['end'] . ' 23:59:59')) {
                return $zodiac['key'];
            }
        }

        return;
    }
}
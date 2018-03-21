<?php
///**
// * Created by PhpStorm.
// * User: anna
// * Date: 3/21/18
// * Time: 4:28 PM
// */

    session_start();

    interface Formatter {
        public function format();
    }

    trait Value {}

    abstract class AbsFormatter implements Formatter  {

        protected $data;

        public function __construct($data)
        {
            $this->data = $data;
        }

    }

    class JsonFormatter extends AbsFormatter {
        public function format()
        {
            return json_encode($this->data);
        }
    }

    class CSVFormatter extends AbsFormatter {
        public function format()
        {
            return mb_convert_encoding($this->data, 'UTF-16LE', 'UTF-8');
        }
    }

    class HTMLFormatter extends AbsFormatter {
        public function format()
        {
            $resStr = '';

            foreach ($this->data as $key => $value) {
                $resStr = '<' . $key .'>' . $this->parseValue($value) . '</' . $key . '>';
            }

            return $resStr;
        }

        private function parseValue($value) {
            if (is_array($value)) {
                return implode(', ', $value);
            } else {
                return $value;
            }
        }
    }

    class ListFormatter extends AbsFormatter {
        public function format()
        {
            echo '<ul>';
            foreach ($this->data as $key => $value) {
                echo "<li>$key</li><li>$value</li>";
            }
            echo '</ul>';
        }
    }

    $jf = new JsonFormatter(['hello' => 'world', 'array' => 'a']);
    $jf->format();

<?php
    interface Writer {
        public function write($text);
    }

    class HTMLWriter implements Writer {
        public function write($text)
        {
            echo $text;
        }
    }

    class FileWriter implements Writer {
        public function write($text)
        {
            file_put_contents('file.txt', $text);
        }
    }

    function writeSomewhere(Writer $writer, $text) {
        $writer->write($text);
    }

    writeSomewhere(new FileWriter, 'hello world!');
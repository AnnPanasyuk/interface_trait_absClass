<?php
/**
 * Created by PhpStorm.
 * User: anna
 * Date: 3/21/18
 * Time: 3:59 PM
 */
    session_start();
    interface Logger {
        public function log();
    }

    trait Loggable {
        public function log()
        {
            var_dump($this);
        }
    }

    class File implements Logger {
        private $fileContent;

        public function __construct($filePath)
        {
            $this->fileContent = file_get_contents($filePath);
        }

        use Loggable;
     }

     class Session implements Logger {
        private $sessionInfo;

        public function __construct()
        {
            $this->sessionInfo = $_SESSION;
        }

        use Loggable;
     }

     class GetP implements Logger {
        private $params;

        public function __construct()
        {
            $this->params = $_GET;
        }

         use Loggable;
     }

     function processInnerData(Logger $loggable) {
        $loggable->log();
     }

     processInnerData(new File('file.txt'));
    echo '<br><br>';
    processInnerData(new Session());
    echo '<br><br>';
    processInnerData(new GetP());
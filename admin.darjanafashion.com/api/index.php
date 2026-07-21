<?php 
    class SaNDSLabShopping
    {
        public $action;
        function __construct()
        {
            $this->action = $_POST['action'];
        }
        
        function APIRequest()
        {
            switch($this->action)
            {
                case 'getRackAndBin':
                    $this->getRackAndBin();
                    break;
                case 'getRackAndBinById':
                    $this->getRackAndBinById();
                    break;
                case 'addRackAndBin':
                    $this->addRackAndBin();
                    break;
                case 'updateRackAndBin':
                    $this->updateRackAndBin();
                    break;
                case 'deleteRackAndBin':
                    $this->deleteRackAndBin();
                    break;
                default:
                    echo 'No Action Found..! in Rack and Bin';
                    break;
            }

        }

        function getRackAndBin()
        {
            $data = array(
                array('id' => 1, 'rack' => 'Rack 1', 'bin' => 'Bin 1'),
                array('id' => 2, 'rack' => 'Rack 2', 'bin' => 'Bin 2'),
                array('id' => 3, 'rack' => 'Rack 3', 'bin' => 'Bin 3'),
                array('id' => 4, 'rack' => 'Rack 4', 'bin' => 'Bin 4'),
                array('id' => 5, 'rack' => 'Rack 5', 'bin' => 'Bin 5')
            );

           
                if ($data=="[]")
                {
                    $ret = json_encode('[{"status" : "Failed","message" : "No Benifactors Found or Check your Token/API KEY"  },"refference_code" :
                        "1000"]');
                     echo json_decode($ret);
                }
                else
                {
                      $ret = json_encode('[{"status" : "Success","message" : '.json_encode($data).'  },,"refference_code" :
                        "2000"]');
                      echo json_decode($ret);
                } 
        }


    }

    $obj = new SaNDSLabShopping();
    $obj->APIRequest();


?>
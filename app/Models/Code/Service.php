<?php

namespace App\Models\Code;

use App\Models\ConceptNode;
use App\Models\User\Entity;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class Service
{
    const TEST_FILE = "test_file1.c";
    const CUSTOM_INPUT = "custom_input.txt";



    public function test(array $input, string $id)
    {
        $conceptNode = (new ConceptNode\Service())->fetchConceptNode($id);

        $this->createFile(
            $conceptNode[ConceptNode\Entity::PROVIDED_CODE] .
            $input['code'],
            self::TEST_FILE
        );
        $out = $this->runFile($input);

        return $out;
    }

    public function submit(array $input, string $id)
    {
        $conceptNode = (new ConceptNode\Service())->fetchConceptNode($id);

        $out = $this->getOutputAgainstCustomInput($input, $id);

        $out = $out['result'];

        $res = "";

        for ($i  = 0; $i < count($out); $i++)
        {
            $res = $res . $out[$i];

            if ($i < (count($out) - 1))
            {
                $res = $res . "\r\n";
            }
        }

        if($res != $conceptNode[ConceptNode\Entity::EXPECTED_OUTPUT]){
            throw new BadRequestHttpException("sorry output didn't match");
        }
    }

    protected function getOutputAgainstCustomInput(array $input, string $id)
    {
        $conceptNode = (new ConceptNode\Service())->fetchConceptNode($id);

        $input['customInput'] = $conceptNode[ConceptNode\Entity::TEST_CASES];

        $this->createFile(
            $conceptNode[ConceptNode\Entity::PROVIDED_CODE] .
            $input['code'],
            self::TEST_FILE
        );
        $out = $this->runFile($input);

        return $out;
    }

    protected function createFile(string $input, string $fileName)
    {
        $myfile = fopen($fileName, "w");
        fwrite($myfile, $input);
        fclose($myfile);
    }

    public function runFile(array $input)
    {
        $result = [];

        $error = "";
        $code = 0;
        exec("gcc -o myc1 " . self::TEST_FILE . " 2>&1", $error, $code);
        if($code !== 0)
        {
            $result['result'] = $error;
            $result['code'] = $code;
        }else {
            $out = "";
            if($input['customInput'] == null){
                $input['customInput'] = "test";  // todo
            }
            $this->createFile($input['customInput'], self::CUSTOM_INPUT);
            exec("./myc1 < custom_input.txt 2>&1", $out, $code);
            $result['result'] = $out;
            $result['code'] = $code;
        }
        return $result;
    }
}

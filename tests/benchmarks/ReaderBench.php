<?php

namespace tests\benchmarks;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class ReaderBench
{
    public function benchRead()
    {
        $reader = ReaderEntityFactory::createODSReader();
        $reader->open(dirname(__DIR__) . '/resources/ods/static_400-6.ods');
        $cells = 0;
        foreach ($reader->getSheetIterator() as $worksheet) {
            foreach ($worksheet->getRowIterator() as $row) {
                foreach ($row->getCells() as $cell) {
					if ($cell->__toString()) {
	                    $cells++;
					}
                }
            }
        }
    }
}


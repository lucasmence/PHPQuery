<?php

    class PHPQuery {

        public function execute($data) {

            include_once 'database.php';

            $connection = Database::connect();
            
            $connection->exec('SET CHARACTER SET utf8');

            $sql = $data['sql'];

            $query = $connection->prepare($sql);

            $query->execute($data['parameters']);

            $result = $query->fetch();

            Database::disconnect();

            return $result; 

        }
        
        public function executeRow($data) {

            include_once 'database.php';

            $connection = Database::connect();

            $sql = $data['sql'];

            $query = $connection->query($sql);

            Database::disconnect();

            return $query; 

        }

        public function select($data) {

            $data['sql'] = 'select ' . $data['fields'] . ' from ' . $data['table'] . ' where ' . $data['where']; 

            return self::execute($data);
        }

        public function insert($data) {

            if (empty($data['values'])) {

                $parametersCount = substr_count($data['fields'],',');

                $data['values'] = '?';

                if ($parametersCount > 0) {
                    for ($index = 0; $index < $parametersCount; $index++) {
                        $data['values'] = $data['values'] . ', ?';
                    }
                }
                
            }

            $data['sql'] = 'insert into ' . $data['table'] . ' (' . $data['fields'] . ') values ( ' . $data['values'] . ') '; 
            
            return self::execute($data);
        }

        public function update($data) {
            
            $data['sql'] = 'update ' . $data['table'] . ' set ' . $data['fields'] . ' where ' . $data['where']; 
            
            return self::execute($data);
        }

        public function delete($data) {

            $data['sql'] = 'delete from ' . $data['table'] . ' where ' . $data['where']; 
            
            return self::execute($data);
        }

    }

    

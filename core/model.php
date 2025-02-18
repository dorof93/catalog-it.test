<?php
	namespace Core;
	use PDO;
    
	class Model
	{
		private static $pdo;
		
		public function __construct()
		{
			if ( ! self::$pdo ) { // если свойство не задано, то подключаемся
                self::$pdo = new PDO(DB_DSN, DB_USER, DB_PASS, DB_OPT);
			}
		}
		
		protected function findOne($query, $args)
		{
			$res = self::$pdo->prepare($query);
            $res->execute($args);
            $row = $res->fetch();
            return $row;
		}
		
		protected function findMany($query, $args = [])
		{
			$res = self::$pdo->prepare($query);
            $res->execute($args);
            $row = $res->fetchAll();
            return $row;
		}
	}
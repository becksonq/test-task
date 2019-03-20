<?php
 class umiObjectsExpiration extends singleton implements iSingleton, iUmiObjectsExpiration {const DEFAULT_EXPIRED_OBJECTS_LIMIT = 50;protected $defaultExpires = 86400;protected function __construct() {}public function getLimit() {$vaa9f73eea60a006820d0f8768bc8a3fc = mainConfiguration::getInstance()->get('kernel', 'expired-objects-limit');return is_numeric($vaa9f73eea60a006820d0f8768bc8a3fc) ? (int) $vaa9f73eea60a006820d0f8768bc8a3fc : self::DEFAULT_EXPIRED_OBJECTS_LIMIT;}public static function getInstance($v4a8a08f09d37b73795649038408b5f33 = null) {return parent::getInstance(__CLASS__);}public function isExpirationExists($v16b2b26000987faccb260b9d39df1269) {$v4717d53ebfdfea8477f780ec66151dcb = ConnectionPool::getInstance()->getConnection();$vac5c74b64b4b8352ef2f181affb5ac2a = <<<SQL
			SELECT
				`obj_id`
			FROM
				`cms3_objects_expiration`
			WHERE
				`obj_id` = {$v16b2b26000987faccb260b9d39df1269}
			LIMIT 1
SQL;
			SELECT
				`obj_id`
			FROM
				`cms3_objects_expiration`
			WHERE
				`obj_id`  IN (
					SELECT
						`id`
					FROM
						`cms3_objects`
					WHERE
						`type_id`='{$v5f694956811487225d15e973ca38fbab}'
					)
				AND (`entrytime` +  `expire`) <= {$v07cc694b9b3fc636710fa08b6922c42b}
			ORDER BY (`entrytime` +  `expire`)
			LIMIT {$vaa9f73eea60a006820d0f8768bc8a3fc}
SQL;
			UPDATE
				`cms3_objects_expiration`
			SET
				`entrytime`='{$v07cc694b9b3fc636710fa08b6922c42b}',
				`expire`='{$v09bcb72d61c0d6d1eff5336da6881557}'
			WHERE
				`obj_id` = '{$v16b2b26000987faccb260b9d39df1269}'
SQL;
INSERT INTO `cms3_objects_expiration`
	(`obj_id`, `entrytime`, `expire`)
		VALUES ('{$v16b2b26000987faccb260b9d39df1269}', '{$v07cc694b9b3fc636710fa08b6922c42b}', '{$v09bcb72d61c0d6d1eff5336da6881557}')
SQL;
DELETE FROM `cms3_objects_expiration`
	WHERE `obj_id` = '{$v16b2b26000987faccb260b9d39df1269}'
SQL;
<?php
 namespace UmiCms\System\Trade\Offer\Price;use UmiCms\System\Orm\Entity\iMapper as iAbstractMapper;interface iMapper extends iAbstractMapper {const OFFER_ID = 'offer_id';const CURRENCY_ID = 'currency_id';const VALUE = 'value';const TYPE_ID = 'type_id';const IS_MAIN = 'is_main';const OFFER = 'offer';const CURRENCY = 'currency';const TYPE = 'type';}